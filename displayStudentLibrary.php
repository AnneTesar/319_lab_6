<?php 

class Library {
	public $var;
}
class Shelf {
	public $name;
	public $num_books; //max of 20
}
class Book {
	public $bookId;
	public $bookTitle;
	public $author;
	public $availability;
	
	public function __construct($bookId, $bookTitle, $author, $availability) {
      $this->bookID = $bookId;
      $this->bookTitle = $bookTitle;
      $this->author = $author;
	  $this->availability = $availability;
    }
	
	public function printBook() {
		echo "this book is " . $this->bookTitle . " written by " . $this->author . "\n";
	}
	
}
class Student {
	public $name;
	
}


$dbservername = "mysql.cs.iastate.edu";
$dbusername = "dbu319t36";
$dbpassword = "5as-Azut";
$dbname = "db319t36";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "connection failed\n";
}

$sql = "SELECT * FROM books, shelves WHERE books.bookId=shelves.bookId;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$thisBook = new Book($row["bookId"], $row["bookTitle"], $row["author"], $row["availability"]);
        $thisBook->printBook();
		//add to existing shelf or make new?
    }
} else {
    echo "0 results";
}

$conn->close();

/*


*/
?>

