<?php

namespace OExchange;

$offer = elgg_get_site_url() . 'oexchange/share';

$url = elgg_get_site_url();
$vendor = elgg_get_plugin_setting('target_vendor', PLUGIN_ID);
if (!$vendor) {
	$vendor = elgg_get_site_url();
}

$favicon = elgg_get_plugin_setting('target_favicon', PLUGIN_ID);
if (!$favicon) {
	$favicon = elgg_get_site_url() . '_graphics/favicon.ico';
}

$title = elgg_get_plugin_setting('target_title', PLUGIN_ID);
if (!$title) {
	$title = elgg_get_site_entity()->description;
}

$name = elgg_get_plugin_setting('target_name', PLUGIN_ID);
if (!$name) {
	$name = elgg_get_site_entity()->name;
}

$prompt = elgg_get_plugin_setting('target_prompt', PLUGIN_ID);
if (!$prompt) {
	$prompt = elgg_echo('oexchange:target_prompt', array($name));
}

$favicon32 = elgg_get_plugin_setting('target_favicon32', PLUGIN_ID);
if ($favicon32) {
	$favicon32xml = <<<F32

    <Link 
        rel= "icon32" 
        href="{$favicon32}"
        type="image/png" 
        />

F32;
}
	
$xrd = <<<XRD
<?xml version='1.0' encoding='UTF-8'?>
<XRD xmlns="http://docs.oasis-open.org/ns/xri/xrd-1.0">
        
    <Subject>{$url}</Subject>

    <Property 
        type="http://www.oexchange.org/spec/0.8/prop/vendor">{$vendor}</Property>
    <Property 
        type="http://www.oexchange.org/spec/0.8/prop/title">{$title}</Property>
    <Property 
        type="http://www.oexchange.org/spec/0.8/prop/name">{$name}</Property>
    <Property 
        type="http://www.oexchange.org/spec/0.8/prop/prompt">{$prompt}</Property>

    <Link 
        rel= "icon" 
        href="{$favicon}"
        type="image/vnd.microsoft.icon" 
        />
{$favicon32xml}
    <Link 
        rel= "http://www.oexchange.org/spec/0.8/rel/offer"
        href="{$offer}"
        type="text/html" 
        />
</XRD>	
XRD;

echo $xrd;