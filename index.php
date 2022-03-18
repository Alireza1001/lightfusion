<?php 
    get_header(); 
    $tempalte_dir = get_template_directory_uri();
?>
<section id="whole_page_wrapup">
    <?php get_template_part( 'sidebar' ); ?>
    <main>
    <?php get_template_part( 'nav-status' ); ?>
     <?php $intro=get_field('blog_intro', get_option( 'page_on_front' )); if( $intro ): ?>
         <section id="lf_weblog_intro">
             <h1><?php echo $intro['title']; ?></h1>
             <p><?php echo $intro['description']; ?></p>
         </section>
     <?php endif; ?>
    <section class="lf_blog_item_filter" id="lf_weblog_filter_2">
        <div>
            <p>Level filter: </p>
            <select id="lf_weblog_country_filter2" name="lf_weblog_country_filter" >
                <option value=''>All</options>
                <option value='General'>General</options>
                <option value='ATPL'>ATPL</options>
            </select>
        </div>
        <div>
            <p>Course filter: </p>
            <select id="lf_weblog_type_filter2" name="lf_weblog_type_filter" >
                <option value=''>All</options>
                <option value='PrinciplesofFlight'>Principles of Flight</options>
                <option value='Meteorology'>Meteorology</options>
                <option value='FlightInstruments'>Flight Instruments</options>
                <option value='Communication'>Communication</options>
                <option value='HumanPerformance'>Human Performance</options>
                <option value='GeneralNavigation'>General Navigation</options>
                <option value='Mass&Balance-Performance'>Mass & Balance - Performance</options>
                <option value='RadioNavigation'>Radio Navigation</options>
                <option value='Electrics&Electronics'>Electrics & Electronics</options>
                <option value='Powerplant'>Powerplant</options>
                <option value='FlightComputer-CR3'>Flight Computer - CR3</options>
                <option value='AirframesandSystems'>Airframes and Systems</options>
            </select>
        </div>
    </section>
    <section id="lf_blog_items">
        <div class="lf_items">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        $user_id = get_the_author_meta( 'ID' );
                        $theget_the_categorypost = '';
                        foreach((get_the_category()) as $category) $theget_the_categorypost .= '<a> <span>|</span> '. $category->name .'</a>';
                        echo '<div class="lf_item '.str_replace(" ", "", get_the_category()[0]->name).' '.str_replace(" ", "", get_the_category()[1]->name).'">
                            <a href="'.get_the_permalink().'">';
                        axgImgen(
                            get_the_post_thumbnail_url(), 
                            get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE), 
                            "", "", "lazy", "300", "86",
                            ["small", "medium", "large"]
                        );
                        echo '</a>
                            <div class="lf_item_profile"><div>
                            <img src="'.$tempalte_dir."/assets/images/authors/".$user_id.".jpg".'"/>
                            <p>By:<span>'.get_the_author() .'</span></p>
                            </div>
                            <p>'. get_the_date() .'</p>
                            </div>
                            <div class="lf_item_content">
                            <h2>
                            <a href="'. get_the_permalink() .'">'. get_the_title() .'</a>
                            </h2>
                            <div class="lf_item_cat">'.$theget_the_categorypost.'</div>
                            <p>'. get_the_excerpt() .'</p>
                            </div>
                            <div class="lf_item_bottom">
                            <a href="'. get_the_permalink() .'">read this article</a>
                            <p>
                            <img src="/wp-content/themes/lightfusion/assets/icons/comment-dark.svg" />
                            '. get_comments_number() .'
                            </p>
                            </div>
                            </div>';
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
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
    <?php get_template_part( 'sidebar-bottom' ); ?>
    </main>
    <?php get_template_part( 'sidebar-inpage' ); ?>
</section>


<?php get_footer(); ?>