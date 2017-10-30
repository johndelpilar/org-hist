<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>UST-SITE</title>

<link rel="icon" href="img/site-icon.png">

<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/style.css">

<script src="js/jquery-latest.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/script.js"></script>
</head>
    <body>
    <?php
		
	?>
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" onclick="location.href='index.php'" class="btn btn-default btn-block">Back</button>
			</div>
		</div>
		
		<br />
		<br />
		<br />
		
		<script>
			var elevatedUser = prompt("Enter password:");
			if (elevatedUser != "ustsite1718") {
				alert("Incorrect!");
				location.href = 'index.php';
			}
		</script>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="site-members-1718" class="table table-hover table-striped table-responsive">
					<thead>
						<tr>
							<th>Student Number</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>MI</th>
							<th>Birthdate</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Section</th>
							<th>Email</th>
							<th>Facebook</th>
							<th>Contact Number</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							class TableRows extends RecursiveIteratorIterator {
								function __construct($it) {
									parent::__construct($it, self::LEAVES_ONLY);
								}
							
								function current() {
									return "<td>" . parent::current(). "</td>";
								}
							
								function beginChildren() {
									echo "<tr>";
								}
							
								function endChildren() {
									echo "</tr>" . "\n";
								}
							}
								
							$servername = "localhost";
							$username = "root";
							$password = "john_ust";
							$dbname = "ust_site";
							
							$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
							$stmt = $conn->prepare("SELECT * FROM `site_members_1718`");
							
							$stmt->execute();
							
							$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
							
							foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
								echo $v;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		
		<script>
			$(document).ready(function() {
			    $('#site-members-1718').DataTable();
			});
		</script>
		
    </body>
</html>