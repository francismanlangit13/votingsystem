<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$year = $_POST['year'];
		$course = $_POST['course'];

		$sql = "SELECT * FROM voters WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if(isset($_POST['password']) && !empty($_POST['password'])){
			$new_password= $_POST['password'];
			$password = md5($new_password);
			$sql0 = "UPDATE `voters` SET `password` = '$password' WHERE id = '$id'";
			$sql0_run = mysqli_query($conn, $sql0);
		}

		$sql = "UPDATE voters SET firstname = '$firstname', lastname = '$lastname', year = '$year', course = '$course' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: voters.php');

?>