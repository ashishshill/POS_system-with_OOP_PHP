<?php
//Class: 2017-05-08

function connect($flag=TRUE){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "db_pos";

	// Create connection
	if($flag){
		$conn = new mysqli($servername, $username, $password,$dbName);
	}else{
		$conn = new mysqli($servername, $username, $password);
	}
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: $conn->connect_error");
	} 
	//echo "Connected successfully";
	
	return $conn;
}
	
	
	
	//// Insert Data Example
	/*
	$con = connect();
	
	$sql= "INSERT INTO users 
			(name,email,password,user_type)
			VALUES 
			('Jhon','jhon@gmail.com','pass123',1)";
	
	if ($con->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	*/
?>