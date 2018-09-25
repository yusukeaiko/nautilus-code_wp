<?php
/* Setup */
require_once(dirname(__FILE__) . '/admin/custom_fields.php');
require_once(dirname(__FILE__) . '/admin/template_configurator.php');

function setup_nc_amp() {
}
add_action('after_setup_theme', 'setup_nc_amp');
/* /Setup */

/* Basic */
function init_constructor() {
  /* disable_emoji */
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  /* disable_oembed */
  add_filter('embed_oembed_discover', '__return_false');
  remove_action('wp_head','rest_output_link_wp_head');
  remove_action('wp_head','wp_oembed_add_discovery_links');
  remove_action('wp_head','wp_oembed_add_host_js');
}
add_action('init', 'init_constructor');

function theme_custom_query_vars($vars) {
  $vars[] = 'sitemap.xml';
  $vars[] = 'manifest.json';
  return $vars;
}
add_filter('query_vars', 'theme_custom_query_vars');
function theme_register_endpoints() {
  add_rewrite_rule('^sitemap\.xml', 'index.php?sitemap=sitemap.xml', 'top');
  add_rewrite_endpoint('sitemap', EP_PERMALINK);
  add_rewrite_rule('^manifest\.json', 'index.php?manifest=manifest.json', 'top');
  add_rewrite_endpoint('manifest', EP_PERMALINK);
  flush_rewrite_rules();
}
add_action('init', 'theme_register_endpoints');
function theme_endpoints($templates = '') {
  global $wp_query;
  $template = $wp_query->query_vars;
  if (array_key_exists('sitemap', $template) && 'sitemap.xml' == $template['sitemap']) {
    // sitemap.xml
    $dir = dirname(__FILE__) . '/';
    require_once($dir . 'common/lib/sitemap.xml.php');
    $post_types = array('post', 'page');
    sitemap_xml($post_types);
    exit;
  } else if (array_key_exists('manifest', $template) && 'manifest.json' == $template['manifest']) {
    // manifest.json
    $manifest = array(
      'short_name' => get_bloginfo('name'),
      'name' => get_bloginfo('name'),
      'theme_color' => '#2A4073'
    );
    header('content-type: application/json; charset=utf-8');
    echo json_encode($manifest);
    exit;
  }
}
add_filter('template_redirect', 'theme_endpoints');

function init_scripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
  }
  //wp_enqueue_style('NotoSansJP',  'https://fonts.googleapis.com/earlyaccess/notosansjapanese.css');
  wp_enqueue_style('Inconsolata', 'https://fonts.googleapis.com/css?family=Inconsolata');
  wp_enqueue_style('FontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'init_scripts');

function add_canonical() {
  $canonical = null;
  if (is_home() || is_front_page()) {
    $canonical = home_url();
  } else if (is_category()) {
    $canonical = get_category_link(get_query_var('cat'));
  } else if (is_tag()) {
    $canonical = get_tag_link(get_queried_object()->term_id);
  } else if (is_search()) {
    $canonical = get_search_link();
  } else if (is_page() || is_single()) {
    $canonical = get_permalink();
  } else {
    $canonical = home_url();
  }
  echo '<link rel="alternate" hreflang="ja" href="'.$canonical.'" />'."\n";
  echo '<link rel="canonical" href="'.$canonical.'">'."\n";
}
remove_action('wp_head', 'rel_canonical');
add_action('wp_head',    'add_canonical');

function  dns_prefetch() {
  $prefetch = ''; //'<meta http-equiv="x-dns-prefetch-control" content="on">';
  $domains  = array($_SERVER['SERVER_NAME'], 'cdn.ampproject.org');
  foreach ($domains as $domain) {
    $prefetch .= "<link rel=\"dns-prefetch\" href=\"//{$domain}\">";
  }
  echo "{$prefetch}\n";
}
add_action("wp_head", "dns_prefetch", 0);

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

function nc_option($option_name) {
  $option_values = get_option('nct001');
  return $option_values && array_key_exists($option_name, $option_values) ? $option_values[$option_name] : '';
}
/* /Basic */

/* Navigation */
register_nav_menus(array(
  'primary'        => __('グローバルナビゲーション', 'nautilus-code_amp'),
));
/* /Navigation */

/* for AMP */
function conv_amp_tags($content) {
  $content = str_replace('<img ', '<amp-img ', $content);
  return $content;
}
add_filter('the_content','conv_amp_tags');
/* /for AMP */
?>