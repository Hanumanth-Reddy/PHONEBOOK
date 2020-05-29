
<html>
<head>
	<title>Phone Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style >.a{background-color: #b5cdff; height:60px}
.c{border:1px solid black; padding-bottom:50px;border-top: none;margin-top:1px;height:650;padding:50px;}
.f{border:1px solid black;height:40px;padding-top:8px;padding-left: 5px}
.m{float:right;padding-right: 15px;padding-top: 6px}

.b{float:right;padding-bottom:8px;padding-left: 5px;text-decoration-color: white; margin:7px;}
	.k{float:right;padding-top:8px;padding-right: 15px;}
.d{padding-left: 5px ;padding-right:5px;}
.e{margin:10px; border:1px solid black;height:100px;padding-top: 15px;background-color: white}
.no{border:1px solid black;background-color: #E5F9F6;width:170%;}
a{text-decoration: none}
.plus{float:right;font-size: 50px}
.empty{height:400px}</style></head>
<body>
<script>
	function add(){
		window.location.href="add contact.php";
	}
	function edit(){
		window.location.href="edit contact.php";
	}function remove(){
		window.location.href="remove contact.php";
	}
</script>
<div class="container a g">
<br>RM-PHONEBOOK<br><br></span>
    <br><br><br></div>
  <div class="container c">
    	<br><br>
    <div class="col-md-1
    "></div>
    <div class="col-md-6 ">
 
 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook2";
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT *from contacts";
$a = mysqli_query($conn,$sql);
$rows= mysqli_num_rows($a);

if(session_start()){
	session_destroy();
    session_start();
}

if($rows>0)
{
	while($b=mysqli_fetch_assoc($a)){
	$name=$b["name"];
	$date=$b["date"];
	$num=$b["mobile"];
	$num1=$b["mobile1"];
	$email=$b["email"];
	$email1=$b["email1"];
 
 $_SESSION["name"]=$name;
	echo "<div id='p'class='container no'>
	     <div>
		<div class='d'>".$name."<span id='de' ><a href='#dem' data-toggle='collapse' class='k glyphicon glyphicon-triangle-top'></a></span></div><br></div>
		<div id='dem' class='collapse'> <div class='d'>". $date."<button  onclick='remove()' class='b btn btn-danger'>" ."remove"."</button><button  onclick='edit()' class=' b btn btn-success'>" ."edit"."</button> </div>
      <br><br>
    <div class='e'>
    	<div><span class='col-md-2 glyphicon glyphicon-earphone'>".$num."</span>
    	<span class='col-md-2 glyphicon glyphicon-envelope'>".$email."</span></div>
    	<br><br>
    	<div><span class=' col-md-2 glyphicon glyphicon-earphone'>".$num1."</span>
    	<span class='col-md-2 glyphicon glyphicon-envelope'>".$email1."</span></div> 
	</div></div>
  </div>";
}}
?>
</div><div class="col-md-3">
	</div><div class="empty"></div>
<div><span  onclick='add()' class=" plus glyphicon glyphicon-plus-sign"></span>
</div></div>
</body></html>