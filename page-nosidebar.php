<?php

/*

Template Name: page-nosidebar

*/

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { ?> at <?php } ?><?php bloginfo('name'); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />

<meta name="description" content="<?php bloginfo('description'); ?>" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>



<link href='http://fonts.googleapis.com/css?family=Iceberg' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Delius' rel='stylesheet' type='text/css'>


</head>



<body>

<div id="container-nosidebar" class="group">



<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>





<div id="search-page">

<div id="search_area">

    <form id="searchform-nosidebar" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <div>

        <input class="searchfield" type="text" name="s" id="s" value="" title="Enter keyword to search" />

        <input class="submit" type="submit" value="search" title="Click to search archives" />

    </div>

    </form>

</div>

</div>



<div id="content">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">

<h2 id="post-<?php the_ID(); ?>" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>



<div class="main entry-content group">

	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

</div>



</div><!-- END .hentry -->



<?php if ( comments_open() ) comments_template(); ?>



<?php endwhile; else: ?>

<div class="warning">

	<p>Sorry, but you are looking for something that isn't here.</p>

</div>

<?php endif; ?>



</div>



<?php get_footer(); ?>

