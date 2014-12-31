<?php

namespace OExchange;

function forward_hook($h, $t, $r, $p) {
	if (is_array($_SESSION['oexchange']) && elgg_is_logged_in()) {
		// we have just logged in after trying to share something
		$url = elgg_http_add_url_query_elements(elgg_get_site_url() . 'oexchange/share', $_SESSION['oexchange']);
		unset($_SESSION['oexchange']);
		return $url;
	}
	return $r;
}


function oexchange_share($h, $t, $r, $p) {
	if ($r['status']) {
		return $r; // the sharing has already been handled
	}
	
	if (!elgg_is_logged_in()) {
		return $r; // some other plugin may have changed the requirement
	}
	
	// we want to share it in bookmarks
	$url = elgg_http_add_url_query_elements(elgg_get_site_url() . 'bookmarks/add/' . elgg_get_logged_in_user_guid(), array('address' => $p['url']));
	
	$r['status'] = true;
	$r['forward'] = $url;
	
	return $r;
}