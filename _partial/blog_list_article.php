<article>
  <dl class="post_meta">
    <dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><time><?php the_date('Y-m-d h:m:s'); ?></time></dd>
    <?php if (get_the_category()): ?>
      <dt><i class="fa fa-folder" aria-hidden="true"></i></dt><dd><?php the_category(', ', 'multiple'); ?></dd>
    <?php endif; ?>
    <?php if (get_the_tags()) the_tags('<dt><i class="fa fa-tags" aria-hidden="true"></i></dt><dd>', ', ' ,'</dd>'); ?>
  </dl>
  <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p><?php the_excerpt(); ?></p>
</article>
