<ul id="lf_landing_bottom_tags" class="lf_contentVisCtrl">
    <?php
        $posttags = get_the_tags();
        if ($posttags) {foreach($posttags as $tag){echo '<li><a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name . '</a></li> ';}}
    ?>
</ul>
<section id="lf_landing_feedback">
    <div id="lf_feedback_q">
        <div id="lf_feedback_q_set1">
            <h2 class="lf_section_title">Was this page helpful?</h2>
            <button aria-label="test" id="lf_feedback_btn_yes" class="lf_feedback_yesno lf_item1">Yes</button>
            <button aria-label="test" id="lf_feedback_btn_no" class="lf_feedback_yesno lf_item2">No</button>
        </div>
        <div id="lf_feedback_q_set2" class="lf_feedback_collapse">
            <p>What was the most helpful point of this page for you?</p>
            <button aria-label="test" class="q_set2_qs lf_item0">It helped me complete my goad(s)</button>
            <button aria-label="test" class="q_set2_qs lf_item1">It had the information I needed</button>
            <button aria-label="test" class="q_set2_qs lf_item2">It had accurate information</button>
            <button aria-label="test" class="q_set2_qs lf_item3">It was easy to read</button>
            <button aria-label="test" class="q_set2_qs lf_item4">Something else</button>
        </div>
        <div id="lf_feedback_q_final" class="lf_feedback_collapse">
            <p id="lf_feedback_q_final_txt">
                Thanks for your cooperation!
            </p>
        </div>
    </div>
    <div class="lf_feedback_s">
        <div class="lf_star_rating lf_star_rating1">
            <svg class="lf_star_system lf_star_system0" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><polygon opacity=".3" points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"/><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"/></g></g></svg>
            <svg class="lf_star_system lf_star_system1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><polygon opacity=".3" points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"/><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"/></g></g></svg>
            <svg class="lf_star_system lf_star_system2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><polygon opacity=".3" points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"/><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"/></g></g></svg>
            <svg class="lf_star_system lf_star_system3" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><polygon opacity=".3" points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"/><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"/></g></g></svg>
            <svg class="lf_star_system lf_star_system4" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><path d="M0,0h24v24H0V0z" fill="none"/><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><polygon opacity=".3" points="12,15.4 8.24,17.67 9.24,13.39 5.92,10.51 10.3,10.13 12,6.1 13.71,10.14 18.09,10.52 14.77,13.4 15.77,17.68"/><path d="M22,9.24l-7.19-0.62L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27L18.18,21l-1.63-7.03L22,9.24z M12,15.4l-3.76,2.27 l1-4.28l-3.32-2.88l4.38-0.38L12,6.1l1.71,4.04l4.38,0.38l-3.32,2.88l1,4.28L12,15.4z"/></g></g></svg>
            <p class="lf_star_system_tooltip lf_star_system_tooltip0 lf_rate_done">poor content</p>
            <p class="lf_star_system_tooltip lf_star_system_tooltip1">not useful</p>
            <p class="lf_star_system_tooltip lf_star_system_tooltip2">useful</p>
            <p class="lf_star_system_tooltip lf_star_system_tooltip3">very useful</p>
            <p class="lf_star_system_tooltip lf_star_system_tooltip4">excellent</p>
        </div>
    </div>
</section>




<?php 

    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1));
    if ( $wpb_all_query->have_posts() ) :
        $the_starrate_arr = [];
        $i=0;
        $j=0;
        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
            $the_starrate_arr[$i][0] = get_the_ID();
            $the_starrate_arr[$i][1] = get_post_meta( $post->ID, '_starrate', true );
            $the_starrate_arr[$i][2] = get_comments_number();
            $i++;
        endwhile;
        wp_reset_postdata();
        for($i=0; $i<count($the_starrate_arr); $i++) {
            for($j=$i; $j<count($the_starrate_arr); $j++) {
                if($the_starrate_arr[$j][1] > $the_starrate_arr[$i][1]) {
                    $temp = $the_starrate_arr[$i];
                    $the_starrate_arr[$i] = $the_starrate_arr[$j];
                    $the_starrate_arr[$j] = $temp;
                }
            }
        }
        for($i=0; $i<count($the_starrate_arr); $i++) {
            for($j=$i; $j<count($the_starrate_arr); $j++) {
                if($the_starrate_arr[$j][2] > $the_starrate_arr[$i][2]) {
                    $temp = $the_starrate_arr[$i];
                    $the_starrate_arr[$i] = $the_starrate_arr[$j];
                    $the_starrate_arr[$j] = $temp;
                }
            }
        }
    endif;
?>
<section id="ax_homeblog">
    <div class="ax_h_title">
        <h2 class="ax_head"><a href="#Popular_posts_like_this">Popular posts like this</a></h2>
    </div>
    <div class="ax_items">
        <?php $i=-1; while ( count($the_starrate_arr)>0 && $i<2 ): $i++; ?>
            <div class="ax_item">
                <a href="<?php the_permalink($the_starrate_arr[$i][0]); ?>" target="_blank">
                    <div class="ax_poster">
                        <?php
                            $imgmaintag = '';
                            if(get_the_post_thumbnail($the_starrate_arr[$i][0])) {
                                $id = get_post_thumbnail_id($the_starrate_arr[$i][0]);
                                $src = wp_get_attachment_image_src($id);
                                $alt = get_the_title($id);
                                $class = "";
                                $useragentos = $_SERVER["HTTP_USER_AGENT"];
                                $generalimgexe=".jpg";
                                $imgmainsrc = $src[0];
                                $baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));
                                $exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));
                                $generalimgexe = $exeimgsrc;
                                $newimgsrcset = $baseimgsrc.$exeimgsrc;
                                $newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;
                                $imgmaintag = '<img src="' . $newimgsrcset1 . '" alt="' . $alt . '" class="' . $class . '"/>';
                            }
                            echo $imgmaintag;
                        ?>
                    </div>
                    <div class="ax_context">
                        <h5 class="ax_heading"><?php echo get_the_title($the_starrate_arr[$i][0]); ?></h5>
                    </div>
                    <button name="test" alt="test" class="ax_button">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>Read this</span>
                    </button>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</section>
