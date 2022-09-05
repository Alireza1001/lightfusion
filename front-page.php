<?php get_header(); ?>
<main id="lf_home">
  <?php echo categorySlider(); ?>
  <?php
    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));
    articles($wpb_all_query);
  ?>
</main>
<?php get_footer(); ?>