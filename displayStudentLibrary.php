<?php 

class Library {
	public $shelves = array();
	
	public function __construct() {
		
	}
	
	public function addShelf($shelf) {
		array_push($this->shelves, $shelf);
	}
}
class Shelf {
	public $shelfId;
	public $shelfName;
	public $books = array();
	
	public function __construct($shelfId, $shelfName) {
		$this->shelfId = $shelfId;
		$this->shelfName = $shelfName;
	}
	
	public function addBook($book) {
		array_push($this->books, $book);
	}
	
	public function printShelf() {
		//print the shelf name
		
		//print all the books
	}
	
}
class Book {
	public $bookId;
	public $bookTitle;
	public $author;
	public $availability;
	
	public function __construct($bookId, $bookTitle, $author, $availability) {
      $this->bookId = $bookId;
      $this->bookTitle = $bookTitle;
      $this->author = $author;
	  $this->availability = $availability;
    }
	
	public function printBook() {
		$bookHtml = "<div><button ";
		if ($this->availability == 1) {
			$bookHtml .= "style=\"background-color:#A6D785\"";
		} 
		else {
			$bookHtml .= "style=\"background-color:#CC1100\"";
		}
		$bookHtml .= "onclick=\"alert(' " . $this->bookTitle . " written by " . $this->author . ".')\">" . $this->bookId; 
		$bookHtml .= "</button></div>";
		echo $bookHtml;
	}
	
}
class Student {
	public $name;
	
}


$dbservername = "mysql.cs.iastate.edu";
$dbusername = "dbu319t36";
$dbpassword = "5as-Azut";
$dbname = "db319t36";

$library = new Library();

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "connection failed\n";
}

$sql = "SELECT * FROM shelves;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$thisShelf = new Shelf($row["shelfId"], $row["shelfName"]);
		$library->addShelf($thisShelf);
    }
}

$sql = "SELECT * FROM books, shelves, bookLocations WHERE books.bookId=bookLocations.bookId AND shelves.shelfID=bookLocations.shelfId;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$thisBook = new Book($row["bookId"], $row["bookTitle"], $row["author"], $row["availability"]);
		/*
		for ($library->shelves as $shelf) {
			if ($shelf->shelfId == $row["shelfId"]) {
				$shelf.addBook($thisBook);
			}
		}
		*/
		$thisBook->printBook();
    }
}

$conn->close();

/*


*/
?>

