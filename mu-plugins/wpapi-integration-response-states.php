<?php
// add_filter( 'option_active_plugins', 'enable_plugins_selectively' );

// function enable_plugins_selectively( $plugins ) {
// 	if ( isset( $_GET['forceplugin'] ) ) {
// 		if ( ! in_array( $_GET['forceplugin'], $plugins ) ) {
// 			$plugins[] = $_GET['forceplugin'];
// 		}
// 	}
// 	return $plugins;
// }

function wpapi_integration_render_invalid_json() {
	if ( isset( $_GET['_wpapi_invalid_json'] ) ) {
		echo '<p>Some content that is not JSON!</p>';
	}
}
add_filter( 'rest_pre_serve_request', 'wpapi_integration_render_invalid_json' );

/**
 * @param WP_HTTP_Response $result  Result to send to the client. Usually a WP_REST_Response.
 * @param WP_REST_Server   $this    Server instance.
 * @param WP_REST_Request  $request Request used to generate the response.
 */
function wpapi_integration_force_html_content_type( $result, $server, $request ) {
	if ( isset( $_GET['_wpapi_force_html'] ) ) {
		$result->header( 'Content-Type', 'text/html; charset=' . get_option( 'blog_charset' ) );
	}
	return $result;
}
add_filter( 'rest_post_dispatch', 'wpapi_integration_force_html_content_type', 10, 3 );
