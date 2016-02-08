<?php 

//[ctc_tutor_form]
function ctc_tutor_form_func(){
	 // ob_start();
	 include(ctc_plugin_dir.'views/front-end/findTutor/index.php');
	 // ob_clean();
}

add_shortcode("ctc_tutor_form", "ctc_tutor_form_func" );

 ?>