<?php get_header(); ?>

<section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <time><?php the_date('Y-m-d h:m:s'); ?></time>
  <?php the_content(); ?>
<?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?php get_footer(); ?>