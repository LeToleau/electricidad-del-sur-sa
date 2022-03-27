<?php 
/** Customize the login page*/


// Update url link for the login page URL
	add_filter('login_headerurl', 'll_login_header_url');
	function ll_login_header_url() {
		return get_bloginfo('home');
	}

// Add site name to login page logo link
	add_filter('login_headertext', 'll_login_header_text');
	function ll_login_header_text() {
		return get_bloginfo('name');
	}