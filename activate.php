<?php

namespace OExchange;

$upgrade_version = elgg_get_plugin_setting('upgrade_version', PLUGIN_ID);

if (!$upgrade_version) {
	elgg_set_plugin_setting('upgrade_version', UPGRADE_VERSION, PLUGIN_ID);
}

$vendor = elgg_get_plugin_setting('target_vendor', PLUGIN_ID);
if (!$vendor) {
	elgg_set_plugin_setting('target_vendor', "Arck Interactive OExchange Plugin", PLUGIN_ID);
}

$favicon = elgg_get_plugin_setting('target_favicon', PLUGIN_ID);
if (!$favicon) {
	elgg_set_plugin_setting('target_favicon', elgg_get_site_url() . '_graphics/favicon.ico', PLUGIN_ID);
}

$title = elgg_get_plugin_setting('target_title', PLUGIN_ID);
if (!$title) {
	elgg_set_plugin_setting('target_title', elgg_get_site_entity()->description, PLUGIN_ID);
}

$name = elgg_get_plugin_setting('target_name', PLUGIN_ID);
if (!$name) {
	elgg_set_plugin_setting('target_name', elgg_get_site_entity()->name, PLUGIN_ID);
}

$prompt = elgg_get_plugin_setting('target_prompt', PLUGIN_ID);
if (!$prompt) {
	elgg_set_plugin_setting('target_prompt', elgg_echo('oexchange:target_prompt', array(elgg_get_site_entity()->name)), PLUGIN_ID);
}
