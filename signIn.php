<?php 

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

session_start();
$_SESSION["username"] = $username;

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

$sql = "SELECT * FROM users WHERE userName='" . $username . "' AND password='" . $password . "';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$user = "{\"username\":\"" . $row["userName"] . "\",\"librarian\":\"" . $row["librarian"] . "\"}";
		echo $user;
    }
} else {
    echo "0 results";
}
$conn->close();

/*


*/
?>

