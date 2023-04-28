<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="schoolID" class="col-sm-3 control-label">School ID</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="voters_id-input" name="schoolID" required>
                      <div id="voters_id-error"></div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="year" class="col-sm-3 control-label">Year Level</label>
                  <div class="col-sm-9">
                    <select id="year" name="year" class="form-control form-control-sm form-control-border select2" required>
                      <option value="" disabled selected>Select Year Level</option>
                      <option value="1st Year">1st Year</option>
                      <option value="2nd Year">2nd Year</option>
                      <option value="3rd Year">3rd Year</option>
                      <option value="4th Year">4th Year</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="course" class="col-sm-3 control-label">Course</label>
                  <div class="col-sm-9">
                    <select id="course" name="course" class="form-control form-control-sm form-control-border select2" required>
                      <option value="" disabled selected>Select Course</option>
                      <option value="BSIT">BSIT</option>
                      <option value="BSMB">BSMB</option>
                      <option value="BTLE">BTLE</option>
                      <option value="BTLE HE">BTLE HE</option>
                      <option value="BTLE IA">BTLE IA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" id="submit-btn" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                  <label for="year" class="col-sm-3 control-label">Year Level</label>
                  <div class="col-sm-9">
                    <select id="edit_year" name="year" class="form-control form-control-sm form-control-border select2" required>
                      <option value="1st Year" <?php echo isset($year) && $year == '1st Year' ? 'selected' : '' ?>>1st Year</option>
                      <option value="2nd Year" <?php echo isset($year) && $year == '2nd Year' ? 'selected' : '' ?>>2nd Year</option>
                      <option value="3rd Year" <?php echo isset($year) && $year == '3rd Year' ? 'selected' : '' ?>>3rd Year</option>
                      <option value="4th Year" <?php echo isset($year) && $year == '4th Year' ? 'selected' : '' ?>>4th Year</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="course" class="col-sm-3 control-label">Course</label>
                  <div class="col-sm-9">
                    <select id="edit_course" name="course" class="form-control form-control-sm form-control-border select2" required>
                      <option value="BSIT" <?php echo isset($course) && $course == 'BSIT' ? 'selected' : '' ?>>BSIT</option>
                      <option value="BSMB" <?php echo isset($course) && $course == 'BSMB' ? 'selected' : '' ?>>BSMB</option>
                      <option value="BTLE" <?php echo isset($course) && $course == 'BTLE' ? 'selected' : '' ?>>BTLE</option>
                      <option value="BTLE HE" <?php echo isset($course) && $course == 'BTLE HE' ? 'selected' : '' ?>>BTLE HE</option>
                      <option value="BTLE IA" <?php echo isset($course) && $course == 'BTLE IA' ? 'selected' : '' ?>>BTLE IA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                      <i style="font-size:1.3rem; margin-left:0rem;">Leave this blank if you dont want to change password...</i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>