<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$server = "sql307.epizy.com";
	$user = "epiz_32696284";
	$pass = "szYr8K1GHZdjYlp";
	$database = "epiz_32696284_database1";

	$conn = mysqli_connect($server, $user, $pass, $database);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO entry(username, email, password,) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $password,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>