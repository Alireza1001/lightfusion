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
        <h1>About Homa Pilot</h1>
    </section>

    <section id="lf_about_wwd">
        <p class="lf_head_p"><?php the_content(); ?></p>
    </section>

    <section id="lf_about_socialmedia">
        <h2 class="lf_head_title">Follow us</h2>
        <p class="lf_head_p">Our social medias where you can find useful data and news and offers about Homapilot services</p>
        <div class="lf_about_items">
            <div class="lf_about_item">
                <a aria-label="test" href="https://www.instagram.com/homapilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.svg" />
                    <p class="lf_p">Instagram</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://www.facebook.com/homapilot/" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.svg" />
                    <p class="lf_p">Facebook</p>
                </a>
            </div>
            <div class="lf_about_item lf_active">
                <a aria-label="test" href="https://twitter.com/homaPilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg" />
                    <p class="lf_p">Twitter</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://www.linkedin.com/company/homapilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin.svg" />
                    <p class="lf_p">LinkedIn</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://www.youtube.com/channel/UCp6GlZFBs0lRyrsXZa8hVGA/" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube.svg" />
                    <p class="lf_p">Youtube</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://www.pinterest.com/homapilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/pinterest.svg" />
                    <p class="lf_p">Pinterest</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://vk.com/homapilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/vk.svg" />
                    <p class="lf_p">VK</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="https://t.me/home_pilot" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/telegram.svg" />
                    <p class="lf_p">Telegram</p>
                </a>
            </div>
            <div class="lf_about_item">
                <a aria-label="test" href="mailto:homapilot@gmail.com" target="_blank" class="ax_footer_btn">
                    <img alt="test" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gmail.svg" />
                    <p class="lf_p">Email</p>
                </a>
            </div>
        </div>
    </section>



</main>


<?php get_footer(); ?>