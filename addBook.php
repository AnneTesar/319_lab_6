<?php 

session_start();
$username = $_SESSION["username"];
 
$bookId = $_REQUEST["bookId"];
$bookTitle = $_REQUEST["bookTitle"];
$author = $_REQUEST["author"];
$shelfNum = $_REQUEST["shelfNum"];

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

$query = "SELECT COUNT(*) FROM bookLocations WHERE shelfID=" . $shelfNum . ";";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if ($row["COUNT(*)"] < 20) {
			$sql = "INSERT INTO bookLocations VALUES (" . $shelfNum . ", " . $bookId . ");";
			$result2 = $conn->query($sql);
			$sql = "INSERT INTO books VALUES (" . $bookId . ", '" . $bookTitle . "', '" . $author . "', 1);";
			$result3 = $conn->query($sql);
			if (($result2 === TRUE) && ($result3 === TRUE)) {
				echo "New record created successfully";
			}
			else {
				echo "Inserting error";
			}
		}
		else if ($row["COUNT(*)"] >= 20) {
			echo "Shelf full - can't make new book!";
		}
    }
}

$conn->close();

?>

