<?php
if($_POST['email'] != '') {

/********************* added server side scripting *******************/
	
$continue = "thankyou.html";
$auto_redirect = 0;
$redirect_url = "thankyou.html";
$required_fields_check = 1;
$required_fields = array('name','email','phone','comment');
$show_ip = 1;
$banned_ips_check = 0;
$banned_ips = array();
$banned_ip_message = "Your IP address is banned.  The form was not sent.";
setcookie('formtoemailpro');
$require_cookie = 0;
$strip_html_tags = 1;
$check_referrer = 1;
$check_comments = 1;
$comment_check_words = array('http://','https://','www.','@','.com','.biz');
$gobbledegook_check = 1;

//  Initialise variables

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$form_input = $_POST; 
}
elseif($_SERVER['REQUEST_METHOD'] == "GET") {
	$form_input = $_GET;
}
else{
	exit;
}

// Remove leading whitespace from all values.

$useremail=$form_input['email'];


function recursive_array_check(&$element_value){
if(!is_array($element_value)) {
	$element_value = ltrim($element_value);
}
else {
	foreach($element_value as $key => $value){$element_value[$key] = recursive_array_check($value);}
}
return $element_value;
}

recursive_array_check($form_input);

// Test for cookie.

if($require_cookie){
	if(!isset($_COOKIE['formtoemailpro'])){$errors[] = "You must enable cookies to use the form";}
}

// Check referrer.

if($check_referrer){
	if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}
}

// Check for required fields.  If none, don't allow blank form to be sent.

if($required_fields_check){
	foreach($required_fields as $value){if(!isset($form_input[$value]) || empty($form_input[$value])){$errors[] = "Please go back and complete the $value field";}}
}
else{
// Check for a blank form.
function recursive_array_check_blank($element_value){
global $set;
if(!is_array($element_value)) { if(!empty($element_value)){ $set = 1;}}
else {
foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}
}
}

recursive_array_check_blank($form_input);

if(!$set){$errors[] = "You cannot send a blank form";}

}

// Check for banned IPs.

if($banned_ips_check)
{

foreach($banned_ips as $value)
{

if($value == $_SERVER[REMOTE_ADDR]){$errors[] = $banned_ip_message; break;}

}

}

// Check all fields for gobbledegook.

if($gobbledegook_check)
{

if($set){$set = "";}

$gobbledegook_alphabet = array('\'a1','\'a2','\'a4','\'a6','\'a7','\'a8','\'aa','\'ab','\'ac','\'ae','\'af','\'b0','\'b1','\'b2','\'b3','\'b5','\'b6','\'b7','\'b8','\'b9','\'ba','\'bb','\'bc','\'bd','\'be','\'bf','\'c0','\'c1','\'c2','\'c3','\'c4','\'c5','\'c6','\'c7','\'c8','\'c9','\'ca','\'cb','\'cc','\'cd','\'ce','\'cf','\'d0','\'d1','\'d2','\'d3','\'d4','\'d5','\'d6','\'d7','\'d8','\'d9','\'da','\'db','\'dc','\'dd','\'de','\'df','\'e0','\'e1','\'e2','\'e3','\'e4','\'e5','\'e6','\'e7','\'e8','\'e9','\'ea','\'eb','\'ec','\'ed','\'ee','\'ef','\'f0','\'f1','\'f3','\'f5','\'f6','\'f7','\'f8','\'fa','\'fb','\'fc','\'fd','\'fe');

function recursive_array_check_gobbledegook($element_value,$inkey = "")
{

global $set;
global $gobbledegook_alphabet;
global $return_value;
global $return_key;

if(!is_array($element_value))
{

foreach($gobbledegook_alphabet as $value){if(stristr($element_value,$value)){$set = 1; $return_value = $value; $return_key = $inkey; break;}}

}else{

foreach($element_value as $key => $value){if($set){break;} recursive_array_check_gobbledegook($value,$key);}
}

}

recursive_array_check_gobbledegook($form_input);

if($set){if(is_numeric($return_key)){$errors[] = "You have entered an invalid character ($return_value)";}else{$errors[] = "You have entered an invalid character ($return_value) in the \"$return_key\" field";}}

}

// Strip HTML tags from all fields.

