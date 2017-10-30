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
    <body>
    <?php
	    function is_connected() {
	    	$connected = @fsockopen("www.example.com", 80);
	    	if ($connected) {
	    		$is_conn = true;
	    		fclose($connected);
	    	} else {
	    		$is_conn = false;
	    	}
	    	return $is_conn;
	    }

		class RaffleStats {
			private static $prizes = array();

			function __construct() {
				self::$prizes['prize-1'] = 0.4;
				self::$prizes['prize-2'] = 0.3;
				self::$prizes['prize-3'] = 0.2;
				self::$prizes['prize-4'] = 0.1;

				self::setPrizesWithCumulativeProbabilities();
			}

			public static function getPrizes() {
				return self::$prize;
			}

			private static function setPrizesWithCumulativeProbabilities() {
				$accumulator = 0.0;
				foreach (self::$prizes as $prize => $chance) {
					$accumulator += $chance;
					self::$prizes[$prize] = $accumulator;
				}
			}
			
		}
	    
		$servername = "localhost";
		$username = "root";
		$password = "john_ust";
		$dbname = "ust_site";
		
		$studentNumber 	= $_GET["studentNumber"];
		$lastName 		= $_GET["lastName"];
		$firstName 		= $_GET["firstName"];
		$miName 		= $_GET["miName"];
		$birthdate 		= date('Y-m-d H:i:s', strtotime($_GET["birthdate"]));
		$age 			= (int) $_GET["age"];
		$gender 		= $_GET["gender"];
		$section 		= $_GET["yearLevel"] . "IT" . $_GET["blockLetter"];
		$email 			= $_GET["email"];
		$facebook		= $_GET["facebook"];
		$contactNumber 	= $_GET["contactNumber"];
		
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			#	$sql = "INSERT INTO site_members_1718 (student_number, last_name, first_name, mi, birthdate, age, gender, section, email, facebook, contact_number)
			#	    VALUES ($studentNumber, '$lastName', '$firstName', '$miName', '$birthdate', $age, '$gender', '$section', '$email', '$facebook', $contactNumber)";
			
			$stmt = $conn->prepare("INSERT INTO site_members_1718 (student_number, last_name, first_name, mi, birthdate, age, gender, section, email, facebook, contact_number) VALUES (:studentNumber, :lastName, :firstName, :miName, :birthdate, :age, :gender, :section, :email, :facebook, :contactNumber)");

			$stmt->bindParam(':studentNumber', 	$studentNumber);
			$stmt->bindParam(':lastName', 		$lastName);
			$stmt->bindParam(':firstName', 		$firstName);
			$stmt->bindParam(':miName', 		$miName);
			$stmt->bindParam(':birthdate', 		$birthdate);
			$stmt->bindParam(':age', 			$age);
			$stmt->bindParam(':gender', 		$gender);
			$stmt->bindParam(':section', 		$section);
			$stmt->bindParam(':email', 			$email);
			$stmt->bindParam(':facebook', 		$facebook);
			$stmt->bindParam(':contactNumber', 	$contactNumber);
			
			#	$conn->exec($sql);
			$stmt->execute();
			
			echo "Record inserted on localhost!";
			/*
			if (is_connected()) {
				
				try {
					$conn_srv = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

					$conn_srv->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					#	$sql_srv = "INSERT INTO site_members_1718 (student_number, last_name, first_name, mi, birthdate, age, gender, section, email, facebook, contact_number)
					#	    VALUES ($studentNumber, '$lastName', '$firstName', '$miName', '$birthdate', $age, '$gender', '$section', '$email', '$facebook', $contactNumber)";
					
					$stmt_srv = $conn->prepare("INSERT INTO site_members_1718 (student_number, last_name, first_name, mi, birthdate, age, gender, section, email, facebook, contact_number) VALUES (:studentNumber, :lastName, :firstName, :miName, :birthdate, :age, :gender, :section, :email, :facebook, :contactNumber)");
		
					$stmt_srv->bindParam(':studentNumber', $studentNumber);
					$stmt_srv->bindParam(':lastName', $lastName);
					$stmt_srv->bindParam(':firstName', $firstName);
					$stmt_srv->bindParam(':miName', $miName);
					$stmt_srv->bindParam(':birthdate', $birthdate);
					$stmt_srv->bindParam(':age', $age);
					$stmt_srv->bindParam(':gender', $gender);
					$stmt_srv->bindParam(':section', $section);
					$stmt_srv->bindParam(':email', $email);
					$stmt_srv->bindParam(':facebook', $facebook);
					$stmt_srv->bindParam(':contactNumber', $contactNumber);
					
					#	$conn_srv->exec($sql);
					$stmt_srv->execute();
				}
				catch (PDOException $x) {
					print("<br><br><br>Error connecting to SQL Server.");
					# die(print_r($x));
					echo $x->getMessage();
				}
				$conn_srv = null;
			}//*/

			# code executed below is done after the record is inserted #
			
			foreach (RaffleStats::getPrizes() as $prize => $chance) {
				
			}



			# # # # # # # # # # # # # #

			header("location: register.php");
			
		} catch (PDOException $e) {

			echo $sql . "<br /><br /><br />" . $e->getMessage();
			/*
			if ($e->errorInfo[1] == 1062) {
				echo "<script>alert('That student number already exists!');</script>";
				
				header("location: register.php");
			}
			//*/
		}
		$conn = null;
	?>
    </body>
</html>
