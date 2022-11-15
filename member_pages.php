<?php
/*
    Plugin Name:       Member pages
    Plugin URI:        https://example.com/plugins/the-basics/
    Description:       Adds a membership area to your site. Works with S2Member plugin (required).
    Version:           1.0.0
    Author:            Matt Bedford
    Author URI:        https://app.mattbedford.work
    License:           GPL v2 or later
    License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 
    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 
    2 of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    with this program. If not, visit: https://www.gnu.org/licenses/
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// include dependencies
require plugin_dir_path( __FILE__ ) . '/apis/routes.php';
require plugin_dir_path( __FILE__ ) . '/apis/callbacks.php';
require plugin_dir_path( __FILE__ ) . 'script_inclusion.php';


// On activate, trigger new menu class
function initialize_member_pages() {
	require plugin_dir_path( __FILE__ ) . 'create_page.php';
    create_membership_page();
}
register_activation_hook( __FILE__, 'initialize_member_pages' ); 


//Create menu page
function do_member_pages_admin() {
	add_menu_page( 
		'Member pages',
		'Member pages',
		'manage_options',
		'member-pages',
		'member_pages_setup',
		'dashicons-admin-site-alt3', 
		1
	); 
}
add_action( 'admin_menu', 'do_member_pages_admin' );


//Callback for menu page. Do we need this?
function member_pages_setup() { 
	echo "Not actually sure if we want or need this page yet...";
}