<?php

function backend_info() {
	$CI =& get_instance();
	$data = array(
		'site_url' => site_url(),
		'base_url' => base_url(),

		'assets_path' => base_url().'assets/',
		'css_path' => base_url().'assets/css/',
		'fonts_path' => base_url().'assets/fonts/',
		'img_path' => base_url().'assets/img/',
		'js_path' => base_url().'assets/js/',
		'plugins_path' => base_url().'assets/js/plugins/',
		'upload_path' => base_url().'assets/upload/',

		'user_id' => $CI->session->userdata('user_id'),
		'user_avatar' => $CI->session->userdata('user_avatar'),
		'user_name' => $CI->session->userdata('user_name'),
		'user_permission' => $CI->session->userdata('user_permission'),
	);
	return $data;
}
