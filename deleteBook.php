<?php 

session_start();
$username = $_SESSION["username"];
 
$bookId = $_REQUEST["bookId"];

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

$sql = "DELETE FROM books WHERE bookId=" . $bookId . ";";
$result1 = $conn->query($sql);

$sql = "DELETE FROM bookLocations WHERE bookId=" . $bookId . ";";
$result2 = $conn->query($sql);

if (($result1 === TRUE) && ($result2 === TRUE)) {
    echo "Deleted Successfully";
} else {
    echo "Error: <br>" . $conn->error;
}
$conn->close();

/*


*/
?>

