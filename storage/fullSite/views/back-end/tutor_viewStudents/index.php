<?php include("sampleData.php"); ?>

<html>
<head>

	<!--Code Jam 2015. EngLinks. Task 2. Anna Ilina.
		Develop the form for the Tutor Back End (list of courses, in columns).
		Columns must wrap around. -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<!-- Include Style Directory -->
	<link rel = "stylesheet" type = "text/CSS" href = "../../../resources/style.css">

</head>
<body>

	<!-- Makes a list of students, format [["courseTitle1", [stud1, stud2, stud3]],["courseTitle1", [stud1, stud2, stud3]]] -->
	
	<?php
	$studInEachCourse = getStudentsByCourse($studentData);
	?>

	<!-- Printing the table -->

	<?php $counter = 0; // for knowing when to wrap rows (3 col per row)?>
	<div class = "container">
		<h1>Students In Need Of A Tutor</h1>
		<?php foreach ($studInEachCourse as $course): ?>

			<!-- starting a row -->
			<?php if ($counter % 3 == 0): ?>
				<div class = "row">
			<?php endif; ?>

			<!-- making columns and printing stuff -->
			<div class='col-md-4'>
				<h2><?php echo $course[0] ?></h2> <!-- prints course title -->
					<table>
						<tr>
							<th>Application Date</th>
							<th>Name</th>
						</tr>
						<?php foreach ($course[1] as $stud): ?>
						<tr>
							<td><?php echo $stud["SubmitDate"] -> format('Y-m-d'); ?></td>
							<td><?php echo $stud["Name"]; ?></td>

								<!--for ($i = 0; $i < count($course[1]); $i++){
									echo $course[1][$i]["Name"]."<br>";
								} -->
						</tr>
						<?php endforeach; ?>
				</table>
			</div>

			<!-- closing a row -->
			<?php if ($counter % 3 == 2): ?>
				</div>
			<?php endif; ?>

		<?php $counter += 1	?>
		<?php endforeach; ?>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>