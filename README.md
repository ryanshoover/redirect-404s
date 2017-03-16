# Redirect Old Links
* Contributors: ryanshoover
* Tags: SEO, permalinks, 404, redirect
* Requires at least: 3.0
* Tested up to: 4.7.3
* Stable tag: 1.0.0
* License: GPL3

Did you change your permalink structure and now have old links "404ing"? I'll redirect those old links to their new one for you.

## Description
Changing your link structure in WordPress can lead to all of your old links breaking and returning a "404". But no more! If someone goes to an old link for your site, I'll find the new link and redirect them there automatically.

No configuration. No one-by-one setting of the new link structures. No wrestling with complicated regex patterns. Just install me and relax.

*Redirect 404s* works with posts, pages, and custom post types (like ecommerce products).

* Note - the plugin only works for permalink structures where the last "chunk" of the URL is the post name (also called the slug).

## Installation
1. Upload the plugin folder to your /wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu
3. Done!

## Frequently Asked Questions
### How do I configure the plugin?

No configuration necessary! I automatically tests all 404 links to see if they might resolve to an existing post. If I find a post that matches, I'll just redirect the visitor to that post.

### How do you know when a post matches?

I take the last "chunk" of the URL and assume it's a post name. Then I search for any posts with that name. If I find one, I redirect the user to the post I found. Since I use this method, I won't work for *all* permalink structures. But the vast majority end in the post name, so I'll work just fine on most sites.

Examples:
* /2017/02/this-is-the-last-chunk/
* /announcements/this-is-the-last-chunk/

### Do you work with custom post types like ecommerce products?

Sure do! I'll search all public post types for the post name to see if I find one.

## Changelog
* 1.0.0 Initial release to wordpress.org repository
* 0.2 Update the query to search for all post names, instead of just matching off of `get_page_by_path()`
* 0.1 Initial release

## Upgrade Notice
Latest update expands the available permalink structures that the plugin can handle.
