<?php 

include "../sampleData.php";

/*echo "<script> var studentData = [";
for ($i = 0; $i < count($tutorData); $i++) {
	echo "\"" . $tutorData[$i]["Name"] . "\",";
}
echo "]</script>";*/

/*


TODO::::

Saving, adding courses


*/

/*$boolswitch = true;
$boolswitch = ($boolswitch != true);*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tutor-Manager Backend</title>
	<link rel="stylesheet" href="../../../resources/style.css">
	<style>

		/*
			Tutor Styling
		*/

		#tutors {
			position: absolute;
			top: 0px;
			left: 0px;

			width: calc(50% - 10px);
			height: calc(100% - 10px);

			margin: 5px 0px 5px 5px;

			overflow: scroll;
		}
		.tutors_block {
			border: 1px solid #000;
			padding: 4px 4px 4px 4px;

			margin: 5px 0px 5px 0px;

			overflow: hidden;
		}
		.tutors_block_header {
			margin: 0px 0px 20px 0px;
		}
		.tutors_block_select, .tutors_block_newcourse {
			margin: 5px 0px 5px 0px;
		}
		.tutors_block_select_remove:hover, .tutors_block_select_add:hover {
			cursor: pointer;
		}

		/*
			Course List
		*/

		#courselist {
			position: absolute;
			top: 0px;
			right: 0px;

			width: calc(50% - 10px);
			height: calc(100% - 10px);

			margin: 5px 5px 5px 0px;
		}
		#courselist_list {
			padding: 4px 4px 4px 4px;
			border: 1px solid #000;

			margin: 5px 0px 0px 0px;

			max-height: calc(100% - 32px);

			overflow: scroll;
		}
		.courselist_list_item {
			margin: 2px 0px 2px 0px;
			padding: 2px 2px 2px 2px;
		}
		.courselist_list_item:hover {
			background-color:rgba(0,0,0,0.05);
		}
	</style>
</head>
<body>
	<div id="tutors">
		<font style="/* predefined wordpress styling */">Tutors</font>

		<!-- Dynamically create with new tutors -->
		<?php
			for ($tutor = 0; $tutor < count($tutorData); $tutor++) {
				echo "
					<div class=\"tutors_block\">
						<div class=\"tutors_block_header\">
							" . $tutorData[$tutor]["Name"] . " |
							<a class=\"tutors_block_edit\" href=\"#\">Edit</a> |
							Can Teach: ";

							$maxCourseLength = 5;

							for ($i = 0; $i < count($tutorData[$tutor]["Courses"]); $i++) {
								if ($i < $maxCourseLength) {
								 	echo $tutorData[$tutor]["Courses"][$i];
							 	}
							 	if ($i != count($tutorData[$tutor]["Courses"]) - 1 && $i < $maxCourseLength - 1) {
								 	echo ", ";
								}
								if ($i == $maxCourseLength - 1) {
									echo "...";
								}
							}

						echo "</div>
						Courses Tutor List:
						";

						for ($i = 0; $i < count($tutorData[$tutor]["Courses"]); $i++) {
							echo "
							<div class=\"tutors_block_select\">
								<select class=\"tutors_block_select_select\">
									<option value=\"" . $tutorData[$tutor]["Courses"][$i] . "\">" . $tutorData[$tutor]["Courses"][$i] . "</option>
								</select>
								<img class=\"tutors_block_select_remove\" src=\"images/redx.png\">
							</div>";
						}

						echo "
						<div class=\"tutors_block_newcourse\">
							<select>
								<option value=\"\" selected>Pick one:</option>";
									for ($i = 0; $i < count($courseData); $i++) {
										echo "<option value=\"" . $courseData[$i] . "\">" . $courseData[$i] . "</option>" . "\r\n";
									}
							echo "
							</select>
							<img class=\"tutors_block_select_add\" src=\"images/greenplus.png\">
						</div>
						<button type=\"button\" onclick=\"/* do save */\" style=\"\">Save</button>
					</div>";
			}
		?>
	</div>
	<div id="courselist">
		<font style="/* predefined wordpress styling */">Master Course List</font>
		
		<div id="courselist_list">
			<?php
				for ($i = 0; $i < count($courseData); $i++) {
					echo "<div class=\"courselist_list_item\">" . $courseData[$i] . "</div>" . "\r\n";
				}
			?>
		</div>
	</div>
</body>
</html>

<script>

var editClasses = document.getElementsByClassName("tutors_block_edit");
for (var i = 0; i < editClasses.length; i++) {
	editClasses[i].onclick = toggle_edit;
	editClasses[i].originalHeight = editClasses[i].parentNode.parentNode.offsetHeight;

	editClasses[i].onclick();
}

// Placeholder for dynamically changing image sizes
var removeClasses = document.getElementsByClassName("tutors_block_select_remove");
for (var i = 0; i < removeClasses.length; i++) {
	removeClasses[i].height = "12";//removeClasses[i].parentNode.offsetHeight;
	removeClasses[i].onclick = select_delete;
}

// Placeholder for dynamically changing image sizes
var addClasses = document.getElementsByClassName("tutors_block_select_add");
for (var i = 0; i < addClasses.length; i++) {
	addClasses[i].height = "12";//removeClasses[i].parentNode.offsetHeight;
	addClasses[i].onlick = select_add;
}

function toggle_edit() {
	if (this.parentNode.parentNode.offsetHeight == this.originalHeight) {
		this.parentNode.parentNode.style.height = "12px";
	} else {
		this.parentNode.parentNode.style.height = this.originalHeight - 10 + "px";
	}
}

function select_delete() {
	this.parentNode.parentNode.removeChild(this.parentNode);
}

function select_add() {

}

</script>