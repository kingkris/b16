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



<h1>Arrays - Key value pair</h1>



<hr>

<?php
	$friends = array(
										'name' => 'Raju',
										'age'	 => 25
									);

?>


<div>
	<p>I have <?php echo count($friends) ?> friends</p>
	<?php foreach ($friends as $key => $value): ?>
		<?php echo " $key : $value"; ?>
	<?php endforeach ?>
</div>







</body>
</html>