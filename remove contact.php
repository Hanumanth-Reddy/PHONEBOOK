<?php
 session_start();
 $n=$_SESSION["name"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook2";
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "DELETE FROM `contacts` WHERE `contacts`.`name` = 'rahul'";
if (mysqli_query($conn, $sql)) {
  
  
  	echo "<center><h1 style='color:red;'>"."removed successfully !!"."</h1></center>";
}
?>