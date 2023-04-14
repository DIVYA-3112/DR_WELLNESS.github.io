
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "details";
 
// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

$sqlquery="CREATE TABLE IF NOT EXISTS SERVICES(FIRST_NAME VARCHAR(100),
SURNAME VARCHAR(100),
AGE INT,
GENDER VARCHAR(1),
EMAIL VARCHAR(100),
PHONE VARCHAR(10),
THERAPY VARCHAR(50));";

$conn->query($sqlquery);
$name=$email=$age=$disease=$pnumber='';

$fname=$_POST["fname"];
$sname=$_POST["sname"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$pnumber=$_POST["phone"];
$disease=$_POST["therapy"];

$sqlquery = "INSERT INTO SERVICES VALUES('$fname','$sname','$age','$gender','$email','$pnumber','$disease')";
 
if($conn->query($sqlquery) === TRUE) {
    header("Location: html code.html");
    exit();
} else {
    echo "Error: " . $sqlquery . "<br>" . $conn->error;
}
session_destroy();
?>

