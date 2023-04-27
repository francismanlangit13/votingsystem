<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="login-box">
  	<div class="login-logo">
  		<b style="color:white;">USTP-Panaon Voting System</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Password recovery</p>

    	<form action="pass-forgot.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Email" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-12">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="forgot_btn"><i class="fa fa-envelope"></i> Reset password</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
<style>
	body{
		background-image: url('../images/background.jpg') !important;
		background-size: cover;
	}
</style>
<script src="../dist/js/showpass1.js"></script>
</html>