<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="login-box">
  	<div class="login-logo">
  		<b style="color:white;">USTP-Panaon Voting System</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="voter" placeholder="ID Number" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			<a href="javascript:void(0)"  style="position: relative; top: -2.8rem; left: 82%; cursor: pointer; color: lightgray;">
				<img alt="show password icon" src="dist/img/eye-close.png" width="25rem" height="2%" id="togglePassword">
			</a>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-6">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
				<div class="col-xs-6">
					<button><a href="./admin" style="position:left;">Administrators Here</a></button>
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
		background-image: url('./images/background.jpg') !important;
		background-size: cover;
	}
</style>
<script src="dist/js/showpass.js"></script>
</html>