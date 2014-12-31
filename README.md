# OExchange

This plugin provides the necessary configuration for OExchange (http://www.oexchange.org/spec/) in Elgg.

This plugin checks for the presence or absence of the .well-known/hosts-meta file, and provides a pre-configured
one for download if necessary.  Additionally it provides the target xrd configuration file with descriptions that
are configurable via plugin settings.

The standard endpoint for url sharing is http://example.com/oexchange/share

When a user hits the sharing endpoint with a valid url to share they will be asked to log in if not already.
Once logged in they will be forwarded to the relevant form to share their link on the site.

This behavior can be modified by plugins by registering for the ```'oexchange','requires_login'``` plugin hook to define
whether it's necessary to be logged in to handle a shared url (default is true)

Registering for the ```'oexchange','share'``` plugin hook can allow a plugin to define where the user should end up to actually
share the link on the site.  The plugin should return array('status' => true, 'url' => target_url).
It's a good idea for plugin hooks to check the return status to ensure another plugin hook has not already handled the request.
Plugin hooks receive all standard oexchange get parameters as $params, however only url is required and enforced by this plugin.

A demonstration hook is provided showing how to integrate this for link sharing using the core bookmarks plugin

```
// use 501 so other plugins can be lazy and not unregister it if they want something different
elgg_register_plugin_hook_handler('oexchange', 'share', 'oexchange_share', 501);


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
```



# Installation

Unpack to the Elgg mod directory

Enable through the admin plugin page

Set the plugin settings to match your app descriptions

Download the hosts-meta file and place it in the .well-known directory in the domain root (you may have to create the directory)