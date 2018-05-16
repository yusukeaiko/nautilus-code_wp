<?php get_header(); ?>

<?php if (strlen(get_post_meta($post->ID, 'frontpage_custom_content', true)) > 0): ?>
<section>
  <?php echo get_post_meta($post->ID, 'frontpage_custom_content', true); ?>
</section>
<?php endif; ?>

<section class="articles">
  <h2>新着記事</h2>
<?php
$args = array(
  'post_type'   => 'post',
  'numberposts' => 5,
  'order'       => 'desc',
  'orderby'     => 'date',
);
$blog_posts = get_posts($args);
if ($blog_posts) : foreach($blog_posts as $blog_post) : setup_postdata($blog_post); ?>
<article>
<dl class="post_meta">
      <dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><time><?php echo $blog_post->post_date; ?></time></dd>
      <?php if (get_the_category($blog_post->ID)): ?>
        <dt><i class="fa fa-folder" aria-hidden="true"></i></dt><dd><?php the_category(', ', 'single', $blog_post->ID); ?></dd>
      <?php endif; ?>
<?php
$blog_post_tags = wp_get_post_tags($blog_post->ID);
$tag_links = array();
if (count($blog_post_tags) > 0) {
  foreach ($blog_post_tags as $blog_post_tag) {
    $tag_links[] = '<a href="' . get_tag_link($blog_post_tag->term_id) . '">' . $blog_post_tag->name . '</a>';
  }
  echo '<dt><i class="fa fa-tags" aria-hidden="true"></i></dt>';
  echo '<dd>' . join(', ', $tag_links) . '</dd>';
}
?>
  <?php the_tags('<dt><i class="fa fa-tags" aria-hidden="true"></i></dt><dd>', ', ' ,'</dd>');?>
    </dl>
  <h3><a href="<?php echo get_permalink($blog_post->ID); ?>"><?php echo $blog_post->post_title; ?></a></h3>
  <p><?php the_excerpt(); ?></p>
</article>
<?php
endforeach; endif; wp_reset_postdata();
$home_id = get_option('page_for_posts');
?>
<a href="<?php echo get_page_link($home_id); ?>">MORE</a>
</section>

<section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?php get_template_part('_partial/sns_share_buttons'); ?>
<?php get_footer(); ?>