<?php get_header(); ?>

<section class="articles">
  <h1>Archives</h1>
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    get_template_part('_partial/blog_list_article');
  }
  echo paginate_links();
  wp_reset_postdata(); 
}
?>
</section>

<?php get_footer(); ?>