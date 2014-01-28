<?php
/**
 * If a custom dashboard file exists, load that instead of the default
 * dashboard provided by Varying Vagrant Vagrants. This file should be
 * located in the `www/default/` directory.
 */
if ( file_exists( 'dashboard-custom.php' ) ) {
	include( 'dashboard-custom.php' );
	exit;
}

// Begin default dashboard.
?>
<!DOCTYPE html>
<html>
<head>
	<title>(Customized) Varying Vagrant Vagrants Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<ul class="nav">
	<li class="active"><a href="#">Home</a></li>
	<li><a href="http://github.com/10up/varying-vagrant-vagrants">Repository</a></li>
	<li><a href="/database-admin/">phpMyAdmin</a></li>
	<li><a href="/memcached-admin/">phpMemcachedAdmin</a></li>
	<li><a href="/webgrind/">Webgrind</a></li>
	<li><a href="/phpinfo/">PHP Info</a></li>
</ul>

<ul class="nav">
	<li><a href="http://api.wordpress.dev/">http://api.wordpress.dev</a> for the API endpoint WordPress install</li>
</ul>
</body>
</html>
