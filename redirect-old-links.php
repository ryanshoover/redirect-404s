<?php
/**
 * Plugin Name:     Redirect Old Links
 * Description:     Did you change your permalink structure and now have old links "404ing"? I'll  redirect those old links to their new one for you.
 * Plugin URI:      https://github.com/ryanshoover/redirect-old-links
 * Author:          Ryan Hoover
 * Author URI:      https://github.com/ryanshoover
 * Version:         1.0.0
 * License:         GPL3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @package redirect-old-links
 */

namespace RedirectOldLinks;

/**
 * Redirect 404s that end in the post name
 *
 * If a request comes in that is a 404, but the last
 * subdirectory is a post's slug, then redirect to
 * that post's actual link
 */
function maybe_redirect_404_links() {
	// If this isn't a 404 error page, abort
	if ( 404 !== get_query_var( 'error' ) ) {
		return;
	}

	// Get the request path's parts
	$request_uri   = ! empty( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';
	$request_parts = explode( '/', $request_uri );
	$request_parts = array_filter( $request_parts );

	// If we don't have any parts, abort
	if ( empty( $request_parts ) ) {
		return;
	}

	// Find the post that has the matching slug
	$post_name = array_pop( $request_parts );

	$posts = get_posts(
		array(
			'name'           => $post_name,
			'post_type'      => 'any',
			'posts_per_page' => 1,
		)
	);

	// If we didn't find a post, abort
	if ( empty( $posts ) ) {
		return;
	}

	$post = array_shift( $posts );

	// Redirect to the post's actual link
	wp_safe_redirect( get_permalink( $post->ID ), 301 );
	exit;
}

add_action( 'template_redirect', __NAMESPACE__ . '\maybe_redirect_404_links' );
