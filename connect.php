<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die('Connection Failed : '. $conn->connect_error);
	}else {
		$stmt = $conn->prepare("insert into registeration(firstName, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $firstName, $email, $password);
		$stmt->execute();
		header("Location: bot.html");
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>