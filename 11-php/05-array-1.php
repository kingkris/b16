<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hello, World!</title>
	<style>
		.small{color: #D61E63 }
		.lead{font-size: 18px; color: #59A904 }
		.wrapper{max-width:700px;margin: 30px auto;padding: 30px;background-color: #F6F5F5;}
		.dabba{background-color: #fff;padding: 10px;text-align: center;border:solid 1px #CCC;border-radius: 8px}
		*{
			box-sizing: border-box;
		}
		.photos{
			max-width: 980px;
			margin: 30px;
		}
		@media (min-width: 980px) {
			.photos{margin-left: auto;margin-right: auto;}
		}
		.photos:after{
			content: "";
			display: block;
			clear: both;
		}
		.photo{
			padding: 10px;

		}
		.photo img{
			border:solid 1px #CCC;
			background-color: #EAEAEA;
			padding: 10px;
			width: 100%;
			height: auto;
			display: block;
		}
		@media (min-width: 560px) {
			.photo{
				width: 50%;
				float: left;
			}
		}
		@media (min-width: 768px) {
			.photo{
				width: 33.333%;
			}
		}
		@media (min-width: 980px) {
			.photo{
				width: 25%;
			}
		}
	</style>
</head>
<body>
<?php
	$days = array('Monday', 'Tuesday', 'Wednseday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$marks = array(
									'Kannada' => 60, 
									'English' => 30,
									'Maths'	=> "Absent",
									'Science'	=> 45,
									'Social'	=> 67,
									'Biology'	=> 88
								);

?>
<div class="photos">
	<?php 
		echo "<ul>";
		foreach ($marks as $subject => $score) :
			echo "<li>$subject : <b> $score</b></li>";
		endforeach;
		echo "</ul>";
		echo "<p>", $marks['English'], "</p>";
	?>
</div>
<hr>
<div class="photos">
	
<?php  
	$student = array(
										'Name' => 'Raju',
										'Class' => '8a',
										'Dob' => '30-june-1999',
										'Result' => 'Pass',
										'Marks' =>  array(
																			'Kannada' => 93, 
																			'English' => 70,
																			'Maths'	=> "45",
																			'Science'	=> 45,
																			'Social'	=> 67,
																			'Biology'	=> 88
																			)
									);
	echo "<pre>";
	var_dump($student);
	echo "</pre>";
	echo $student['Marks']['Kannada'];
	
	echo "<ul>";
	foreach ($student as $details => $value) {
		echo "<li>";
			if ($details == 'Marks') {
				echo "$details - ";
				echo "<ul>";
				foreach ($value as $subject => $value) {
					echo "<li>$subject : <b>$value</b></li>";
				}
				echo "</ul>";
			} else{
				echo "$details - $value";
			}
		echo "</li>";
	}
	echo "</ul>";

	unset($student);
?>
</div>


<h2>Friend list</h2>
<?php  
	$name = "Raja Chendur";

	echo strlen($name); // will return the length of the string
	echo '<p>', substr($name, 0, 4), '</p>'; //returning the first 4 characters
	echo strtoupper($name);
	echo '<p>' . substr($name, 4, 4) . '</p>'; //returning the first 4 characters
?>


</body>
</html>