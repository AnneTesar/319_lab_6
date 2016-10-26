<?php

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$librarian = $_REQUEST["librarian"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];

//TODO validation
//$username is only alphabeticial & numerical
//$passowrd store in db in md-5
//already checked that passwords match
//$email must be alphanumeric, in xxx@xxx.xxx
//$phone should be xxxxxxxxxx
//$librarian should be 1 or 0
//$firstName should be only alphabetical
//$lastName should be only alphabetical

$dbservername = "mysql.cs.iastate.edu";
$dbusername = "dbu319t36";
$dbpassword = "5as-Azut";
$dbname = "db319t36";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users VALUES ('" . $username . "', '" . $password . "', '" . $email . "', '" . $phone  . "', '" . $librarian . "', '" . $firstName . "', '" . $lastName . "');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

