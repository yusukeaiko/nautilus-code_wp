<?php get_header(); ?>

<article>
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <dl class="post_meta">
      <dt class="time"><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd class="time"><time><?php the_date('Y-m-d h:m:s'); ?></time></dd>
      <?php if (get_the_category()): ?>
        <dt><i class="fa fa-folder" aria-hidden="true"></i></dt><dd><?php the_category(', ', 'multiple'); ?></dd>
      <?php endif; ?>
      <?php if (get_the_tags()) the_tags('<dt><i class="fa fa-tags" aria-hidden="true"></i></dt><dd>', ', ' ,'</dd>'); ?>
    </dl>
    <h1><?php the_title(); ?></h1>
    <section>
    <?php the_content(); ?>
  <?php get_template_part('_partial/sns_share_buttons'); ?>
  </section>
  <?php endwhile; wp_reset_postdata(); endif; ?>
</article>

<?php get_footer(); ?>