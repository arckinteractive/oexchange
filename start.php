<?php

namespace OExchange;

const PLUGIN_ID = 'oexchange';
const UPGRADE_VERSION = 20141230;

require_once __DIR__ . '/lib/page_handlers.php';
require_once __DIR__ . '/lib/hooks.php';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {
	elgg_extend_view('page/elements/head', 'oexchange/head');
	elgg_register_page_handler('oexchange', __NAMESPACE__ . '\\pagehandler');
	
	// use 501 so other plugins can be lazy and not unregister it if they want something different
	elgg_register_plugin_hook_handler('oexchange', 'share', __NAMESPACE__ . '\\oexchange_share', 501);
	
	elgg_register_plugin_hook_handler('forward', 'all', __NAMESPACE__ . '\\forward_hook');
}

function pagehandler($page) {
	switch ($page[0]) {
		case 'share':
			// sharing *REQUIRES* a url
			$url = urldecode(get_input('url'));
			// see https://bugs.php.net/bug.php?id=51192
			$php_5_2_13_and_below = version_compare(PHP_VERSION, '5.2.14', '<');
			$php_5_3_0_to_5_3_2 = version_compare(PHP_VERSION, '5.3.0', '>=') &&
					version_compare(PHP_VERSION, '5.3.3', '<');

			$validated = false;
			if ($php_5_2_13_and_below || $php_5_3_0_to_5_3_2) {
				$url = str_replace("-", "", $url);
				$validated = filter_var($url, FILTER_VALIDATE_URL);
			} else {
				$validated = filter_var($url, FILTER_VALIDATE_URL);
			}
			
			if ($validated) {
				handle_share_page();
			}
			else {
				register_error(elgg_echo('oexchange:invalid:url'));
				forward('404');
			}
			return true;
			break;

		case 'login':
			$title = elgg_echo('oexchange:login');
			$content = elgg_get_plugin_setting('login_content', PLUGIN_ID);
			if (!$content) {
				$content = elgg_view_form('login');
			}
			else {
				// replace the login form token
				$login_form = elgg_view_form('login');
				$content = str_replace('{{login_form}}', $login_form, $content);
				$content = str_replace('{{share_url}}', $_SESSION['oexchange']['url'], $content);
			}
			
			$body = elgg_view_layout('content', array(
				'content' => $content,
				'filter' => false,
				'title' => $title,
			));
			
			echo elgg_view_page($title, $body);
			return true;
			break;
		case 'oexchange.xrd':
			handle_target_xrd();
			return true;
			break;
		
		case 'host-meta':
			handle_host_meta_xrd();
			return true;
			break;
	}

	return false;
}