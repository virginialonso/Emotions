<?php
	$dbServer = "127.0.0.1";
	$dbUsername = "emotionsTeam";
	$dbPassword = "yeswecan";
	$dbName = "emotions";
	$sql = "INSERT INTO logins (username, password)
		VALUES ('";
	$username = "";
	$password = "";

	// Create connecion to MySQL server
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

	// Check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		echo "Connected successfully\n" . $username . ", " . $password . "\n";
	}

	if( $_POST["username"] && $_POST["password"] ){

		$hash = password_hash($password, PASSWORD_BCRYPT);
		$sql = $sql . $username . "', '" . $hash . "')";
		// $sql = $sql . "'delvin', 'asda')";
		
		if($conn->query($sql) == TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . $conn->error;
		}
	}

	$conn->close();

?>