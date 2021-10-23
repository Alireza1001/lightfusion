<footer id="ax_footer">
    <div class="ax_items">
        <div class="ax_item ax_minabout">
            <?php $mainIntro=get_field('main_intro', get_option( 'page_on_front' )); if( $mainIntro ): ?>
               <h2 class="ax_title"><?php echo $mainIntro['main_title']; ?></h2>
               <p class="ax_paragraph"><?php echo $mainIntro['description']; ?></p>
            <?php endif; ?>
            <form action="/caspian" method="POST" id="ax_scubscribersinput">
                <p>Sign up to our Newsletter</p>
                <div>
                    <label for="ax_sub_email"></label>
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
                $lf_latest_posts_footer = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>2));
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
                                
                                <?php echo wordpressAXCustomImage(
                                    get_the_post_thumbnail_url(), 
                                    get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE), 
                                    "", "", "lazy", "", "", 
                                    ["thumbnail"]
                                ); ?>

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
                <?php
                    if( have_rows('social_medias', get_option( 'page_on_front' )) ):
                        while( have_rows('social_medias', get_option( 'page_on_front' )) ) : the_row();
                            echo '
                                <a rel="noopener noreferrer"
                                 aria-label="'.get_sub_field('name').'"
                                 href="'.get_sub_field('link').'" 
                                 target="_blank" 
                                 class="ax_footer_btn">
                                <img 
                                 alt="'.get_sub_field('name').'" 
                                 width="22px" 
                                 height="22px" 
                                 src="'.get_template_directory_uri().'/assets/icons/'.get_sub_field('name').'.svg" /></a>';
                        endwhile;
                    else :
                    endif;
                ?>
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

<?php require_once('footer-script.php'); ?>

<!-- AXONGLITCH LIBRARY -->
<script src="https://axoncodes.com/libraries/registery-sample.js"></script>
<script src="https://axoncodes.com/libraries/dropdown/FuncLibrary-sample.js"></script>
<?php wp_footer(); ?>

</html>