<?php

$english = array(
	'oexchange:invalid:url' => 'The supplied URL is invalid',
	'oexchange:error:invalidrequest' => "Cannot handle the share request for the given parameters",
	'oexchange:error:mustlogin' => "Please log in to continue sharing content",
	'oexchange:target_prompt' => "Send to %s",
	
	// settings
	'oexchange:settings:moduletitle:host-meta' => "Host-Meta Discovery File",
	'oexchange:settings:host-meta:instructions' => 'The host-meta file could not be found.  Please download the host-meta file and place it here: %s %s  Note that if you are using Elgg 1.9 or have htaccess customizations you may need enable it to be publicly available.  If you are running Elgg in a subdirectory this check may not find it properly, ensure that it is in the domain root.  <br>eg. <span class="elgg-subtext">http://example.com/.well-known/hosts-meta</span> instead of <span class="elgg-subtext">http://example.com/elgg/.well-known/hosts-meta</span>',
	'oexchange:settings:login_content' => "Login Page Content",
	'oexchange:settings:login_content:help' => "If you can add some additional markup using the following tokens: <br>Login Form: {{login_form}} <br>Shared URL: {{share_url}}",
	'oexchange:settings:target:moduletitle' => "Target Discovery Settings",
	'oexchange:settings:target:vendor' => "Vendor Identification",
	'oexchange:settings:target:vendor:help' => "Identification of the company/technology behind the service eg. LinkEater Inc.",
	'oexchange:settings:target:favicon' => "Vendor Favicon",
	'oexchange:settings:target:favicon:help' => "The URL to a representative favicon for 16px display (.ico file extension)",
	'oexchange:settings:target:title' => "Vendor Title",
	'oexchange:settings:target:title:help' => 'A few words about your service  eg. A link-Accepting Service',
	'oexchange:settings:target:name' => "Vendor Name",
	'oexchange:settings:target:name:help' => 'The colloquial name of your service - what people would call it in normal conversation eg. LinkEater',
	'oexchange:settings:target:prompt' => "Vendor Prompt",
	'oexchange:settings:target:prompt:help' => "The call to action for people sharing with your service eg. Send to LinkEater",
	'oexchange:settings:target:favicon32' => "Vendor Favicon 32px (optional)",
	'oexchange:settings:target:favicon32:help' => "The URL to a representatitve PNG favicon for 32px display (.png file extension)",
	'oexchange:settings:host-meta:good' => "Your hosts-meta file appears to be correct.  Please remember to update it if your url changes.",
	
);

add_translation("en", $english);