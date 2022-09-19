<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];

	// Database connection
	$conn = new mysqli('localhost','root','','database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email,subject) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $subject );
		$execval = $stmt->execute();
		echo $execval;
		echo "submit successfully...";
		$stmt->close();
		$conn->close();
	}
?>