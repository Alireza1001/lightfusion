<?php get_header(); ?>
<?php /* Template Name: Category2 */ ?>
<section id="whole_page_wrapup">

    <?php get_template_part( 'sidebar2' ); 
    $tempalte_dir = get_template_directory_uri();
    ?>
    <main style="padding-bottom: 30px;">
        <?php get_template_part( 'nav-status' ); ?>
        <?php $post_slug = $post->post_name; ?>
        <script> var page_slug = "<?php echo $post_slug; ?>"; </script>
        <?php if(get_the_title($post->post_parent)==get_the_title()) { ?>
        <section id="ax_hero_image">
            <?php
                $id = get_post_thumbnail_id();
                $src = wp_get_attachment_image_src($id, $size);
                $alt = get_the_title($id);
                $class = $attr['class'];
                $useragentos = $_SERVER["HTTP_USER_AGENT"];
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
            <div class="ax_tabs">
                <div id="ax_tabs_inside_cover"></div>
            </div>
        </section>
        <div id="ax_headings">
            <div class="lf_txt">
                <h1 class="ax_heading">HOMA PILOT</h1>
                <p class="ax_heading_p"></p>
            </div>
        </div>
        <p class="ax_heading_p"><?php echo get_the_content(); ?></p>
            <section id="ax_services">
                <div id="lf_cats_sub"></div>
                <div class="ax_items"></div>
            </section>
            <?php 
                global $post;
                $post_slug = $post->post_name;
            ?>
        <?php }else{ ?>
            <section id="lf_weblog_intro">
                <h1>Homapilot's <?php echo get_the_title(); ?></h1>
            </section>
            <section class="lf_blog_item_filter" id="lf_weblog_filter_2">
                <p>Type: </p>
                <select id="lf_weblog_country_filter2" name="lf_weblog_country_filter" >
                    <option value=''>All</options>
                    <option value='distance'>Distance</options>
                    <option value='time Aloft'>Time Aloft</options>
                    <option value='acrobatic'>Acrobatic</options>
                    <option value='decorative'>Decorative</options>
                </select>
                <p>Difficulity: </p>
                <select id="lf_weblog_type_filter2" name="lf_weblog_type_filter" >
                    <option value=''>All</options>
                    <option value='easy'>Easy</options>
                    <option value='medium'>Medium</options>
                    <option value='hard'>Hard</options>
                    <option value='advanced'>Advanced</options>
                </select>
                <!-- <p>Scissors: </p>
                <select id="lf_weblog_type_filter2" name="lf_weblog_type_filter" >
                    <option value=''>Don’t care</options>
                    <option value='yes-scissors'>Yes Scissors</options>
                    <option value='no-scissors'>No Scissors</options>
                </select> -->
            </section>
            <section id="lf_archive2">
                <div class="lf_items">
                    <?php 
                        // echo get_the_title();
                        // str_replace(" ", "-", get_the_title())
                        $pageid = get_the_id();
                        $page_title = str_replace(" ", "-", get_the_title());
                        $page_title = strtolower($page_title);
                        $lf_category_page = new WP_Query(array( 'category_name' => $page_title, 'posts_per_page'=>10));
                        if ( $lf_category_page->have_posts() ) : while ( $lf_category_page->have_posts() ) : $lf_category_page->the_post();
                        $user_id = get_the_author_meta( 'ID' ); 
                        
                        $categories = [];
                        foreach(get_terms( 'category', array( 'name__like' => 'type' )) as $item) $typeid = $item->term_id;
                        foreach(get_terms( array( 'taxonomy' => 'category','parent' => $typeid) ) as $item) $typeid = $item->slug;
                        array_push($categories, $typeid); 
                        foreach(get_terms( 'category', array( 'name__like' => 'difficulty' )) as $item) $typeid = $item->term_id;
                        foreach(get_terms( array( 'taxonomy' => 'category','parent' => $typeid) ) as $item) $typeid = $item->slug;
                        array_push($categories, $typeid); 
                        foreach(get_terms( 'category', array( 'name__like' => 'scissors' )) as $item) $typeid = $item->term_id;
                        foreach(get_terms( array( 'taxonomy' => 'category','parent' => $typeid) ) as $item) $typeid = $item->slug;
                        array_push($categories, $typeid); 
                        foreach(get_terms( 'category', array( 'name__like' => 'tape' )) as $item) $typeid = $item->term_id;
                        foreach(get_terms( array( 'taxonomy' => 'category','parent' => $typeid) ) as $item) $typeid = $item->slug;
                        array_push($categories, $typeid); 
                        
                        ?>
                        <div class="lf_item<?php foreach($categories as $item) echo ' '.$item; ?>">
                            <div class="lf_item_head">
                                <div class="lf_item_head_top">
                                    <p><?php echo get_the_title(); ?></p>
                                    <div class="lf_item_starrate">
                                        <?php $thebuildrate = get_post_meta( get_the_id(), '_starrate', true ); if(!$thebuildrate) $thebuildrate = 0; ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="<?php $thebuildratestate = ($thebuildrate>0 ? 'active' : ''); echo $thebuildratestate; ?>" width="15px" height="15px"><g><path d="M0,0h24v24H0V0z" fill="none"></path><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><polygon points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"></polygon><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"></path></g></g></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="<?php $thebuildratestate = ($thebuildrate>1 ? 'active' : ''); echo $thebuildratestate; ?>" width="15px" height="15px"><g><path d="M0,0h24v24H0V0z" fill="none"></path><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><polygon points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"></polygon><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"></path></g></g></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="<?php $thebuildratestate = ($thebuildrate>2 ? 'active' : ''); echo $thebuildratestate; ?>" width="15px" height="15px"><g><path d="M0,0h24v24H0V0z" fill="none"></path><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><polygon points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"></polygon><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"></path></g></g></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="<?php $thebuildratestate = ($thebuildrate>3 ? 'active' : ''); echo $thebuildratestate; ?>" width="15px" height="15px"><g><path d="M0,0h24v24H0V0z" fill="none"></path><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><polygon points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"></polygon><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"></path></g></g></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="<?php $thebuildratestate = ($thebuildrate>4 ? 'active' : ''); echo $thebuildratestate; ?>" width="15px" height="15px"><g><path d="M0,0h24v24H0V0z" fill="none"></path><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><polygon points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"></polygon><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"></path></g></g></svg>
                                        <span><?php echo $thebuildrate; ?></span>
                                    </div>
                                </div>
                                <div class="lf_item_poster_cover">
                                    <?php $id = get_post_thumbnail_id();$src = wp_get_attachment_image_src($id, $size);$alt = get_the_title($id);$class = $attr['class'];$useragentos = $_SERVER["HTTP_USER_AGENT"];$generalimgexe=".jpg";$imgmainsrc = $src[0];$baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));$exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));$newimgsrcset = $baseimgsrc.$generalimgexe;$newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;$newimgsrcset2 = $baseimgsrc."-medium".$generalimgexe;$newimgsrcset3 = $baseimgsrc."-large".$generalimgexe;$imgsrcsetqueue = "$newimgsrcset1 300w, $newimgsrcset2 900w, $newimgsrcset3 1500w";echo '<img src="' . $newimgsrcset . '" alt="' . $alt . '" class="' . $class . '" srcset="'.$imgsrcsetqueue.'"/>';?>
                                    <div class="lf_item_instructor">
                                        <img src="<?php echo $tempalte_dir."/assets/images/authors/".$user_id.".jpg" ?>" />
                                        <p><span>Instructor</span><br/><?php echo get_the_author(); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="lf_item_details">
                                <p><span>Type:</span><?php echo $categories[0]; ?></p>
                                <p><span>Difficulity:</span><?php echo $categories[1]; ?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="lf_item_button">Build it Now</a>
                        </div>

                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </section>
            <section id="lf_posts_pagination">
                <?php 
                    $pagination = paginate_links(array(
                        'prev_text'    => __('<'),
                        'next_text'    => __('>'),
                    ));
                    echo "<nav>".$pagination."</nav>";
                ?>
            </section>
        <?php } ?>
        
        <?php get_template_part( 'sidebar-bottom' ); ?>
    </main>
    <?php get_template_part( 'sidebar-inpage' ); ?>
    

</section>
<?php get_footer(); ?>