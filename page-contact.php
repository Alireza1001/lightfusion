<?php get_header(); 
/* Template Name: Contact */
?>

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
        <h1>Contact Us</h1>
    </section>

    <section id="lf_about_wwd">
        <p class="lf_head_p"><?php the_content(); ?></p>
    </section>
    
    <!--<div class="lf_contact_emails" style="display: grid;-->
    <!--grid-auto-flow: row;-->
    <!--font-family: 'Lato',Arial,sans-serif;-->
    <!--margin: 0 auto;-->
    <!--width: fit-content;">-->
    <!--    <a href="mailto:homapilot@gmail.com">homapilot@gmail.com</a>-->
    <!--    <a href="mailto:info@homapilot.com">info@homapilot.com</a>-->
    <!--    <a href="mailto:support@homapilot.com">support@homapilot.com</a>-->
    <!--</div>-->

    



</main>

<?php get_footer(); ?>