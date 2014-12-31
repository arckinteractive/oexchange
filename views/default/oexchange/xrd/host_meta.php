<?php

$url = elgg_get_site_url();

$xrd = <<<XRD
<?xml version='1.0' encoding='UTF-8'?>
<XRD xmlns='http://docs.oasis-open.org/ns/xri/xrd-1.0' 
    xmlns:hm='http://host-meta.net/xrd/1.0'>
	<hm:Host>{$url}</hm:Host>

    <Link 
        rel="http://oexchange.org/spec/0.8/rel/resident-target" 
        type="application/xrd+xml"
        href="{$url}oexchange/oexchange.xrd" >
    </Link>

</XRD>
XRD;

echo $xrd;