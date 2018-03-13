<!doctype html>
<html <?php language_attributes(); ?> amp>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(' | ', true, 'right'); bloginfo('name'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <meta name="theme-color" content="#2A4073" />
  <?php wp_head(); ?>
  <link rel='stylesheet' id='NotoSansJP-css' href='https://fonts.googleapis.com/earlyaccess/notosansjapanese.css' type='text/css' media='all' />
  <?php minified_css(); ?>
  <?php if (false): ?><!--<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "headline": "Article headline",
  "image": [
    "thumbnail1.jpg"
  ],
  "datePublished": "2015-02-05T08:00:00+08:00"
}
  </script>--><?php endif; ?>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
  <!-- AMP Analytics --><script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
</head>

<body>
  <!-- Google Tag Manager -->
  <amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-P483JHJ&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
  <header>
    <div class="header_container">
      <?php $subtext_tag = is_front_page() ? 'h1' : 'p'; ?>
      <<?php echo $subtext_tag; ?> class="header_subtext"><?php echo bloginfo('description'); ?></<?php echo $subtext_tag; ?>>
      <div class="header_main">
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
      </div>
    </div>
    <div class="header_eyecatch">
      <div class="header_pagetitle">
        <?php if ((is_front_page() && is_home()) || is_front_page()): ?>
          <p><?php echo bloginfo('name'); ?></p>
          <p class="header_description"><?php echo bloginfo('description'); ?></p>
        <?php elseif (is_home() || is_archive()): ?>
          <h1>Archives</h1>
        <?php else: ?>
          <h1><?php the_title(); ?></h1>
        <?php endif; ?>
      </div>
    </div>
  </header>
  <main>
