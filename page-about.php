<?php get_header(); 
/* Template Name: About */?>
<main>
    <section id='lf_about_page_intro'>
        <?php echo axgImgen(
            get_the_post_thumbnail_url(), 
            get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE), 
            "", "", "lazy", "300", "86",
            ["small", "medium", "large"]
        ); ?>
        <?php if (get_field('showTitle')) echo "<h1>the_title()</h1>" ?>
    </section>

    <section id="lf_about_wwd">
        <p class="lf_head_p"><?php the_content(); ?></p>
    </section>

    <?php socialmediaLargeWidget() ?>

</main>


<?php get_footer(); ?>