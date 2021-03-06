<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">
<h2 id="post-<?php the_ID(); ?>" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('leave a comment','one comment','% comments'); ?></a></p>

<div class="main entry-content group">
	<?php the_content('Read the rest of this entry &raquo;'); ?>
</div>

</div><!-- END .hentry -->

<?php if ( comments_open() ) comments_template(); ?>

<?php endwhile; else: ?>
<div class="warning">
	<p>Sorry, but you are looking for something that isn't here.</p>
</div>
<?php endif; ?>

<div class="navigation group">
	<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
	<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>

</div> 

<?php get_sidebar(); ?>

<?php get_footer(); ?>
