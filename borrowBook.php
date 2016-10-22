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

$sql = "SELECT * FROM books WHERE bookId=" . $bookId . ";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if ($row["availability"] == 0) {
			echo "avaiability == 0";
		}
		else if ($row["availability"] == 1) {
			echo "updating table";
			$update = "UPDATE books SET availability=0 WHERE bookId=" . $bookId . ";";
			$result2 = $conn->query($update);
			
			//update loanHIstory
		}
    }
}
$conn->close();

/*


*/
?>

