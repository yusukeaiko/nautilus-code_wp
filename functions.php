<?php
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
    // wp_enqueue_script('jquery',   get_template_directory_uri() . '/common/js/jquery-1.11.1.min.js');
  }
}
add_action('wp_enqueue_scripts', 'init_scripts');

function  dns_prefetch() {
  $prefetch = ''; //'<meta http-equiv="x-dns-prefetch-control" content="on">';
  $domains  = array($_SERVER['SERVER_NAME'], 'cdn.ampproject.org');
  foreach ($domains as $domain) {
    $prefetch .= "<link rel=\"dns-prefetch\" href=\"//{$domain}\">";
  }
  echo "{$prefetch}\n";
}
add_action("wp_head", "dns_prefetch", 0);
?>