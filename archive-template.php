<?php
/*
Template Name: Custom-Archive
*/
?>
<?php get_header(); ?>
	<div id="main">
     <h2><?php the_title(); ?></h2>
	<div id="content" class="narrowcolumn">

            <?php the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
               
                <div class="entry">
                    <?php the_content(); ?>
                    <?php
                    //Set the Variable values
                    $arch_post_limit = 100; //Limit of the Lastest *** Posts
                    $arch_month_limit = 12; //Limit of the Last ** Months
                    ?>
                    <div class="archive_cat">
                        <h2>Last <?php echo $arch_month_limit; ?> months</h2>
                        <ul id="arch_month">
                            <?php wp_get_archives("type=monthly&limit={$arch_month_limit}"); ?>
                        </ul>
                        <h2>By Yearly</h2>
                        <ul id="arch_year">
                            <?php wp_get_archives('type=yearly'); ?>
                        </ul>
                    </div>
                    <div class="archive_post">
                        <h2>Latest <?php echo $arch_post_limit; ?> Posts</h2>
                        <ul id="arch_list"">
                            <?php wp_get_archives("type=postbypost&limit={$arch_post_limit}&format=html"); ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    
                </div> <!-- End .entry -->
	    </div> <!-- End .post -->
	</div> <!--End #content -->

</div> <!-- End #main -->
<?php get_footer(); ?>