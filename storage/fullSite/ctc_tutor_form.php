<?php
/*
Plugin Name: Englinks Tutor Matcher
Plugin URI: http://www.queenscodethechange.com/
Description: This plugin provides an interface for automatically matching students with tutors. Developed by Anna Ilina, Kevin Zuern, Matthew Pollack, Daniel Lucia, Jerry Mak, Prajjwol Mondal, Austin Attah, Lucas Bullen.
Version: 1.0
Author: Code the Change, Queen's Chapter
Author URI: http://www.queenscodethechange.com/
License: GPL2
*/
/*
Copyright 2012  Queen's Code the Change  (email : queensu@codethechange.org)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
defined("ABSPATH") or die("No Script Kiddies Please!");	// Prevents direct access to PHP file
define('ctc_plugin_dir', plugin_dir_path(__FILE__)); 	// Fetch the url of the plugin directory.

class ctc_tutor_form {

	public function __construct()
	{
		include('pluginIncludes/do_roles.php');
		include('pluginIncludes/prajjAustinJerrry.php');
		include('pluginIncludes/menuBuilding.php');
		include('pluginIncludes/shortcode.php');

	} // END public function __construct()

	public function activate()
	{
		// Activate the plugin
		include('models/database.php');
		installDatabase();
	} // END public function activate()

	public function deactivate()
	{
		// Deactivate the plugin
	} // END public function deactivate()

	


}

// Installation and Uninstallation Hooks
register_activation_hook(__FILE__,array('ctc_tutor_form','activate'));
register_deactivation_hook(__FILE__,array('ctc_tutor_form','deactivate'));

// Create the plugin object
$the_plugin = new ctc_tutor_form();