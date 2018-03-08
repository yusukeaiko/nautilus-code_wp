<?php get_header(); ?>

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
    <h3><a href="<?php echo get_permalink($blog_post->ID); ?>"><?php echo $blog_post->post_title; ?></a></h3>
    <p><time><?php echo $blog_post->post_date; ?></time></p>
    <p><?php echo $blog_post->post_excerpt; ?></p>
  </article>
<?php endforeach; endif; wp_reset_postdata(); ?>
</section>

<section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?php get_footer(); ?>