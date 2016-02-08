<?php 


$result = add_role(
	'Tutor',
	'Tutor',
	array(
		'read'			=> true,
		'edit_posts' 	=> false,	
		)
	);
$result2 = add_role(
	'Tutor_manager',
	'Tutor Manager',
	array(
		'read'			=> true
		)
	);

 ?>