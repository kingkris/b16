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
	$page = "homae";

	if ($page == "home") {
		echo "<h1>Yes home page</h1>";
	} else{
		echo "<h1>Not a home page</h1>";
	}


	$time = 8;
	$faculty = "";

	$class ="Started";


	if($time>=9 && $faculty){
		echo "<p>Let them inside office</p>";
		if ($class=="Started") {
			echo "<p>Let them attend class</p>";
		}
	}else if($faculty){
		echo "<p>Let them Discuss doubts</p>";		
	}
?>


<h2>Alternate Syntax</h2>

<?php

	if (true) {
		echo "<p>Do something</p>";
		echo "<hr>";
		echo "<p>Alternate syntaxt is as given below</p>";
	}
	if (true):
		echo "<hr>";
		echo "<p>Do something</p>";
		echo "<p>Alternate syntaxt is as given below</p>";
	endif;


?>




</body>
</html>