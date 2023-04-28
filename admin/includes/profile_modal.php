<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>My Account</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="username" name="username" value="<?php echo $user['email']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-9"> 
                    <input type="password" class="form-control" id="password" name="password" value="">
                    <a href="javascript:void(0)"  style="position: relative; top: -2.8rem; left: 90%; cursor: pointer; color: lightgray;">
                      <img alt="show password icon" src="../dist/img/eye-close.png" width="25rem" height="2%" id="togglePassword">
                    </a>
                    <i style="font-size:1.3rem; margin-left:-2.5rem;">Leave this blank if you dont want to change password...</i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password1" class="col-sm-3 control-label" style="padding-right: 0px !important;">Confirm Password</label>
                  <div class="col-sm-9"> 
                    <input type="password" class="form-control" id="password1" name="confirm_password" value="">
                    <a href="javascript:void(0)"  style="position: relative; top: -2.8rem; left: 90%; cursor: pointer; color: lightgray;">
                      <img alt="show password icon" src="../dist/img/eye-close.png" width="25rem" height="2%" id="togglePassword1">
                    </a>
                  </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password2" name="curr_password" required>
                      <a href="javascript:void(0)"  style="position: relative; top: -2.8rem; left: 90%; cursor: pointer; color: lightgray;">
                        <img alt="show password icon" src="../dist/img/eye-close.png" width="25rem" height="2%" id="togglePassword2">
                      </a>
                      <small><i style="margin-left:-2.5rem;">input current password to save changes.</i></small>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<script src="../dist/js/showpass2.js"></script>
<script>
  // Get references to the password fields and label
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('password1');
  const confirmLabel = document.querySelector('label[for="password1"]');

  // Function to check if passwords match and update required class
  function checkPasswords() {
    if (passwordInput.value) {
      confirmLabel.classList.add('required');
    } else {
      confirmLabel.classList.remove('required');
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
      confirmPasswordInput.setCustomValidity("Passwords do not match");
    } else {
      confirmPasswordInput.setCustomValidity("");
    }
  }

  // Add event listeners to the password fields
  passwordInput.addEventListener('input', checkPasswords);
  confirmPasswordInput.addEventListener('input', checkPasswords);
</script>
<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>