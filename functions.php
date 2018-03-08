<?php
function  dns_prefetch() {
  $prefetch = ''; //'<meta http-equiv="x-dns-prefetch-control" content="on">';
  $domains  = array($_SERVER['SERVER_NAME'], 'cdn.ampproject.org');
  foreach ($domains as $domain) {
    $prefetch .= "<link rel=\"dns-prefetch\" href=\"//{$domain}\">";
  }
  echo "{$prefetch}\n";
}
add_action("wp_head", "dns_prefetch", 0);

function disable_emoji() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

function init_scripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
  }
}
add_action('wp_enqueue_scripts', 'init_scripts');

function minified_css() {
  $dir = dirname(__FILE__) . '/';
  require_once($dir . 'assets/lib/php-html-css-js-minifier.php');
  $origin_css    = $dir . 'style.css';
  $origin_date   = filemtime($origin_css);
  $minified_css  = $dir . 'style.min.css.php';
  $minified_date = filemtime($minified_css);
  $refresh_flag = false;
  if (!file_exists($minified_css)) {
    touch($minified_css);
    $refresh_flag = true;
  }
  if ($minified_date < $origin_date) $refresh_flag = true;
  if ($refresh_flag) {
    $css = minify_css(file_get_contents($origin_css));
    file_put_contents($minified_css, $css);
  }
  echo '<style amp-custom>';
  require($minified_css);
  echo '</style>';
}

/* Navigation */
register_nav_menus(array(
  'primary'        => __('グローバルナビゲーション', 'nautilus-code_amp'),
));
/* /Navigation */
?>