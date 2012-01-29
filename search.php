<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : ?>

<h2 class="archive">Search Results</h2>

<?php while (have_posts()) : the_post(); ?>
<div class="post hentry<?php if (function_exists('sticky_class')) { sticky_class(); } ?>">
<h2 id="post-<?php the_ID(); ?>" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="comments">
<a class="updated" title="<?php the_time('Y-m-d\TH:i:s')?>"> Posted on <?php the_time('F jS, Y'); ?> <?php _e("at"); ?> <?php the_time('g:i a'); ?> with<a href="<?php comments_link(); ?>"><?php comments_number('zero comment','one comment','% comments'); ?></a> </a>
</p>

<div class="main entry-content group">
	<?php the_content('Read the rest of this entry &raquo;'); ?>
</div>


</div><!-- END .hentry -->

<?php if ( comments_open() ) comments_template(); ?>

<?php endwhile; ?>
<div class="navigation">
	<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
	<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>
<?php else : ?>
	<p></p>
<p></p>
<p></p>
<p></p>
	
		<h3><p>Oops! Looks like we can't find what you were looking for.</p><p> Try a different search?</p></h3>
	
<?php endif; ?>

</div> 

<?php get_sidebar(); ?>

<?php get_footer(); ?>
