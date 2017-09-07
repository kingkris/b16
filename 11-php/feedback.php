<?php 
	include_once 'connect.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hello, World!</title>
	<style>

html{
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	color:#444;
	font-size:16px;
	line-height: 1.4;
}

 h1 {
	font-size:56px;
	font-weight:400;
	font-family: 'Slabo 27px', serif;
	text-decoration: none;
	color:#C46F00;
}

*{
  box-sizing: border-box;
}

body{
  margin:0;
}


.bg-grey{
  background-color: #D4D4D4;
  padding: 20px;
}
.bg-lightblue{
  background-color: #ADB2FF;
  padding: 20px;
}
.form-wrap form{
  width:600px;
  margin:20px auto;
}


.form-row{
  background-color: #fff;
  margin-bottom: 10px;
  padding:10px
}
.form-row label{
  width:150px;
  display: inline-block;
  text-align: right;
  font-size: 13px;
  color: #666;
}

.txt-area{
  width:300px;
  resize: horizontal;
}



.bg-title{
  background-color: #9500F4;
  padding:10px;
  text-align: center;
  margin:0 0 20px;
  color:#FFF;
  position:sticky;
  top:10px;
  z-index:2;
}
.form-sub-row{}
.form-row .form-sub-row label{
  text-align: left;
  cursor: pointer;
}

.form-sub-row input:checked ~ label{
  color:red;
  font-weight: bold;
}
.form-sub-row input[type="checkbox"]:checked ~ label{
  color:green;
}


.form-sub-row-horizantal{
  display: inline-block;
}

.input-bgi{
  background-image: url('../img/bullet-01.png');
  background-repeat: no-repeat;
  background-position: 5px 3px;
  border: solid 1px #AEAEAE;
  border-radius:4px;
  padding:4px 10px 4px 30px;
}

.input-bg{
  border: solid 1px #AEAEAE;
  border-radius:4px;
  padding:4px 10px 4px 30px;
  position: relative;
}
.input-bg:hover{
  border-color: #A9FF3A;
}
.input-bg:focus{
  border-color: #569800;
}

.form-element{
  display: inline-block;
  position: relative;
}
.form-element:before{
  position: absolute;
  left:10px;
  top:3px;
  content: "@";
  width:20px;
  height:20px;
  color:#444;
  z-index:1;
  text-align: center;
  line-height: 20px;
}
.input-box{
	border:solid 1px #CCC;
	border-radius: 4px;
	padding: 4px 6px;
	color: #666;
	width: 200px
}
.input-box:hover{
	border-color:#88A37E;
	box-shadow: 0 0 1px 0 #4FFF0F;
}
.input-box:focus{
	border-color:#4FFF0F;
	box-shadow: 0 0 4px 0 #4FFF0F;
}
.input-box.error{
	border-color:#FF0F47;
	box-shadow: 0 0 4px 0 #FF0F47;
}
.tac{
  text-align: center;
}
.spacer{
  min-height: 500px;
  margin-left: 40px;
  border-left: dotted 1px #FBA0A0;
}


.tbl2{
  width: 90%;
  margin:20px auto;
  border: solid 1px #CCC;
  border-collapse: collapse;
  empty-cells: 
}
.tbl2 caption{
  background-color: #D9D9D9;
  font-size: 20px;
  line-height: 40px;
  text-transform: uppercase;
}
.tbl2 th{
  background-color: #BCBCBC;
  font-size:16px;
  padding: 6px 2px;
  border: solid 1px #d9d9d9;
}
.tbl2 td{
  border: solid 1px #BCBCBC;
  padding:5px;
  font-size:14px;
}

.tbl2 tr:nth-child(odd){
  background-color: #F6E8FF;
}
.tbl2 tr:nth-child(even){
  background-color: #E8E8FF;
}
.tbl2 tr:hover{
  background-color: #D4FDCF;
  cursor: pointer;
}

.tbl2-sl      {width:60px; }
.tbl2-name    {width:220px;}
.tbl2-email   {width:150px; }
.tbl2-mobile  {width:120px; }






	</style>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Slabo+27px" rel="stylesheet">

</head>
<body>



<div class="form-wrap bg-grey">
	<h2 class="bg-title">Feedback</h2>


<?php



	//$query = "SELECT * FROM table_name";
	$query = "SELECT * FROM feedback";
	mysqli_query($link, $query) or die('Error querying database.');

	$result = mysqli_query($link, $query);
//	$row = mysqli_fetch_array($result);

?>

<table class="tbl2">
	<caption>My Friends</caption>
	<thead>
		<tr>
			<th class="tbl2-sl">Sl #</th>
			<th class="tbl2-name">Name</th>
			<th class="tbl2-email">Email</th>
			<th class="tbl2-mobile">Mobile</th>
			<th class="tbl2-message">Message</th>
		</tr>
	</thead>
	<tbody>

	<?php
		while ($row = mysqli_fetch_array($result)) {
			echo '<tr>';
				echo '<td>' . ' - ' . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['mobile'] . '</td>';
				echo '<td>' . $row['message'] . '</td>';
			echo '</tr>';
		}
	?>
	</tbody>
</table>


<p><a href="07-forms.php">Want to give your feedback!</a></p>

</div>






</body>
</html>