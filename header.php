<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { ?> | <?php } ?><?php bloginfo('name'); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />

<meta name="description" content="<?php bloginfo('description'); ?>" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.png" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head>



<body>

<div id="headcontainer">
<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
<?php if (strlen(get_bloginfo('description')) > 0) { ?>

<?php } ?>

</div>

<div id="container" class="group">

<!-- easteregg.in - where you go to get your website's easter eggs -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

<script type="text/javascript">

(function(window, undefined){

var konami_keys = [38, 38, 40, 40, 37, 39],

  konami_index = 0,

  handler = function(e) {

    if (e.keyCode === konami_keys[konami_index++]) {

      if (konami_index === konami_keys.length) {

        $(document).unbind("keydown", handler);

        $.getScript("http://cdn.easteregg.in/outcomes/snake/snake3.js", function() {

          konami_index = 0;

          var finishHim = function() {

              var b = {

                width: 20,

                timeout: 100

              },

                a = [];

              a.push(new Snake({

                width: b.width,

                timeout: b.timeout

              }))

            };

          finishHim();

        });

      }

    } else {

      konami_index = 0;

    }

  };

$(document).bind("keydown", handler);

})(this);

</script>