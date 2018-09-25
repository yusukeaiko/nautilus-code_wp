<?php get_header(); ?>

<section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <article>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
<?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?php get_footer(); ?>