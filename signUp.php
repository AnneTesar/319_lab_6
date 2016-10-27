<?php

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$librarian = $_REQUEST["librarian"];
$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];

//TODO validation
//$username is only alphabeticial & numerical
//$passowrd store in db in md-5
//already checked that passwords match
//$email must be alphanumeric, in xxx@xxx.xxx
//$phone should be xxxxxxxxxx
//$librarian should be 1 or 0
//$firstName should be only alphabetical
//$lastName should be only alphabetical

$dbservername = "mysql.cs.iastate.edu";
$dbusername = "dbu319t36";
$dbpassword = "5as-Azut";
$dbname = "db319t36";

$validation = true;
$errorLoc = "";

if (preg_match('/[^A-Za-z0-9]/', $username)) { //checks username for alphanumeric chars
	$validation = false;
	$errorLoc .= "1 ";
}
	
$passwordMD5 = md5($password);

//e-mail validation
while (true) {
	$atPos = strpos($email, "@");
	if ($atPos === false) { // no @
		$validation = false;
		$errorLoc .= "2 ";
		break;
	} 
	else { //contains @
		$beforeAt = substr($email, 0, $atPos);
		if (preg_match('/[^A-Za-z0-9]/', $beforeAt)) { //validate up to @
			$validation = false;
			$errorLoc .= "3 ";
			break;
		} //up to @ good
		$dotPos = strpos($email, ".");
		if ($dotPos === false) { // no "."
			$validation = false;
			$errorLoc .= "4 ";
			break;
		} 
		else { //contains "."
			$betweenAtDot = substr($email, $atPos + 1, $dotPos - $atPos - 1);
			if (preg_match('/[^A-Za-z0-9]/', $betweenAtDot)) {//validation between "@" & "."
				$validation = false;
				$errorLoc .= "5 ";
				break;
			}//up to . good
			$afterDot = substr($email, $dotPos + 1);
			if (preg_match('/[^A-Za-z0-9]/', $afterDot)) {
				$validation = false;
				$errorLoc .= "6 ";
				break;
			}
			break; //e-mail validation should be good if here
		}
	}
	
}

//phone validation
if (strlen($phone) == 10) {
	if (preg_match('/[^0-9]/', $phone)) {
		$validation = false; //not all digits
		$errorLoc .= "7 ";
	}
} else { // length isn't 10
	$validation = false;
	$errorLoc .= "8 ";
}

//librarian validation
if (!($librarian == 0 || $librarian == 1)) {
	$validation = false;
	$errorLoc .= "9 ";
}
	
//first name validation
if (preg_match('/[^A-Za-z]/', $firstName)) { //checks username for alphanumeric chars
	$validation = false;
	$errorLoc .= "10 ";
}	

//last name validation
if (preg_match('/[^A-Za-z]/', $firstName)) { //checks username for alphanumeric chars
	$validation = false;
	$errorLoc .= "11 ";
}

if ($validation) { // all validations are good
	// Create connection
	$conn = new mysqli ( $dbservername, $dbusername, $dbpassword, $dbname );
	
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$sql = "INSERT INTO users VALUES ('" . $username . "', '" . $passwordMD5 . "', '" . $email . "', '" . $phone . "', '" . $librarian . "', '" . $firstName . "', '" . $lastName . "');";
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close ();
} else {
	echo "Error in validation" . $errorLoc;
}


?>