if($strip_html_tags)
{

function recursive_array_check2(&$element_value)
{

if(!is_array($element_value)){$element_value = strip_tags($element_value);}
else
{

foreach($element_value as $key => $value){$element_value[$key] = recursive_array_check2($value);}

}

return $element_value;

}

recursive_array_check2($form_input);

}


// Validate name field.

if(isset($form_input['name']) && !empty($form_input['name']))
{

if(preg_match("`[\r\n]`",$form_input['name'])){$errors[] = "You have submitted an invalid new line character";}

if(preg_match("/[^a-z' -]/i",stripslashes($form_input['name']))){$errors[] = "You have submitted an invalid character in the name field";}

}

// Validate email field.

if(isset($form_input['email']) && !empty($form_input['email']))
{

if(preg_match("`[\r\n]`",$form_input['email'])){$errors[] = "You have submitted an invalid new line character";}

//if(!preg_match('/^([a-z][a-z0-9_.-\/\%]*@[^\s\"\)\?<>]+\.[a-z]\{2,6\})$/i',$form_input['Email'])) {$errors[] = "Email address is invalid";}

}


// Display any errors and exit if errors exist.

if(count($errors)){
	session_start();
	foreach($errors as $value){$error_values .= $value."<br>";} 
	$_SESSION['errvalue'] = $error_values;
	$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
	header("location: message.php"); exit; 
}

// Build message.

function build_message($request_input) {if(!isset($message_output)) {$message_output = "";}if(!is_array($request_input)) {$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!is_numeric($key)){$message_output .= "\n\n".$key.": ".build_message($value);}else{$message_output .= "\n\n".build_message($value);}}}return $message_output;}

$message = build_message($form_input);

// Show sender's IP address.

if($show_ip){$message .= "\n\nSender's IP address: $_SERVER[REMOTE_ADDR]";}

// Strip slashes.

$message = stripslashes($message);

// Send email.
$formfrom=$_POST['email'];
$headers = "From: " . $formfrom . "\n" . "Return-Path: " . $formfrom . "\n" . "Reply-To: " . $formfrom . "\n";
$thanksto=$form_input['email'];
//mail($my_email,$subject,$message,$headers);
	
	
	/********************** End server side scripting******************************************/
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['phone'];
	$comment = $_POST['comment'];
	$hidform = $_POST['hidform'];

	/********************** End server side scripting******************************************/
	
	// message for different page
	$msg = "[dzineden.com] Enquiry";
	$to_admin .= 'kris@dzineden.com' . ', ';

$text_to_user = "Dear ".$name.", <br><br>Thank you for contacting dzineden.com<br>Our team will get in touch with you to provide required information<br><br>Best regards<br><strong>Team dzineden.com</strong><br><br><br><span style='font-size:12px;color:#444'>[This is an auto generated message, please do not reply to this e-mail. Incase of any feedback / suggestions / queries, please post your query here at info@dzineden.com]</span>";
	$text_to_admin = "Dear Admin,<br>Below is the details sent by ".$name;
	$text_to_admin .= "<br>-------------------------------------------------<br>";
	$text_to_admin .= "<br>Name: ".$name." <br>Email: ".$email." <br>Phone: ".$phone."<br>Comment: ".$comment." <br><br>Sender's IP address:".$_SERVER[REMOTE_ADDR];
	$text_to_admin .= "<br>-------------------------------------------------<br>";

	
	/*************************************************/
	// mail to user
	$to_user  = $email;
	
	// subject
	$user_subject = '[dzineDen] - Your Enquiry';
	$user_headers  = 'MIME-Version: 1.0' . "\r\n";
	$user_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$user_headers .= 'From: info@dzineden.com' . "\r\n";
	
	// Mail to user
	mail($to_user, $user_subject, $text_to_user, $user_headers);
	/*************************************************/
	
	/*************************************************/
	
	// subject
	$admin_headers  = 'MIME-Version: 1.0' . "\r\n";
	$admin_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$admin_headers .= 'From: '.$email.'' . "\r\n";
	// Mail to admin
	mail($to_admin,$admin_subject,$text_to_admin,$admin_headers);
	//mail($to_admin,$admin_subject,$text_to_admin,$headers);
	/*************************************************/
	
	header("Location: thankyou.html");
}
?>