<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>USTP - Panaon Voting System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/chosen.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
	<?php
	      		$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
    			$title = $parse['election_title'];
	      	?>
	<body style = "background-color:#d3d3d3;">
		<div class = "container-fluid">
			<div class = "col-lg-1"></div>
			<h3 style="text-align:center; font-size:2rem;"><b><?php echo $title ?> </b></h3>
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="text-align: center;">Your Votes</h4>
            <div class="modal-body">
              <?php
                $id = $voter['id'];
                $sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE voters_id = '$id'  ORDER BY positions.priority ASC";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                  echo "
                    <div class='row votelist'>
                      <span class='col-sm-6'><span class='pull-right'><b>".$row['description']." :</b></span></span> 
                      <span class='col-sm-6'>".$row['canfirst']." ".$row['canlast']."</span>
                    </div>
                  ";
                }
              ?>
            </div>
		</div>
	</body>
	<style type="text/css" media="print">
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    </style>
	<style media="printer">
		.noprint * {
			display:none;
		}
		body {
			visibility: hidden;
		}
		.printthis {
			visibility: visible;
		}
	</style>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/chosen.jquery.min.js"></script>	
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#student").chosen({ width:"auto" });	
		})
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
</html>