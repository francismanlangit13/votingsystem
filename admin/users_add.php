<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$date = date('Y-m-d');
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$status = $_POST['status'];
		$password = $_POST['password'];
		$newpass = MD5($password);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO admin (email, password, firstname, lastname, role, status, photo, created_on) VALUES ('$email', '$newpass', '$firstname', '$lastname', '$role', '$status', '$filename', '$date')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: users');
?>