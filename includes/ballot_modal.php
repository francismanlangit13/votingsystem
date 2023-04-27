<!-- Preview -->
<div class="modal fade" id="preview_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Vote Preview</h4>
            </div>
            <div class="modal-body">
              <div id="preview_body"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Platform -->
<div class="modal fade" id="platform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="candidate"></b></h4>
            </div>
            <div class="modal-body">
              <p id="plat_view"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View Ballot -->
<div class="modal fade" id="view">
    <div class="modal-dialog noMover text-center" style="width:800px !important;">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close noPrint" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Your Votes</h4>
            </div>
            <div class="modal-body">
              <?php
                $id = $voter['id'];
                $sql = "SELECT voters_id, DATE_FORMAT(votes.date_voted, '%m-%d-%Y %h:%i:%s %p') as short_date_voted FROM votes WHERE voters_id = '$id'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();
                $short_date_voted = $row['short_date_voted'];
              ?>
              <div class='row col-md-12 votelist' style="display:inline-flex; flex-wrap:nowrap; margin-left:0rem;">
                <div class="col-md-6 mb-3">
                  <span><b>Voter Name</b><br><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
                </div>
                <div class="col-md-3 mb-3">
                  <span><b>School ID</b><br><?php echo $voter['voters_id']; ?></span>
                </div>
                <div class="col-md-3 mb-3">
                  <span><b>Course</b><br><?php echo $voter['course']; ?></span>
                </div>
                <div class="col-md-3 mb-3">
                  <span><b>Year</b><br><?php echo $voter['year']; ?></span>
                </div>
                <div class="col-md-6 mb-3">
                  <span><b>Date Voted</b><br><?php echo $row['short_date_voted']; ?></span>
                </div>
              </div>
              <?php
                $id = $voter['id'];
                $sql = "SELECT *, DATE_FORMAT(votes.date_voted, '%m-%d-%Y %h:%i:%s %p') as short_date_voted, candidates.firstname AS canfirst, candidates.lastname AS canlast, candidates.course AS cancourse, candidates.year AS canyear FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE voters_id = '$id'  ORDER BY positions.priority ASC";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                echo "
                  <table class='a'>
                    <tr>
                      <th>".$row['description']."</th> 
                      <td>".$row['canfirst']." ".$row['canlast']." <small style='font-size:1.2rem;'>(".$row['cancourse']."-".$row['canyear'].")</small> </td>
                    </tr>
                  </table>
                "; }
              ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left noPrint" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <a href="void:javascript" onclick="window.print();" class="noPrint"><button type="button" class="btn btn-default btn-flat btn-text-left" ><i class="fa fa-print"></i> Print</button></a>
            </div>
        </div>
    </div>
</div>
<style type="text/css" media="print">
  @page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
  }
</style>
<style type="text/css">
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #000000;
  }
  table.a {
    table-layout: fixed;
    width: 100%;  
  }
</style>
<style>
  .btn-text-left{
	text-align: left;	
}
@media print {
  .noPrint{
    display:none;
  }
  .noMover{
    top:80px;
    text-align:center;
  }
}
</style>