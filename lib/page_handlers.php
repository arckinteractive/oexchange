<?php

namespace OExchange;

function handle_share_page() {
	$params = array(
		'url' => urldecode(get_input('url')),
		'title' => get_input('title', ''),
		'description' => get_input('description', ''),
		'tags' => get_input('tags', ''),
		'ctype' => get_input('ctype', '')
	);
	
	if (!elgg_is_logged_in()) {
		// see if we need to be logged in
		$require_login = elgg_trigger_plugin_hook('oexchange', 'requires_login', $params, true);
		if ($require_login) {
			$_SESSION['oexchange'] = $params;
			
			system_message(elgg_echo('oexchange:error:mustlogin'));
			forward('oexchange/login');
		}
	}
	
	
	/**
	 * Here we allow plugins to do something with the content
	 * The plugins should check the return status to see if it was already handled
	 * If a plugin is handling it, then it should return true as the status and any forward url
	 */
	$result = elgg_trigger_plugin_hook('oexchange', 'share', $params, array('status' => false, 'forward' => ''));
	
	if ($result['status']) {
		forward($result['forward']);
	}
	
	// we don't know how to handle the share request
	register_error(elgg_echo('oexchange:error:invalidrequest'));
	forward('404');
}


function handle_target_xrd() {
	$xrd = elgg_view('oexchange/xrd/oexchange');
	
	header('Content-type: application/xrd+xml');
	echo $xrd;
	exit;
}


function handle_host_meta_xrd() {
	$xrd = elgg_view('oexchange/xrd/host_meta');
	
	header('Content-type: application/xrd+xml');
	echo $xrd;
	exit;
}