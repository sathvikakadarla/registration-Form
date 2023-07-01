<?php
	$Name = $_POST['Name'];
	$Age = $_POST['Age'];
	$Weight = $_POST['Weight'];
	$EmailId = $_POST['EmailId'];
	$file= $_POST['file'];
	

	
	$conn = new mysqli('localhost','root','','Registrationform');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Registrationform(Name, Age, Weight, EmailId,file) values(?, ?, ?, ?,?)");
		$stmt->bind_param("siisb", $Name, $Age, $Weight, $EmailId, $file);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>