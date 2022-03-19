<?php get_header(); ?>
<main id="lf_home">
    <?php echo categorySlider(); ?>

    <?php 
        $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));
        if ( $wpb_all_query->have_posts() ) :
    ?>
    <section id="ax_homeblog">
        <div class="ax_h_title">
            <h2 class="ax_head"><a href="#ax_homeblog">Articles</a></h2>
        </div>
        <div class="ax_items">
            <?php
                while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
                ?>
                    <div class="ax_item">
                        <a href="<?php echo getTheLink($post) ?>" target="_blank">
                            <div class="ax_poster">
                                <?php echo axgImgen(
                                    get_the_post_thumbnail_url(), 
                                    get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE), 
                                    "", "", "lazy", "300", "86",
                                    ["small"]
                                ); ?>
                            </div>
                            <div class="ax_context">
                                <h2 class="ax_heading"><?php echo get_the_title(); ?></h2>
                                <div class="ax_details">
                                    <div class="ax_tags">
                                        <?php foreach((get_the_category()) as $category){
                                            echo "<span>".$category->name."</span>";
                                        } ?>
                                    </div>
                                </div>
                                <p class="ax_paragraph">
                                <?php textlimit(get_the_excerpt(), 20) ?>
                                </p>
                            </div>
                            <button name="test" alt="test" class="ax_button">
                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>Read this</span>
                            </button>
                        </a>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <div class="ax_item ax_btn_cover">
            <a href="/blog" target="_bkank"><button name="test" alt="test" class="ax_button">
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>Enter the Weblog</span>
            </button></a>
        </div>
    </section>
    <?php endif; ?>


    
    <div id="lf_articles_by_comment">
            <p class="lf_items_title">Popular Posts</p>
            <div class="lf_items">
                <?php
                    $populars_title = array();
                    $populars_link = array();
                    $populars_comments = array();
                    $i=0;
                    $the_query = new WP_Query( array( 'post_type' => 'post') );
                    if($the_query->have_posts()):
                        while($the_query->have_posts()):
                            $the_query->the_post();
                            $populars_title[$i] = get_the_title();
                            $populars_link[$i] = getTheLink($post);
                            $populars_comments[$i] = get_comments_number();
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    for($j=0; $j<$i; $j++) {
                        for($k=0; $k<$i; $k++) {
                            $kpp = $k+1;
                            if($populars_comments[$k] < $populars_comments[$kpp]) {
                                $tmp_title = $populars_title[$k];
                                $tmp_link = $populars_link[$k];
                                $tmp_count = $populars_comments[$k];
                                $populars_title[$k] = $populars_title[$k+1];
                                $populars_link[$k] = $populars_link[$k+1];
                                $populars_comments[$k] = $populars_comments[$k+1];
                                $populars_title[$k+1] = $tmp_title;
                                $populars_link[$k+1] = $tmp_link;
                                $populars_comments[$k+1] = $tmp_count;
                            }
                        }
                        if($j==($i-1)) {
                            for($p=0; $p<$i; $p++) {
                                if($populars_comments[$p] == 0) $thewidth = 0;
                                else $thewidth = (100*$populars_comments[$p])/$populars_comments[0];
                                echo 
                                '<div class="lf_item"><a aria-label="'.$populars_title[$p].'" href="'.$populars_link[$p].'">
                                <h3 class="lf_item_title">'.$populars_title[$p].'</h3>
                                <div class="lf_item_progress" 
                                style="
                                width:'.$thewidth.'%;
                                background-color: #4caf50;
                                ">
                                <span class="lf_articles_by_comment_count">'.$populars_comments[$p].'</span></div>
                                </a></div>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
</main>
<?php get_footer(); ?>