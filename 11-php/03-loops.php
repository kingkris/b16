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

<h1>For Loop</h1>

<div class="photos">
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo1">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo2">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo3">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo4">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo5">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo6">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo7">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo8">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo9">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo10">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo11">
	</div>
	<div class="photo">
		<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo12">
	</div>
</div>

<hr>
<div class="photos">
	<?php
		for ($i=1; $i <= 12 ; $i++) { 
			echo '<div class="photo">';
			echo '<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo'. $i .'">';
			echo '</div>';
		}
	?>
</div>

<hr>
<div class="photos">
	<?php for ($i=1; $i <= 12 ; $i++) { ?>
		<div class="photo">
			<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo<?php echo $i ?>">
		</div>
	<?php } ?>
</div>

<h2>Alternate Syntax</h2>

<hr>
<div class="photos">
	<?php for ($i=1; $i <= 12 ; $i++): ?>
		<div class="photo">
			<img src="https://api.fnkr.net/testimg/350x200/D15900/FFF/?text=Photo<?php echo $i ?>">
		</div>
	<?php endfor; ?>
</div>

<?php 
	for ($i=0; $i < 10; $i++) {
		echo "<div>";
		for ($j=0; $j < $i; $j++) { 
		 	echo " * ";
		 } 
		echo "</div>"; 
	}
?>


<hr>
<hr>
<hr>
<hr>

<h1>While Loop</h1>
<ol>
	<?php 
		$i = rand(0, 11);
		while ( $i<= 10) {
			echo "<li>$i</li>";
			$i++;
		}
	?>
</ol>



</body>
</html>