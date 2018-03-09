<?php
// https://www.sitemaps.org/ja/protocol.html
function sitemap_xml($post_types) {
  $args = array(
    'posts_per_page' => -1,
    'post_type'      => $post_types
  );
  $all_posts = get_posts($args);
  //status_header(200);
  header('Content-type: text/xml; charset=utf-8');
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
  foreach ($all_posts as $sitemap_post) {
    echo '<url>';
    echo '<loc>' . get_permalink($sitemap_post->ID) . '</loc>';
    echo '<lastmod>' . $sitemap_post->post_modified_gmt . '</lastmod>';
    echo '</url>';
  }
  wp_reset_postdata();
  echo '</urlset>';
}
?>