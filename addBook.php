<?php 

session_start();
$username = $_SESSION["username"];
 
$bookId = $_REQUEST["bookId"];
$bookTitle = $_REQUEST["bookTitle"];
$author = $_REQUEST["author"];

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

$sql = "INSERT INTO books VALUES (" . $bookId . ", '" . $bookTitle . "', '" . $author . "', 1);";
$result = $conn->query($sql);

//also need to add to book locations!!
//how do i know which shelf to put it on?
//check that shelf has no more than 20 books, handle. 

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

/*


*/
?>

