<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$status = $_POST['status'];

		$sql = "SELECT * FROM admin WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$sql = "UPDATE admin SET firstname = '$firstname', lastname = '$lastname', role = '$role', status = '$status' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: users.php');

?>