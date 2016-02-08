<?php 
	//Create student data
	$student = [
		"Name" => "",
		"Email" => "",
		"Course" => "APSC-101",
		"Comments" => "Hi I really need help. Please help me!",
		];

	$studentData = array();

	for ($i=0; $i < 20; $i++) { 
		$studentData[$i] = $student;
		$studentData[$i]["Name"] .= (string) $i;
		$studentData[$i]["Email"] = "Person". (string) $i . "@queensu.ca";
	}
 ?>