<?php


//$sql .= $wpdb->query($wpdb->prepare("CREATE TABLE IF NOT EXISTS $table_name (  col1 int(11) default NULL,  col2 text ) ENGINE=MyISAM DEFAULT CHARSET=utf8")); 
//$sql2 .= $wpdb->query($wpdb->prepare("INSERT INTO $table_name(col1, col2) VALUES (1, 1, 1, 'text string.'), (1, 1, 2, 'text string.'), (1, 1, 3, 'text string.')"));

function installDatabase() {
	global $wpdb;

	$charset = $wpdb->get_charset_collate();

	//require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$wpdb->get_results("CREATE TABLE IF NOT EXISTS ctc_applications (
	aid int(10) NOT NULL,
	  email varchar(64) NOT NULL,
	  course int(10) NOT NULL,
	  comments varchar(1024) NOT NULL,
	  submitdate varchar(10) NOT NULL,
	  tutored int(1) NOT NULL,
	  `name` varchar(64) NOT NULL
	) ENGINE=MyISAM  DEFAULT CHARSET=" . $charset . " AUTO_INCREMENT=2 ");

	$wpdb->get_results("CREATE TABLE IF NOT EXISTS ctc_courses (
	cid int(10) NOT NULL,
	  `code` varchar(16) NOT NULL
	) ENGINE=MyISAM  DEFAULT CHARSET=" . $charset . " AUTO_INCREMENT=4 ");

	$wpdb->get_results("CREATE TABLE IF NOT EXISTS ctc_tutors (
	tid int(10) NOT NULL,
	  `name` varchar(64) NOT NULL,
	  email varchar(64) NOT NULL,
	  courses varchar(1024) NOT NULL
	) ENGINE=MyISAM  DEFAULT CHARSET=" . $charset . " AUTO_INCREMENT=2 ");

	$wpdb->get_results("ALTER TABLE ctc_applications
	 ADD PRIMARY KEY (aid)");

	$wpdb->get_results("ALTER TABLE ctc_courses
	 ADD PRIMARY KEY (cid)");

	$wpdb->get_results("ALTER TABLE ctc_tutors
	 ADD PRIMARY KEY (tid)");

	$wpdb->get_results("ALTER TABLE ctc_applications
	MODIFY aid int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2");

	$wpdb->get_results("ALTER TABLE ctc_courses
	MODIFY cid int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4");

	$wpdb->get_results("ALTER TABLE ctc_tutors
	MODIFY tid int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2");

	//dbDelta(file_get_contents("englinks.sql"));
}

function loadApplications() {
	global $wpdb;

	return $wpdb->get_results( 'SELECT * FROM ctc_applications', OBJECT );
}

function loadTutors() {
	global $wpdb;

	return $wpdb->get_results( 'SELECT * FROM ctc_tutors', OBJECT );
}

function loadCourses() {
	global $wpdb;

	return $wpdb->get_results( 'SELECT * FROM ctc_courses', OBJECT );
}

/*


SAMPLE DATA THINGS


*/

function createStudentSampleData() {
	$studentData = array();
	$student = [
	"Name" 			=> "Person",
	"Email" 		=> "",
	"Course" 		=> "APSC-101",
	"Comments" 		=> "Hi I really need help. Please help me!",
	"ID"			=> 0,
	"Tutored"		=> False
	];

	

	for ($i=0; $i < 20; $i++) { 
		global $studentData;
		$studentData[$i] 			= $student;
		$studentData[$i]["Name"] 	.= (string)$i;
		$studentData[$i]["Email"] 	= "Person". (string)$i . "@queensu.ca";
		$studentData[$i]["ID"] 		= $i;
	}
	for ($i=0; $i < 10; $i++) { 
		$studentData[$i]["Course"] 	= "APSC-201";
	}
	return $studentData;
}

function createTutorSampleData($courseData) {
	$returnArray = array();
	for ($i = 0; $i < 4; $i++) {
		$courses = array();
		for ($c = 0; $c < count($courseData); $c++) {
			array_push($courses, $courseData[$c]);
		}
		array_push($returnArray, [
			"Name" => "Tutor " . $i,
			"Email" => "tutor" . $i . "@queensu.ca",
			"Courses" => $courses,
			]);
	}
	return $returnArray;
}

function getStudentsByCourse($studentList) {
	$courseCodes = [];
	foreach ($studentList as $s) {
		if (array_key_exists($s["Course"],$courseCodes)) {
			$courseCodes[$s["Course"]][] = $s;
		}
		else {
			$courseCodes[] = $s["Course"];
			$courseCodes[$s["Course"]][] = $s;
		}
		return $courseCodes;
	}
}

$courseData = [
	"APSC-101",
	"APSC-102",
	"APSC-103",
	"APSC-104",
	"APSC-105",
	"APSC-106",
	"APSC-107",
	"APSC-108",
	"APSC-109",
	"APSC-110",
	"APSC-111",
	"APSC-112"
];
$studentData = createStudentSampleData();
$tutorData = createTutorSampleData($courseData);


$derp = "depr";

?>