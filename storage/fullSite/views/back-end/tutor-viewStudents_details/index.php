
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href= "../../../resources/style.css">
<title> Back end </title>
</head>
<body>
<?php include '../../sampleData.php'; ?>
<div class="container-fluid">
<div class = "row">
	<div class="col-xs-6">
		<strong><?php echo $studentData[0]["Name"]?></strong><br>
		Needs help with: <?php echo $studentData[0]["Course"]?><br>
		Message:<br>
		<?php echo $studentData[0]["Comments"]?><br>
		<form action = "" method="post">
		<input type ="Submit" id = "change" name = "tutor" value ="I'm going to tutor">
		</form>
		<p id ="here"></p>
	</div>
		<script>
			function changeButton(){
				var elem = document.getElementById('change');
				elem.parentNode.removeChild(elem);
				document.getElementById('here').innerHTML = "Congrats! You have another student to teach!"
			}
		</script>
	<div class ="col-xs-6">
		Contact <?php echo $studentData[0]["Name"]?>:
		<br>
		Subject:
		<form action = "" method="post">
			<input type="text" required name="Subject" pattern="[a-zA-Z0-9]+">
			<br>
			Message:
			<br>
			<textarea name="Message"> </textarea>
			<br>
			 <input type ="Submit" name = "contact" value="Contact">
			</button>
		</form>
		<?php 
			#$studentData[0]["Email"] = "austinattah@live.ca";
			#echo (string) $studentData[0]["Email"];
			#echo "<br>";
			#$tutorData["Email"] = "prajj.mondal@gmail.com";
			#echo (string) $tutorData["Email"];
			#echo "<br>";
			if (isset($_POST['contact'])){
				$to = $studentData["id"]["Email"];
				$subject = $_POST["Subject"];
				$message = $_POST["Message"];
				$headers = 'From:'. $studentData[0]["Email"] . "\r\n" . 
							'Reply-To:'. $tutorData["Email"] . "\r\n" . 
							'X-Mailer: PHP/'. phpversion();
				error_reporting(E_ALL);
				if (mail((string)$studentData[0]["Email"],(string)$subject, (string)$message,$headers)) 
					echo "Mail sent successfully.";
				else
					echo "MAIL NOT SENT!";
			}
			elseif (isset($_POST['tutor'])){
				$studentData[0]["Tutored"] = True;	
				echo "<body onload='changeButton()'>";
			}
		?>
	</div>
</div>
</div>
</body>
</html>