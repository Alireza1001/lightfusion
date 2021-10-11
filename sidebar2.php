<aside id="lf_landing_left">
    <div id="lf_leftmenu_btn">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="lf_landing_left_sub">
        <ul id="lf_landing_services1">
            <h3><?php echo end(get_the_category())->name; ?></h3>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => end(get_the_category())->name,
                    'posts_per_page' => -1,
                );
                $arr_posts = new WP_Query( $args );
                
                if ( $arr_posts->have_posts() ) :
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        ?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php
                    endwhile;
                endif;
            ?>
        </ul>        
    </div>
    <div id="lf_countrys_list_data_services"></div>
</aside>

<script>
    document.getElementById("lf_landing_services1").style.height = (window.innerHeight-document.querySelector("aside#lf_landing_left .lf_landing_left_sub ul").getBoundingClientRect().top)+"px";
    window.addEventListener("resize", ()=>{
        console.log("sasho");
        document.getElementById("lf_landing_services1").style.height = (window.innerHeight-document.querySelector("aside#lf_landing_left .lf_landing_left_sub ul").getBoundingClientRect().top)+"px";
    })
</script>