<?php 
include('../../sampleData.php');

$courseCodes = getStudentsByCourse($studentData);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TutorManager Back End (Student Display)</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

	<link rel="stylesheet" href="../../../resources/style.css">


</head>
<body>
	<div class="container">
		<h1>All Students</h1>
		<?php foreach ($courseCodes as $course): ?>

			<div class="col-md-4">
				<h2>
					<?php echo $course[0]; ?>
				</h2>
				<table>
					<tr>
						<th>Application Date</th>
						<th>Days Since Application</th>
						<th>Name</th>
						<th>HasTutor</th>
					</tr>
					<?php foreach ($course[1] as $student): ?>
					<tr>
						<td><?php echo $student["SubmitDate"] -> format('Y-m-d'); ?></td>
						<td>
							<?php
							$now 			= date_create(date('Y-m-d'));
							$submitDate 	=$student["SubmitDate"];

							echo date_diff($submitDate,$now)->format('%a');

							?>
						</td>
						<td><?php echo $student["Name"]; ?></td>
						<td>
							<?php 
							if ($student["Tutored"])
							{
								echo "Yes";
							}
							else
							{
								echo "No"; 
							}
							?>
						</td>
					</tr>

					<?php endforeach; ?>
				</table>
			</div>
	
		<?php endforeach; ?>

	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>