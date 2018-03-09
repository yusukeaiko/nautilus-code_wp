<?php get_header(); ?>

<article>
  <section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <dl class="post_meta">
      <dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><time><?php the_date('Y-m-d h:m:s'); ?></time></dd>
      <?php if (get_the_category()): ?>
        <dt><i class="fa fa-folder" aria-hidden="true"></i></dt><dd><?php the_category(', ', 'multiple'); ?></dd>
      <?php endif; ?>
      <?php if (get_the_tags()) the_tags('<dt><i class="fa fa-tags" aria-hidden="true"></i></dt><dd>', ', ' ,'</dd>'); ?>
    </dl>
    <?php the_content(); ?>
<?php endwhile; wp_reset_postdata(); endif; ?>
  <?php get_template_part('_partial/sns_share_buttons'); ?>
  </section>
</article>

<?php get_footer(); ?>