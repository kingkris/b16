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
	</style>
</head>
<body>

<?php
	echo '<p>Hello, World! <small class="small">From PHP</small></p>';
	// An error below as the text is wrapped in  double quotes which includes double quotes as part of the content
	// echo "<p>Hello, World! <small class="small">From PHP</small></p>";

	echo '<p>';
	echo 'Some content';
	echo ' will come here';
	echo '<p>';

	$fname = 'KriShne';
	$lname = 'Gowda';
	$initials = 'NL';

	$box = 'dabba';

	echo "<p>$fname $lname $initials</p>"; //string n Varibales in double quotes
	echo '<p class="lead">$fname $lname $initials</p>'; //string n Varibales in single quotes


	echo '<p>';
	echo $fname, $lname, $initials; //Using comma to separet varaibles
	echo '</p>';

	echo '<p>';
	echo $fname;
	echo $lname;
	echo $initials;
	echo '</p>';

/*String Concatination*/

	echo '<p class="lead">' . $fname . ', ' . $lname . ' ' . $initials . '</p>';
?>

<div class="wrapper">
	<h2>my list</h2>
	<div class="<?php echo $box ?>">
		this is a <?php echo $box ?>
	</div>
</div>

<?php
	$markup = '<ol>';
	for ($i=0; $i < 10; $i++) { 
		$markup .= '<li>List Item ' . $i . '</li>';
	}
	$markup .= '</ol>';
	$x = 100;
	$y = 200;
?>
<div class="wrapper">
	<h2>my list</h2>
	<div class="<?php echo $box ?>">
		<?php 
			echo $markup;
			echo "<p>$x + $y is " . ($x + $y) . "</p>";
			echo "<p>$x * $y is " . ($x * $y) . "</p>";
			$Y = $x + $y + 400;
			echo "<p>($x + $y + 400) is $Y</p>";
		?>

	</div>
</div>
</body>
</html>