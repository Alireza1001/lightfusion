
<?php $mainIntro=get_field('main_intro', get_option( 'page_on_front' )); ?>

<?php
    // latestposts
    $latestposts = array();
    $lf_latest_posts_footer = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>2));
    if ( $lf_latest_posts_footer->have_posts() ) :
        while ( $lf_latest_posts_footer->have_posts() ) : $lf_latest_posts_footer->the_post();
            $object = new stdClass();
            $object->link = urlencode(getTheLink($post));
            $object->title = urlencode(get_the_title());
            $object->commentscount = get_comments_number();
            $object->date = get_the_date();
            
            $categories = [];
            foreach((get_the_category()) as $category) $categories[] = $category->name;
            $object->categories = $categories;

            $object->excerpt = urlencode(get_the_excerpt());
            $object->thumbnail = new stdClass();
            $object->thumbnail->src = urlencode(get_the_post_thumbnail_url());
            $object->thumbnail->sizes = ["thumbnail"];
            $object->thumbnail->loading = "lazy";
            $object->thumbnail->alt = urlencode(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
            $latestposts[] = $object;
        endwhile;
    wp_reset_postdata();
    endif;

    // menu
    $menu_name = 'Footer-menu'; //menu slug
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    
    $serialized_menu = [];
    foreach ($menuitems as $item) {
        $object = new stdClass();
        $object->title = $item->title;
        $object->link = $item->url;
        $serialized_menu[] = $object;
    }
?>

<!-- <axg-element
    mode="fullFooter"
    mainintro="<?php echo $mainIntro['main_title']; ?>"
    description="<?php echo $mainIntro['description']; ?>"
    displaynewsletter="true"
    latestpoststitle="Latest Posts"
    mainsectorstitle="Main sectors"
    latestposts='<?php print_r(json_encode($latestposts)); ?>'
    menu='<?php print_r(json_encode($serialized_menu)); ?>'
    socialmedias='<?php print_r(json_encode($latestposts)); ?>'
/> -->

<!-- <?php //if(false) { ?> -->
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
                        <input id="ax_sub_email" type="text" name="ax_sub_email" required autocomplete placeholder="Email"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="ax_item ax_address" id="lf_footer_wkh">
            <?php widgetLatestPosts(); ?>
        </div>
    </div>
    <div class="ax_items">
        <div class="ax_item ax_explore">
            <p class="ax_footer_title">Main sectors</p>
            <div class="ax_items">
                <?php wp_nav_menu( array( 'theme_location' => 'Footer-menu' ) ); ?>
            </div>
        </div>
        <div class="ax_item">
            <!-- <div class="ax_items"> -->
                <?php socialmediaPackedWidget() ?>
            <!-- </div> -->
        </div>
    </div>
</footer>
<div id="ax_socket">
    <?php echo get_field('footer_socket_message') ?>
</div>
<!-- <?php //} ?> -->
</main>

    <!-- <div id="ax_scroll_top">
        <p aria-label="back to top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg></p>
    </div> -->

    <div id="lf_inpage_notification">
        <span></span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        <div></div>
    </div>

</body>

<?php require_once('footer-script.php'); ?>

<?php wp_footer(); ?>
<script>
    // activationHandler.init();
</script>
</html>