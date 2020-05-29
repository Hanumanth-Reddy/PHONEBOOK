<?php
$name=$num=$email=$num1=$email1='';
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$num=$_POST["number"];
	$date=$_POST["date"];
	$num1=$_POST["number1"];
	$email=$_POST["mail"];
	$email1=$_POST["mail1"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook2";

$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO contacts (name,mobile,mobile1,email,email1,date)
VALUES ('$name','$num','$num1','$email','$email1','$date')";
if (mysqli_query($conn, $sql)) {
  echo "<center><h1 style='color:green;'>"."inserted successfully !!"."</h1></center>";
} else {
  echo "unable to insert" . mysqli_error($conn);
}
}
?>
<html>
<head>
<title> PhoneBook</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	.a{background-color: #b5cdff; height:60px}
	.b{border:1px solid black;background-color: white; }
	.c{border:1px solid black; padding-bottom:50px;border-top: none;background-color:  #E5E4E2;margin-top:1px;height:650;}
	.g{border:1px solid black;}
	
	input {
    line-height: 30px;
}
</style>

</head>
<body>
	<script>function add(){
          document.getElementById("i").innerHTML='<br><input type="email1" value="<?php echo $email1;?>"placeholder="abc@gmail.com"name="mail1" style="min-width:90%"><span onclick="remove()"class="glyphicon glyphicon-remove-sign"</span>';
	}
	function add1(){
          document.getElementById("j").innerHTML='<br><input type="tel" value="<?php echo $num1;?>"placeholder="xxxxxxxxxx(10 digit mobile number)" name="number1" pattern="^[6-9]{1}[0-9]{9}$" style="min-width:90%"><span onclick="remove1()"class="glyphicon glyphicon-remove-sign"</span>';
	}
function remove(){
	document.getElementById("i").innerHTML="";
}
function remove1(){
	document.getElementById("j").innerHTML="";
}

	function back(){
	window.location.href="homephone.php";
}
</script>
<div class="container a g">
<br>RM-PHONEBOOK<br><br></span>
    <br><br><br></div>
    <div class="container c">
    	<br><br>
    <div class="col-md-3
    "></div>
    <div class="col-md-8 ">
	<form method="POST" class="b col-md-6" action="<?php $_SERVER['PHP_SELF'];?>" >
		<h4><span class="glyphicon glyphicon-arrow-left" onclick="back()"> Add new Contact</span></h4>
		<div class="form-group">
		<label>Name</label><br>
		<input type="Name" name="name" placeholder="Name" value="<?php echo $name;?>"style="min-width:100%" required pattern="^[A-Za-z]+" >
        </div>
        <div class="form-group">
		<label>DOB</label><br>
		<input type="date" name="date"value="<?php echo $date?>"  style="min-width:100%">
        </div><div class="form-group">
		<label>Mobile Number</label><br>
		<input type="tel" name="number"  style="min-width:90%" value="<?php echo $num ;?>"placeholder="xxxxxxxxxx(10 digit mobile number)" required pattern="^[6-9]{1}[0-9]{9}$" > <span  onclick="add1()"class="glyphicon glyphicon-plus-sign"></span><br>
		<span id="j"></span>
        </div><div class="form-group">
		<label>E-Mail</label><br>
		<input type="email" name="mail"  value="<?php echo $email;?>"placeholder="abc@gmail.com" style="min-width:90%" required> <span onclick="add()"class="glyphicon glyphicon-plus-sign"></span><br>
		<span id="i"></span>
        </div>
        <input type="submit" name="submit"class="btn btn-success" style="float: right"; value="Save"></button>
        <br><br><br>
    </form></div>
<div class="col-md-2"></div></div>
</body></html>
