<?php
/*
Template Name: aboutme
*/
?>

<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">


<div class="main entry-content group">
	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


</div><!-- END .hentry -->



<?php endwhile; else: ?>

<?php endif; ?>

</div>


