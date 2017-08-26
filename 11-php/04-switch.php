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
	$day = "Sunday";
?>




<h1>Switch Case</h1>


<div class="dabba">
	<h1>Daily Schedule of <?php echo $day ?></h1>

<?php 

	switch ($day) {
		case 'Monday':
			echo "<p>Login and start the weekly mail,</p>";
			echo "<p>Attend the weekly status meeting</p>";
			echo "<p>Run the Weekly chart</p>";
			break;
		case 'Tuesday':
		case 'Wednesday':
		case 'Thursday':
			echo "<p>Attend the daily status meeting</p>";
			break;
		case 'Friday':
			echo "<p>Report the weekly status</p>";
			echo "<p>Send the weekly mail and logout</p>";
			echo "<p>Stop the Weekly chart</p>";
			break;
		
		default:
			echo "<p>No Work just Enjoy</p>";
			break;
	}
	switch ($day) :
		case 'Monday':
			echo "<p>Login and start the weekly mail,</p>";
			echo "<p>Attend the weekly status meeting</p>";
			echo "<p>Run the Weekly chart</p>";
			break;
		case 'Tuesday':
		case 'Wednesday':
		case 'Thursday':
			echo "<p>Attend the daily status meeting</p>";
			break;
		case 'Friday':
			echo "<p>Report the weekly status</p>";
			echo "<p>Send the weekly mail and logout</p>";
			echo "<p>Stop the Weekly chart</p>";
			break;
		
		default:
			echo "<p>No Work just Enjoy</p>";
			break;
	endswitch;
?>
</div>




</body>
</html>