<?php
/*
Plugin Name: WP Plugin Template
Plugin URI: http://fyaconiello.github.com/wp-plugin-template
Description: A simple WordPress plugin template
Version: 1.0
Author: Francis Yaconiello
Author URI: http://www.yaconiello.com
License: GPL2
*/
/*
Copyright 2012  Francis Yaconiello  (email : francis@yaconiello.com)

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
		// Register the plugin and that fun stuff
	} // END public function __construct()

	public function activate()
	{
		// Activate the plugin
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