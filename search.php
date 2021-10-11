<div id="ax_header_search">
    <form id="ax_header_search_form" method="POST">
        <label for="ax_isearch_button">search</label>
        <button type="submit" name="ax_submit" title="ax_submit" id="ax_isearch_button">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <path d="M447.615,64.386C406.095,22.866,350.892,0,292.175,0s-113.92,22.866-155.439,64.386 C95.217,105.905,72.35,161.108,72.35,219.824c0,53.683,19.124,104.421,54.132,144.458L4.399,486.366 c-5.864,5.864-5.864,15.371,0,21.236C7.331,510.533,11.174,512,15.016,512s7.686-1.466,10.617-4.399l122.084-122.083 c40.037,35.007,90.775,54.132,144.458,54.132c58.718,0,113.919-22.866,155.439-64.386c41.519-41.519,64.385-96.722,64.385-155.439 S489.134,105.905,447.615,64.386z M426.379,354.029c-74.001,74-194.406,74-268.407,0c-74-74-74-194.407,0-268.407 c37.004-37.004,85.596-55.5,134.204-55.5c48.596,0,97.208,18.505,134.204,55.5C500.378,159.621,500.378,280.028,426.379,354.029z" /></g></g></svg>
        </button>
        <label for="ax_isearch">search</label>
        <input id="ax_isearch" placeholder="search..." type="search" name="ax_isearch" pattern="[^'\x22]+"/>
    </form>
    <?php
        $search_name_arr = [];
        $search_link_arr = [];
    ?>
    <?php
        $wpb_all_query = new WP_Query(array('post_type'=>'page', 'post_status'=>'publish', 'posts_per_page'=>-1));
        if ( $wpb_all_query->have_posts() ) :
        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
        array_push($search_name_arr, get_the_title());
        array_push($search_link_arr, get_the_permalink());
        endwhile;
        wp_reset_postdata();
        else :
        endif;
        $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1));
        if ( $wpb_all_query->have_posts() ) :
        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
        array_push($search_name_arr, get_the_title());
        array_push($search_link_arr, get_the_permalink());
        endwhile;
        wp_reset_postdata();
        else :
        endif;
    ?>
    <script>
        var all_posts_names = <?php echo '["' . implode('", "', $search_name_arr) . '"]' ?>;
        var all_posts_links = <?php echo '["' . implode('", "', $search_link_arr) . '"]' ?>;
    </script>
    <div id="lf_searchform_res_cover">
        <ul id="lf_searchform_res"></ul>
        <script>
            const search_box = document.getElementById("ax_isearch");
            const lf_searchform_res = document.getElementById("lf_searchform_res");
            search_box.addEventListener("input", ()=>{
                if((search_box.value).length <= 0) {
                    lf_searchform_res.innerHTML = '';
                }else{
                    lf_searchform_res.innerHTML = '';
                    for(i=0; i<all_posts_names.length; i++) {
                        if((all_posts_names[i].toLowerCase().search(search_box.value.toLowerCase())) >= 0 ) {
                            lf_searchform_res.innerHTML += '<li><a href="'+all_posts_links[i]+'">'+all_posts_names[i]+'</a></li>';
                        }
                    }
                }
            });
        </script>
    </div>
</div>