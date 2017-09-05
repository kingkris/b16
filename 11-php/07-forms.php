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
	</style>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Slabo+27px" rel="stylesheet">

</head>
<body>



<div class="form-wrap bg-grey">
	<h2 class="bg-title">Form Tags</h2>
	<form action="07-form-thankyou.php" method="post">
		<fieldset>
			<legend>Personal Info</legend>
			<div class="form-row">
				<label for="Name">Name</label>
				<input class="input-box" type="text" id="Name" name="Name" placeholder="Enter your name">
			</div>
			<div class="form-row">
				<label for="Email">Email</label>
				<input class="input-box" type="text" id="Email" name="Email" placeholder="Enter your email">
			</div>
      <div class="form-row">
        <label for="Mobile">Mobile</label>
        <input class="input-box" type="text" id="Mobile" name="Mobile" placeholder="Enter your mobile number">
      </div>
			<div class="form-row">
				<label for="Message">Your Message</label>
        <textarea name="Message" id="Message" placeholder="Enter your message"></textarea>
			</div>
			<div><input type="submit" value="Submit"></div>
		</fieldset>
	</form>
	<p class="tac">----------- eo form-wrap bg-grey ----------- </p>
</div>






</body>
</html>