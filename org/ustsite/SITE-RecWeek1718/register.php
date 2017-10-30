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
<script src="js/script.js"></script>
</head>
<style>	
	html, body {
		min-width: 600px;
		width: 50%;
		max-width: 800px;
		margin: 0 auto;
	}
</style>
    <body>
    <?php
		
	?>
	
	<form method="get" action="insertToDB.php" id="form-work">
	
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="studentNumber">Student Number</label>
				<input type="text" name="studentNumber" class="form-control" placeholder="Student Number" pattern="[0-9]{10}" required>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="name">Name</label>
				<div class="row">
					<div class="form-group col-xs-5"><input type="text" id="lastName" name="lastName" required class="input-name form-control" placeholder="Last Name"></div>
					<div class="form-group col-xs-5"><input type="text" id="firstName" name="firstName" required class="input-name form-control" placeholder="First Name"></div>
					<div class="form-group col-xs-2"><input type="text" id="miName" name="miName" required pattern=".{1,2}" class="input-name form-control" placeholder="MI"></div>
				</div>
				<input type="text" name="fullName" id="name-preview" disabled class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="birthdate">Birthdate</label>
				<div class="row">
					<div class="form-group col-xs-7"><input type="text" id="birthdate" name="birthdate" class="form-control" placeholder="mm/dd/yyyy"></div>
					<div class="form-group col-xs-5"><input type="text" id="age" name="age" class="form-control" readonly="readonly"></div>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="gender">Gender</label>
				<br />
				<label class="radio-inline"><input type="radio" name="gender" value="Male" checked>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="section">Section</label>
				<div class="row">
					<div class="form-group col-xs-2">
						<select class="form-control" id="yearLevel" name="yearLevel" required>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<div class="form-group col-xs-2">
						<input type="text" placeholder="- IT -" id="IT" name="IT" class="form-control" disabled>
					</div>
					<div class="form-group col-xs-2">
						<select class="form-control" id="blockLetter" name="blockLetter" required>
							<option>A</option>
							<option>B</option>
							<option>C</option>
							<option>D</option>
							<option>E</option>
							<option>F</option>
							<option>G</option>
							<option>H</option>
							<option>I</option>
							<option>J</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="email">Email</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter an email." placeholder="Email Address" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="facebook">Facebook</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-facebook-square fa-fw"></i></span>
					<span class="input-group-addon">facebook.com/</span>
					<input type="text" name="facebook" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="control-label" for="contactNumber">Contact</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					<span class="input-group-addon">+63</span>
					<input type="text" name="contactNumber" pattern="[0-9]{10}" title="Enter a phone number." placeholder="Phone Number" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="submit" class="btn btn-default btn-block">Submit</button>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="button" onclick="location.href='index.php'" class="btn btn-default btn-block">Back</button>
			</div>
		</div>
		
	</form>
	
	
	<script>
		$(document).ready(function() {
			$('.input-name').on('input', function() {
				var str = $('#lastName').val().toUpperCase() + ", " + $('#firstName').val() + " " + $('#miName').val() + ".";
				if ($('#lastName').val().length > 0 && $('#firstName').val().length > 0) {
					$('#name-preview').val(str);
				}
			});

			$('#birthdate').datepicker();
			
			$('#birthdate').on('input', function() {
				var curDate = new Date();
				var birthDate = new Date($('#birthdate').val());

				var yearsOld = (curDate.getFullYear() - birthDate.getFullYear()) + " years old";
				if ($('#birthdate').val().length == 10) {
					$('#age').val(yearsOld);
				} else {
					$('#age').val("");
				}
			});
		});
	</script>
    </body>
</html>