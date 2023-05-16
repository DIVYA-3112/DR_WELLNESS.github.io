<?php

$servername = "localhost";
$username = "divya3112";
$password = "divya1234";

// Create connection
$conn = new mysqli($servername,$username, $password);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
    // echo "<br><br>Connection successful<br><br>";
}

// test input function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// create database
$sql = "CREATE DATABASE FEEDBACK";

if ($conn->query($sql) === TRUE) {
//   echo "<br><br>Database created successfully<br><br>";
} else {
//   echo "<br><br>Error creating database: <br><br>" . $conn->error;
}


// create variables for input.

$username = $therapy = $therapyrating = $interfacerating = $overallrating = $comments = "";

$username = ($_POST['username']);
$therapy = ($_POST['therapy']);
$therapyrating = ($_POST['therapy-rating']);
$interfacerating = ($_POST['interface']);
$overallrating = ($_POST['overall']);
$comments = ($_POST['comments']);


//create table
$sql = "CREATE TABLE FEEDBACK.FBTABLE (
    username VARCHAR(30),
    therapy VARCHAR(30),
    therapyrating INT(10),
    interfacerating INT(10),
    overallrating INT(10),
    comments VARCHAR(30)
    )";

// check table creation
if ($conn->query($sql) === TRUE) {
    // echo "<br><br>Table 'fbtable' created successfully<br><br>";
} else {
    // echo "<br><br>table: <br><br>" . $conn->error;
}

// insert data 
$sql = "INSERT INTO feedback.fbtable (username, therapy, therapy_rating, interface, overall, comments )
VALUES ('$username', '$therapy', '$therapyrating' , '$interfacerating' , '$overallrating','$comments')";

// check if inserted or not
if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    } else {
    // echo "<br><br>Error: <br><br><br>" . $conn->error;
    }


// close connection 
$conn->close();

?>