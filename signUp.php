<?php 

class Library {
	public $var;
}
class Shelf {
	public $name;
	public $num_books; //max of 20
}
class Book {
	public $name;
	public $id;
	
}
class Student {
	public $name;
	
}

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$librarian = $_REQUEST["librarian"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];

//do validation here?

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

/*


*/
?>

