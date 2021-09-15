<?php
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	//$gender = $_POST['gender'];
	//$email = $_POST['email'];
	//$password = $_POST['password'];
	//$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName) values(?, ?)");
		$stmt->bind_param("ss", $firstName, $lastName);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>