<?php
	session_start();
	
	$dbServer = "127.0.0.1";
	$dbUsername = "emotionsTeam";
	$dbPassword = "yeswecan";
	$dbName = "emotions";

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
		$sql = "SELECT password FROM logins WHERE username='" . $username . "'";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();
		if(password_verify($password, $row["password"])) {
			echo "Successful Login";
			$_SESSION["loggedUser"] = $username;
			paradigm();
		} else {
			echo "Failure mate";
		}
	}

	function paradigm() {
		echo "<h1> Hello World </h1>
		<form action='updateMessage.php' method='post'>
					Emoticon: <input type='text' name='emoticon'><br>
					Message: <input type='text' name='msg'><br>
			<input type='submit'>
		</form>";
	}
?>

<!-- emotionsTeam//yeswecan-->
<!-- <input type='hidden' value = <? $_SESSION['loggedUser'] ?> name='username'><br> -->