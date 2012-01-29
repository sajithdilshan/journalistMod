<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<h3><a href="http://code42.x10.mx/about-me">about me</a> </h3>

<h3>Search</h3>
<p class="searchinfo">search site archives</p>
<div id="search">
<div id="search_area">
    <form id="searchform" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div>
        <input class="searchfield" type="text" name="s" id="s" value="" title="Enter keyword to search" />
        <input class="submit" type="submit" value="search" title="Click to search archives" />
    </div>
    </form>
</div>
</div>


<h3>Archives</h3>
<ul>
<?php wp_get_archives('type=yearly'); ?>
</ul>

<p><a href="http://feeds.feedburner.com/Codefortytwo" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a>&nbsp;<a href="http://feeds.feedburner.com/Codefortytwo" rel="alternate" type="application/rss+xml">subscribe in a reader</a></p>

<?php endif; ?>


</div>
