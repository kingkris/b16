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
		.dashboard{
			background-color: #FFC4D2;
			border: solid 1px #CCC;
			text-align: left;
			padding: 20px;
		}
		.dashboard span,
		.dashboard i{
			background-color: #FFF;
			border: solid 1px #CCC;
			padding: 8px;
			border-radius: 4px;
			font-size: 20px;
			display: inline-block;
		}
		.dashboard span{color: #933309 }
		.dashboard i{color: #0C4704 }
	</style>
</head>
<body>
<div class="photos">
	
<?php  
	$students = array(
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
	$friend = array(
										'Name' => 'Rahul',
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

	function VarDump($var)
	{
		echo "<pre>";
		echo "the value is";
		var_dump($var);
		echo "</pre>";
	}
	VarDump($students);
	echo $students['Marks']['Kannada'];
	
function printStudentDetails($student)
{
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
}
function printFriendDetails()
{
	global $friend;
	echo "<hr><p>printed from printFriendDetails functions</p>";
	echo "<ul>";
	foreach ($friend as $details => $value) {
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
}

	printStudentDetails($students);
	printStudentDetails($friend);
	printFriendDetails();



	function addNumbers($num1, $num2)
	{
		$x = $num1 + $num2;
		return $x;
	}

?>



<hr>
	<div class="dabba">
		<?php printStudentDetails($students) ?>
		<?php 
			$x = 4000;
			$y = 1345;
		?>
		<p class="dashboard">
			<span><?php  echo $x ?></span>
			<span><?php  echo $y ?></span>
			<i><?php  echo addNumbers($x, $y) ?></i>
		</p>
	</div>


</div>




</body>
</html>