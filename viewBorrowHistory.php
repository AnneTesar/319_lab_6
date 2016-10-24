<?php 

session_start();
$username = $_SESSION["username"];
 
$studentId = $_REQUEST["studentId"];

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

$sql = "SELECT * FROM loanHistory WHERE userName='" . $studentId . "';";
$result = $conn->query($sql); 

$output = "";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$output .= $row['userName'] . " borrowed " . $row["bookId"] . " on " . $row["dueDate"];
		if ($row["returnedDate"]) {
			$output .= " and returned it " . $row["returnedDate"];
		}
		$output .= ". \n";
    }
}
$conn->close();

echo $output;
/*


*/
?>

