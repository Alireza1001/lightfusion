<?php get_header(); 
/* Template Name: About */?>

<main>

    <section id='lf_about_page_intro'>
        <?php
            $id = get_post_thumbnail_id();
            $src = wp_get_attachment_image_src($id, $size);
            $alt = get_the_title($id);
            $class = $attr['class'];
            $useragentos = $_SERVER["HTTP_USER_AGENT"];
            // if(strpos($useragentos, "mac") !== false || strpos($useragentos, "ipod") !== false || strpos($useragentos, "iphone") !== false) $generalimgexe=".jpg";
            // else $generalimgexe=".webp";
            $generalimgexe=".jpg";
            $imgmainsrc = $src[0];
            $baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));
            $exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));
            $newimgsrcset = $baseimgsrc.$generalimgexe;
            $newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;
            $newimgsrcset2 = $baseimgsrc."-medium".$generalimgexe;
            $newimgsrcset3 = $baseimgsrc."-large".$generalimgexe;
            $imgsrcsetqueue = "$newimgsrcset1 300w, $newimgsrcset2 900w, $newimgsrcset3 1500w";
            echo '<img src="' . $newimgsrcset . '" alt="' . $alt . '" class="' . $class . '" srcset="'.$imgsrcsetqueue.'"/>';
        ?>
        <h1><?php the_title(); ?></h1>
    </section>

    <section id="lf_about_wwd">
        <p class="lf_head_p"><?php the_content(); ?></p>
    </section>

    <?php
        if( have_rows('social_medias', get_option( 'page_on_front' )) ): ?>
        <section id="lf_about_socialmedia">
            <h2 class="lf_head_title">Follow us</h2>
            <p class="lf_head_p">Our social medias where you can find useful data and news and offers about our services</p>        <div class="lf_about_items">
            <?php while( have_rows('social_medias', get_option( 'page_on_front' )) ) : the_row();
                echo '
                    <div class="lf_about_item">
                        <a aria-label="test" 
                        href="'.get_sub_field('link').'" 
                        target="_blank" 
                        class="ax_footer_btn">
                            <img 
                            alt="'.get_sub_field('name').'" 
                            width="22px" 
                            height="22px" 
                            src="'.get_template_directory_uri().'/assets/icons/'.get_sub_field('name').'.svg" />
                            <p class="lf_p">'.ucfirst(get_sub_field('name')).'</p>
                        </a>
                    </div>';
            endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
        



</main>


<?php get_footer(); ?>