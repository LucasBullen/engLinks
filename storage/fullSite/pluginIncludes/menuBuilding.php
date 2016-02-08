<?php
	add_action( 'admin_menu', 'my_plugin_menu' );

	function my_plugin_menu() {
		$user = string (wp_get_current_user());
		echo $user;
		if( in_array( "author", (array) $user->roles )) {
			echo '';
		}
		add_dashboard_page(
				'Tutors',
				'Tutors',
				'read',
				'myuniqueidentifier',
				'my_plugin_options'

			);
		add_dashboard_page(
				'View Students',
				'Students',
				'read',
				'myuniqueidentifier1',
				'ctc_students'
			);
	}
	function my_plugin_options() {
		if ( !current_user_can( 'manage_options' ) ) {
			wp_die(( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		include(ctc_plugin_dir.'views/back-end/tutor_viewStudents/index.php');
		echo '</div>';
	}
	function ctc_students() {
		if ( !current_user_can( 'manage_options' ) ) {
			wp_die(( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		include(ctc_plugin_dir.'views/back-end/tutor_viewStudents_details/index.php');
		echo '</div>';
	}
?>