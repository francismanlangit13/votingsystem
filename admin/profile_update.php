<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$current_hash = MD5($curr_password);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];
		if($user['password'] == $current_hash ){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
				$new_password= $_POST['password'];
				$password = md5($new_password);
				$sql0 = "UPDATE `admin` SET `password` = '$password' WHERE `id` = '".$user['id']."'";
				$sql0_run = mysqli_query($conn, $sql0);
			}

			$sql = "UPDATE admin SET email = '$username', firstname = '$firstname', lastname = '$lastname', photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'User profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>