<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

$themecolors = array(
	'bg' => 'fff',
	'border' => '777',
	'text' => '1c1c1c',
	'link' => '004276',
);

function tj_comment_class( $classname='' ) {
	global $comment, $post;

	$c = array();	
	if ($classname)
		$c[] = $classname;

	// Collects the comment type (comment, trackback),
	$c[] = $comment->comment_type;

	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);

		// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
		$c[] = "byuser comment-author-" . sanitize_title_with_dashes(strtolower($user->user_login));
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	// Separates classes with a single space, collates classes for comment LI
	return join(' ', apply_filters('comment_class', $c));
}


//--------------------------------------------------------------------------------------------

/**
 * New function that will display the navigation only if a previous or next page exists
 * Hint: For pages, next == older and previous == newer
 */
function posts_navigation($next_label='&laquo; Older Entries', $previous_label='Newer Entries &raquo;', $max_page=0) {
	$older = theme_next_posts_link($next_label);
	$newer = theme_previous_posts_link($previous_label);

	if(strlen($older) > 0 || strlen($newer) > 0) {
		echo "<div class='navigation'>";
		echo "<span class='older'>".$older."</span>";
		echo "<span class='newer'>".$newer."</span>";
		echo "</div>";
	}
}

/**
 * New function that will display the navigation only if a previous or next entry exists
 * Hint: For entries, next == newer and previous == older
 */
function post_navigation($format='%link', $next_link='%title  &raquo;', $previous_link='&laquo; %title', $in_same_cat = false, $excluded_categories = '') {
	$older = theme_previous_post_link($format, $previous_link);
	$newer = theme_next_post_link($format, $next_link);

	if(strlen($older) > 0 || strlen($newer) > 0) {
		echo "<div class='navigation'>";
		echo "<span class='older'>".$older."</span>";
		echo "<span class='newer'>".$newer."</span>";
		echo "</div>";
	}
}

/**
 * Overrides the WordPress next_posts() function in link-template.php
 * Modification: Changed echo to return
 */
function theme_next_posts($max_page = 0) {
	return clean_url(get_next_posts_page_link($max_page));
}

/**
 * Overrides the WordPress next_posts_link() function in link-template.php
 * Modification:
 *	 - Removed echo's
 *	 - Added a $next_posts_link variable
 *	 - Calls overridden next_posts() function, theme_next_posts()
 *	 - Returns the $next_posts_link value
 */
function theme_next_posts_link($label='Next Page &raquo;', $max_page=0) {
	global $paged, $wpdb, $wp_query;
	$next_posts_link = '';
	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
	if ( !$paged )
		$paged = 1;
	$nextpage = intval($paged) + 1;
	if ( (! is_single()) && (empty($paged) || $nextpage <= $max_page) ) {
		$next_posts_link .= '<a href="';
		$next_posts_link .= theme_next_posts($max_page);
		$next_posts_link .= '">'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</a>';
	}
	return $next_posts_link;
}

/**
 * Overrides the WordPress previous_posts() function in link-template.php
 * Modification: Changed echo to return
 */
function theme_previous_posts() {
	return clean_url(get_previous_posts_page_link());
}

/**
 * Overrides the WordPress previous_posts_link() function in link-template.php
 * Modification:
 *	 - Removed echo's
 *	 - Added a $previous_posts_link variable
 *	 - Calls overridden previous_posts() function, theme_previous_posts()
 *	 - Returns the $previous_posts_link value
 */
function theme_previous_posts_link($label='&laquo; Previous Page') {
	global $paged;
	$previous_posts_link = '';
	if ( (!is_single())	&& ($paged > 1) ) {
		$previous_posts_link .= '<a href="';
		$previous_posts_link .= theme_previous_posts();
		$previous_posts_link .= '">'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</a>';
	}
	return $previous_posts_link;
}

/**
 * Overrides the WordPress previous_post_link() function in link-template.php
 * Modification: Changed echo to return
 */
function theme_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {

	if ( is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = get_previous_post($in_same_cat, $excluded_categories);

	if ( !$post )
		return;

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = __('Previous Post');

	$title = apply_filters('the_title', $title, $post);
	$string = '<a href="'.get_permalink($post->ID).'">';
	$link = str_replace('%title', $title, $link);
	$link = $pre . $string . $link . '</a>';

	$format = str_replace('%link', $link, $format);

	return $format;
}

/**
 * Overrides the WordPress next_post_link() function in link-template.php
 * Modification: Changed echo to return
 */
function theme_next_post_link($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
	$post = get_next_post($in_same_cat, $excluded_categories);

	if ( !$post )
		return;

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = __('Next Post');

	$title = apply_filters('the_title', $title, $post);
	$string = '<a href="'.get_permalink($post->ID).'">';
	$link = str_replace('%title', $title, $link);
	$link = $string . $link . '</a>';
	$format = str_replace('%link', $link, $format);

	return $format;
}

?>
