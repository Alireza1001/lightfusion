<?php

    function getHeadTabItemsHtml() {
        $count=0;
        $content = '';
        foreach(get_categories(array('hide_empty' => FALSE)) as $category) {
            if ($category->category_parent == 0 && get_field('tap_head_item_activation', "category_$category->term_id")) {
                $name = strtolower(str_replace(" ", "_", $category->cat_name));
                $icon = get_field('tap_head_icon', "category_$category->term_id")['url'];
                $active = $count==0?" ax_active":"";
                $content .= "
                <p data='news' class='ax_item$active' id='$name-tap'>
                    <span>$category->cat_name</span>
                    <img class='head_tap_icon' width='20' height='20' src='$icon'>
                </p>";
                $count++;
            }
        }return $content;
    }
    

    function getCategoriesJson() {
        $categoryOrganizer = array();
        $count=0;
        foreach(get_categories(array('hide_empty' => FALSE)) as $category) {
            if ($category->category_parent == 0 && get_field('tap_head_item_activation', "category_$category->term_id")) {
                $categoryOrganizer[$count] = new stdClass();
                $categoryOrganizer[$count]->title = "$category->cat_name";
                $categoryOrganizer[$count]->link = "/$category->slug";
                $categoryOrganizer[$count]->icon = get_field('tap_head_icon', "category_$category->term_id")['url'];
                $categoryOrganizer[$count]->image = get_field('tap_head_image', "category_$category->term_id")['url'];
                $categoryOrganizer[$count]->content = getListOfCoursesByCatId($category);
                $count++;
            }
        }return $categoryOrganizer;
    }

    function getListOfCoursesByCatId($catData) {
        $arr = array();
        $count=0;
        foreach(get_categories(array('hide_empty' => FALSE)) as $category) {
            if ($category->category_parent == $catData->term_id) {
                $arr[$count] = new stdClass();
                $arr[$count]->title = "$category->cat_name";
                $arr[$count]->link = "/$catData->slug/$category->slug";
                $arr[$count]->valid = get_category($catData->term_id)->count>0?true:false;
                $arr[$count]->hide = get_field('hide_in_home', "category_$category->term_id");
                $arr[$count]->icon = get_field('tap_head_icon', "category_$category->term_id")['url'];
                $arr[$count]->content = getListOfLessonsByCatId($category);
                $count++;
            }
        }return $arr;
    }

    function getListOfLessonsByCatId($catData) {
        $arr = array();
        $count=0;

        $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'category'=>$catData->term_id));
        if ( $wpb_all_query->have_posts() ) {
            while ( $wpb_all_query->have_posts() ) { $wpb_all_query->the_post();
                $valid=false;
                foreach(get_the_category() as $subCat) if($subCat->name==$catData->cat_name) $valid = true;
                if($valid) {
                    $arr[$count] = new stdClass();
                    $arr[$count]->title = get_the_title();
                    $arr[$count]->link = get_the_permalink();
                    $count++;
                }
            }wp_reset_postdata();
        }return $arr;
    }
        
?>