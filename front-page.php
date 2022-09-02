<?php get_header(); ?>
<main id="lf_home">
  <?php echo categorySlider(); ?>

    <!-- Articles -->
    <?php
      $posts = array();
      $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));
      if ( $wpb_all_query->have_posts() ) :
        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
          $object = new stdClass();
          $object->link = urlencode(getTheLink($post));
          $object->title = urlencode(get_the_title());
          
          $categories = [];
          foreach((get_the_category()) as $category) $categories[] = $category->name;
          $object->categories = $categories;

          $object->excerpt = urlencode(get_the_excerpt());
          $object->thumbnail = new stdClass();
          $object->thumbnail->src = urlencode(get_the_post_thumbnail_url());
          $object->thumbnail->sizes = ["small"];
          $object->thumbnail->loading = "lazy";
          $object->thumbnail->alt = urlencode(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
          $object->thumbnail->width = "300";
          $object->thumbnail->height = "86";
          $posts[] = $object;
        endwhile;
        wp_reset_postdata();
      endif;
    ?>

    <axg-element
      mode="postsView"
      title="Articles"
      hashlink="#ax_homeblog"
      btntitle="Enter the Weblog"
      link="/blog"
      itemsbtntitle="Read This"
      bg="var(--bg1)"
      posts='<?php print_r(json_encode($posts)); ?>'
    ></axg-element>

    <?php if(false) { ?>
      <!-- <div id="lf_articles_by_comment">
            <p class="lf_items_title">Popular Posts</p>
            <div class="lf_items">
                <?php
                    // $populars_title = array();
                    // $populars_link = array();
                    // $populars_comments = array();
                    // $i=0;
                    // $the_query = new WP_Query( array( 'post_type' => 'post') );
                    // if($the_query->have_posts()):
                    //     while($the_query->have_posts()):
                    //         $the_query->the_post();
                    //         $populars_title[$i] = get_the_title();
                    //         $populars_link[$i] = getTheLink($post);
                    //         $populars_comments[$i] = get_comments_number();
                    //         $i++;
                    //     endwhile;
                    //     wp_reset_postdata();
                    // endif;
                    // for($j=0; $j<$i; $j++) {
                    //     for($k=0; $k<$i; $k++) {
                    //         $kpp = $k+1;
                    //         if($populars_comments[$k] < $populars_comments[$kpp]) {
                    //             $tmp_title = $populars_title[$k];
                    //             $tmp_link = $populars_link[$k];
                    //             $tmp_count = $populars_comments[$k];
                    //             $populars_title[$k] = $populars_title[$k+1];
                    //             $populars_link[$k] = $populars_link[$k+1];
                    //             $populars_comments[$k] = $populars_comments[$k+1];
                    //             $populars_title[$k+1] = $tmp_title;
                    //             $populars_link[$k+1] = $tmp_link;
                    //             $populars_comments[$k+1] = $tmp_count;
                    //         }
                    //     }
                    //     if($j==($i-1)) {
                    //         for($p=0; $p<$i; $p++) {
                    //             if($populars_comments[$p] == 0) $thewidth = 0;
                    //             else $thewidth = (100*$populars_comments[$p])/$populars_comments[0];
                    //             echo 
                    //             '<div class="lf_item"><a aria-label="'.$populars_title[$p].'" href="'.$populars_link[$p].'">
                    //             <h3 class="lf_item_title">'.$populars_title[$p].'</h3>
                    //             <div class="lf_item_progress" 
                    //             style="
                    //             width:'.$thewidth.'%;
                    //             background-color: #4caf50;
                    //             ">
                    //             <span class="lf_articles_by_comment_count">'.$populars_comments[$p].'</span></div>
                    //             </a></div>';
                    //         }
                    //     }
                    // }
                ?>
            </div>
        </div> -->
      <?php } ?>
</main>
<?php get_footer(); ?>