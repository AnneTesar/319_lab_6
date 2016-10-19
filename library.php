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


$servername = "mysql.cs.iastate.edu";
$username = "dbu319t36";
$password = "5as-Azut";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT * FROM books;";
$result = $conn->query($query);

echo $result;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["bookId"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

/*


*/
?>

