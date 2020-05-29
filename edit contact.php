<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook2";
session_start();
$n=$_SESSION["name"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT name,mobile,mobile1,email,email1,date from contacts where name='$n'";
$a = mysqli_query($conn,$sql);
$rows= mysqli_num_rows($a);
if($rows>0)
{
	$b=mysqli_fetch_assoc($a);
	$name=$b["name"];
	$date=$b["date"];
	$num=$b["mobile"];
	$num1=$b["mobile1"];
	$email=$b["email"];
	$email1=$b["email1"];
}

if(isset($_POST["submit"])){
	$name=$_POST["nname"];
	$num=$_POST["nnumber"];
	$date=$_POST["date"];
	$num1=$_POST["nnumber1"];
	$email=$_POST["mmail"];
	$email1=$_POST["mmail1"];

$sql =" UPDATE `contacts` SET `name` = '$name', `mobile` = '$num', `mobile1` = '$num1', `email` = '$email', `email1` = '$email1', `date` = '$date' WHERE `contacts`.`name` = '$n'";
if (mysqli_query($conn, $sql)) {
  echo "<center><h1 style='color:green;'>"."updated successfully !!"."</h1></center>";
} else {
  echo "Error error updating: " . mysqli_error($conn);
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
          document.getElementById("i").innerHTML='<br><input type="email1" value="<?php echo $email1;?>"placeholder="abc@gmail.com"name="mmail1" style="min-width:90%"><span onclick="remove()"class="glyphicon glyphicon-remove-sign"</span>';
	}
	function add1(){
          document.getElementById("j").innerHTML='<br><input type="tel" value="<?php echo $num1;?>"placeholder="xxxxxxxxxx(10 digit mobile number)" name="nnumber1" pattern="^[6-9]{1}[0-9]{9}$" style="min-width:90%"><span onclick="remove1()"class="glyphicon glyphicon-remove-sign"</span>';
	}
function remove(){;
	document.getElementById("i").innerHTML=" ";

}
function remove1(){;
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
		<h4><span class="glyphicon glyphicon-arrow-left" onclick="back()"> Edit Contact</span></h4>
		<div class="form-group">
		<label>Name</label><br>
		<input type="Name" name="nname" placeholder="Name" value="<?php echo $name;?>"style="min-width:100%" required pattern="^[A-Za-z]+" >
        </div>
        <div class="form-group">
		<label>DOB</label><br>
		<input type="date" name="date"value="<?php echo $date?>"  style="min-width:100%">
        </div><div class="form-group">
		<label>Mobile Number</label><br>
		<input type="tel" name="nnumber"  style="min-width:90%" value="<?php echo $num ;?>"placeholder="xxxxxxxxxx(10 digit mobile number)" required pattern="^[6-9]{1}[0-9]{9}$" > <span  onclick="add1()"class="glyphicon glyphicon-plus-sign"></span><br>
		<span id="j"></span>
        </div><div class="form-group">
		<label>E-Mail</label><br>
		<input type="email" name="mmail"  value="<?php echo $email;?>"placeholder="abc@gmail.com" style="min-width:90%" required> <span onclick="add()"class="glyphicon glyphicon-plus-sign"></span><br>
		<span id="i"></span>
        </div>
        <input type="submit" name="submit"class="btn btn-success" style="float: right"; value="Update"></button>
        <br><br><br>
    </form></div>
<div class="col-md-2"></div></div>
</body></html>
