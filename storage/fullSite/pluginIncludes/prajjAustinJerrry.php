<?php
function ctc_tutor_form_load_front_end(){
	ob_start();
	include ('/../views/front-end/findTutor/index.php');
	ob_get_clean();
}
add_shortcode('ctc_tutor_form', 'ctc_tutor_form_load_front_end');
?>