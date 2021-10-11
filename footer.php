<footer id="ax_footer">
    <div class="ax_items">
        <div class="ax_item ax_minabout">
            <h2 class="ax_title">HOMA PILOT</h2>
            <p class="ax_paragraph">Homa Pilot was founded in 2020 and the purpose of this complex is to provide digital aviation and piloting courses for free and online so that all students of piloting and aviation, as well as those interested in this industry, can easily access these courses from anywhere in the world.</p>
            <form action="/caspian" method="POST" id="ax_scubscribersinput">
                <p>Sign up to our Newsletter</p>
                <div>
                    <label for="ax_sub_email">Newsletter paragrapth</label>
                    <div class="ax_sub_item">
                        <button type="submit" title="newsletter" name="ax_sub_sibmit" id="axsubscribebtnn_email">Signup</button>
                        <input id="ax_sub_email" type="text" name="ax_sub_email"  required autocomplete placeholder="Email"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="ax_item ax_address" id="lf_footer_wkh">
            <div id="lf_footer_latestposts">
                <?php 
                $lf_latest_posts_footer = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));
                if ( $lf_latest_posts_footer->have_posts() ) :
                ?>
                <p class="ax_footer_title">Latest Posts</p>
                <div class="lf_items">
                    <?php
                    while ( $lf_latest_posts_footer->have_posts() ) : $lf_latest_posts_footer->the_post();
                    ?>
                    <div class="lf_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="lf_poster">
                                <?php
                                    $useragentos = $_SERVER["HTTP_USER_AGENT"];
                                    // if(strpos($useragentos, "mac") !== false || strpos($useragentos, "ipod") !== false || strpos($useragentos, "iphone") !== false) $generalimgexe=".jpg";
                                    // else $generalimgexe=".webp";
                                    $generalimgexe=".jpg";
                                    $imgmainsrc = get_the_post_thumbnail_url();
                                    $baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));
                                    $exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));
                                    $generalimgexe = $exeimgsrc;
                                    $newimgsrcset = $baseimgsrc."-thumbnail".$generalimgexe;
                                    if(strpos($newimgsrcset, "https") !== false) {
                                        $imgmaintag = get_the_post_thumbnail();
                                        $imgmaintag1 = substr($imgmaintag, 0, strpos($imgmaintag, 'src="')+5);
                                        $imgmaintag11 = substr($imgmaintag, strpos($imgmaintag, 'src="')+5);
                                        $imgmaintag2 = substr($imgmaintag11, strpos($imgmaintag11, '"'));
                                        $imgmaintag = $imgmaintag1.$newimgsrcset.$imgmaintag2;
                                        echo $imgmaintag;
                                    }
                                ?>
                            </div>
                            <div class="lf_context">
                                <p class="lf_title"><?php echo get_the_title(); ?></p>
                                <div class="lf_meta">
                                    <p class="lf_meta_item"><img alt="comment" width="17" height="17" src="/wp-content/themes/lightfusion/assets/icons/comment-dark.svg"><span><?php echo get_comments_number(); ?></span></p>
                                    <p class="lf_meta_item"><img alt="calendar" width="17" height="17" src="/wp-content/themes/lightfusion/assets/icons/calendar-dark.svg"><span><?php echo get_the_date(); ?></span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- <div class="ax_items">
                <img alt="test" src="<?php //echo get_template_directory_uri(); ?>/assets/images/enamad.png">
                <img alt="test" src="<?php //echo get_template_directory_uri(); ?>/assets/images/enamad.png">
            </div> -->
        </div>
    </div>
    <div class="ax_items">
        <div class="ax_item ax_explore">
            <p class="ax_footer_title">Main sectors</p>
            <div class="ax_items">
                <?php wp_nav_menu( array( 'theme_location' => 'Footer-menu' ) ); ?>
            </div>
        </div>
        <div class="ax_item ax_follow">
            <div class="ax_items">
                <a rel="noopener noreferrer" aria-label="instagram" href="https://www.instagram.com/homapilot/" target="_blank" class="ax_footer_btn"><img alt="instagram" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.svg" /></a>
                <a rel="noopener noreferrer" aria-label="facebook" href="https://www.facebook.com/homapilot/" target="_blank" class="ax_footer_btn"><img alt="facebook" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.svg" /></a>
                <a rel="noopener noreferrer" aria-label="twitter" href="https://twitter.com/HomaPilot" target="_blank" class="ax_footer_btn"><img alt="twitter" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg" /></a>
                <a rel="noopener noreferrer" aria-label="linkedin" href="https://www.linkedin.com/company/homapilot" target="_blank" class="ax_footer_btn"><img alt="linkedin" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin.svg" /></a>
                <a rel="noopener noreferrer" aria-label="youtube" href="https://www.youtube.com/channel/UCp6GlZFBs0lRyrsXZa8hVGA/" target="_blank" class="ax_footer_btn"><img alt="youtube" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube.svg" /></a>
                <a rel="noopener noreferrer" aria-label="telegram" href="https://t.me/homa_pilot" target="_blank" class="ax_footer_btn"><img alt="telegram" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/telegram.svg" /></a>
                <a rel="noopener noreferrer" aria-label="pinterest" href="https://www.pinterest.com/homapilot" target="_blank" class="ax_footer_btn"><img alt="pinterest" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/pinterest.svg" /></a>
                <a rel="noopener noreferrer" aria-label="vk" href="https://vk.com/homapilot" target="_blank" class="ax_footer_btn"><img alt="vk" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/vk.svg" /></a>
                <a rel="noopener noreferrer" aria-label="mailto" href="mailto:homapilot@gmail.com" target="_blank" class="ax_footer_btn"><img alt="mailto" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gmail.svg" /></a>
            </div>
        </div>
    </div>
</footer>
    <div id="ax_socket">
        <p>© 2020–2022 HomaPilot. Made with <img alt="axoncodes" width="22px" height="22px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/heart.svg" /> at <a aria-label="axoncodes" rel="noopener noreferrer" href="https://axoncodes.com">AxonCodes</a></p>
    </div>
</main>

    <div id="ax_scroll_top">
        <p aria-label="back to top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg></p>
    </div>

    <div id="lf_inpage_notification">
        <span></span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        <div></div>
    </div>

</body>
    <?php 
    $users_list = get_users();
    $get_comments_number = get_comments_number();
    $translation_array = get_template_directory_uri();
    ?>

    <script type="text/javascript">
        const userslist = <?php echo json_encode($users_list); ?>;
        const wp_dir_url = "<?php echo $translation_array; ?>";
        const wp_comment_count = "<?php echo $get_comments_number; ?>";
    </script>
    <script type="text/javascript"><?php require_once("course-config.php"); ?></script>
    <?php require_once('footer-script.php'); ?>

    <!-- AXONGLITCH LIBRARY -->
    <script src="https://axoncodes.com/libraries/registery.js"></script>
    <script src="https://axoncodes.com/libraries/dropdown/FuncLibrary.js"></script>

    <?php wp_footer(); ?>
</html>