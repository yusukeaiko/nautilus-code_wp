<!doctype html>
<html <?php language_attributes(); ?> amp>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(' | ', true, 'right'); bloginfo('name'); ?></title>
  <link rel="canonical" href="<?php echo (is_ssl() ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <?php wp_head(); ?>
  <?php minified_css(); ?>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "headline": "Article headline",
      "image": [
        "thumbnail1.jpg"
      ],
      "datePublished": "2015-02-05T08:00:00+08:00"
    }
  </script>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
</head>

<body>
  <header>
    <div class="brand"><a href="/"><amp-img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri() . '/common/img/nautilus-code_logo.png' ?>" width="162" height="24"></amp-img></a></div>
    <nav>
<?php
wp_nav_menu(array(
  'theme_location' => 'primary',
  'container'      => false,
  'menu_class'     => '',
  'depth'          => 1
));
?>
    </nav>
  </header>
  <main>
