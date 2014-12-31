<?php

$host_meta = true;
if (!file_exists(elgg_get_config('path') . '.well-known/host-meta')) {
	$host_meta = false;
}
else {
	// check the contents of it
	$contents = file_get_contents(elgg_get_config('path') . '.well-known/host-meta');
	if (!strpos($contents, 'http://oexchange.org/spec/0.8/rel/resident-target') || !strpos($contents, elgg_get_site_url())) {
		$host_meta = false;
	}
}

//Hosts Meta
$title = elgg_echo('oexchange:settings:moduletitle:host-meta');
if ($host_meta) {
	$body = elgg_echo('oexchange:settings:host-meta:good');
}
else {
	$location = '<span class="elgg-subtext">' . elgg_get_config('path') . '.well-known/host-meta</span>';
	$download = '<div class="mvm">' . elgg_view('output/url', array(
		'text' => 'host-meta',
		'href' => elgg_get_site_url() . 'oexchange/host-meta',
		'class' => 'elgg-button elgg-button-submit'
	)) . '</div>';
	$body = elgg_echo('oexchange:settings:host-meta:instructions', array($location, $download));
}
echo elgg_view_module('main', $title, $body);

echo '<label>' . elgg_echo('oexchange:settings:login_content');
echo elgg_view('input/longtext', array(
	'name' => 'params[login_content]',
	'value' => $vars['entity']->login_content
));
echo '</label>';
echo elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:login_content:help'),
	'class' => 'elgg-subtext'
));

$title = elgg_echo('oexchange:settings:target:moduletitle');

$body = '';
$body .= '<label>' . elgg_echo('oexchange:settings:target:vendor');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_vendor]',
	'value' => $vars['entity']->target_vendor
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:vendor:help'),
	'class' => 'elgg-subtext'
));

$body .= '<label>' . elgg_echo('oexchange:settings:target:favicon');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_favicon]',
	'value' => $vars['entity']->target_favicon
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:favicon:help'),
	'class' => 'elgg-subtext'
));

$body .= '<label>' . elgg_echo('oexchange:settings:target:favicon32');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_favicon32]',
	'value' => $vars['entity']->target_favicon32
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:favicon32:help'),
	'class' => 'elgg-subtext'
));

$body .= '<label>' . elgg_echo('oexchange:settings:target:title');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_title]',
	'value' => $vars['entity']->target_title
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:title:help'),
	'class' => 'elgg-subtext'
));

$body .= '<label>' . elgg_echo('oexchange:settings:target:name');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_name]',
	'value' => $vars['entity']->target_name
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:name:help'),
	'class' => 'elgg-subtext'
));

$body .= '<label>' . elgg_echo('oexchange:settings:target:prompt');
$body .= elgg_view('input/text', array(
	'name' => 'params[target_prompt]',
	'value' => $vars['entity']->target_prompt
));
$body .= '</label>';
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('oexchange:settings:target:prompt:help'),
	'class' => 'elgg-subtext'
));

echo elgg_view_module('main', $title, $body);