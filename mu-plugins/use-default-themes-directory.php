<?php
/*
Plugin Name: Access Default Themes
Description: Permit access to the themes in the built-in wp-content/themes directory even when a custom content directory is used
Version:     1.0
Author:      K. Adam White
Author URI:  https://wordpress.org/support/profile/kadamwhite
 */
register_theme_directory( ABSPATH . 'wp-content/themes/' );
