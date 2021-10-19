<?php get_header(); ?>

<div id="lf_progressbar_cover"><span id="lf_progressbar"></span></div>
<!-- <span id="lf_progressbar_num"></span> -->
<section id="whole_page_wrapup">
    <?php get_template_part( 'sidebar2' ); ?>
    <main id="lf_landing">
        <?php get_template_part( 'nav-status' ); ?>
        <div id="lf_landing_main_poster">
            <?php the_post_thumbnail(); ?>
        </div>
        <div id="lf_landing_author_cover">
            <p><span aria-label="<?php echo get_the_date(); ?>" id="lf_landing_author_date"><?php echo get_the_date(); ?></span></p>
            <div class="lf_landing_author_details">
                <img alt="<?php echo get_the_author(); ?>" id="lf_landing_author_details_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/authors/<?php echo get_the_author_meta( 'ID' ); ?>.jpg" loading="eager"/>
                <p>By: <span id="lf_landing_author_name" aria-label="><?php echo get_the_author(); ?>"><?php echo get_the_author(); ?></span></p>
            </div>
        </div>

        <div id="lf_landing_main_title_cover">
            <h1 id="lf_landing_main_title" title="<?php echo get_the_title(); ?>">
                <?php echo get_the_title(); ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="28px" height="18px" style="height: auto;"><path d="M0 0h24v24H0V0z" fill="none" style="stroke-width: 3px;"/><path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z" style="stroke-width: 1px;stroke: var(--txt2);fill: var(--txt2);"/></svg>
            </h1>
            <div class="head_title_seprator">
                <p>Reading time: <span><?php echo get_post_meta( $post->ID, '_timeToRead', true ); ?> min</span></p>
                <ul id="lf_landing_leftside_second_content_list2" class="lf_landing_right_sub">
                    <p id="lf_landing_leftside_second_content_list_guid2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/></svg>
                    <span>Content List</span>
                    <svg id="subside_services_arrow" class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg></p>
                </ul>
            </div>
        </div>

        <div id="lf_landing_after_main_title">
            <p><?php echo get_the_excerpt(); ?></p>
            
            <?php 
                require "form_ctrl/config.php";
                $mediaVideo = get_post_meta( $post->ID, '_mediaVideo', true );
                $mediaAudio = get_post_meta( $post->ID, '_mediaAudio', true );
                if(strlen($mediaVideo) > 0 || strlen($mediaAudio) > 0 ) {
            ?>
                <div class="lf_landing_media_content">
                    <?php if(strlen($mediaVideo)>0){ ?>
                        <div id="lf_landing_main_video_cover">
                            <?php echo $mediaVideo; ?>
                        </div>
                    <?php }if(strlen($mediaAudio)>0){ ?>
                        <div id="lf_landing_main_audio_cover">
                            
                            <?php
    
                                echo '
                                <audio preload="none" id="lf_landing_main_audio">
                                    <source src="'.$mediaAudio.'" type="audio/mp3">
                                    Your browser does not support the audio tag.
                                </audio>
                                ';
    
                            ?>
                            <div class="lf_landing_main_audio_cover_inner">
                                <img alt="loading image" src="<?php echo get_template_directory_uri(); ?>/assets/icons/loading.svg" class="lf_media_loading" id="lf_audio_loading"/>
                                <!-- <canvas style="width: 100%;height: 80px;"></canvas> -->
                                <img alt="audio canvas" id="lf_landing_main_audio_freq_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/audio_visual/audio_canvas_dark.png" width="100%" height="80px" loading="eager"/>
                                <div id="lf_audio_freq_fill"></div>
                                <input value="0" max="100" min="0" step="0.01" style="width: 100%; direction: ltr;" aria-label="test" id="audio_wave_range" type="range" />
                            </div>
                            <div id="lf_landing_main_audio_btn_group">
                                <div class="lf_left">
                                    <button aria-label="test" id="lf_landing_main_audio_play" class="lf_share_event lf_media_audioPlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                                            <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z"></path>
                                            <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z"></path>
                                        </svg>
                                    </button>
                                    <button aria-label="test" id="lf_landing_main_audio_next">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M18,13c0,3.31-2.69,6-6,6s-6-2.69-6-6s2.69-6,6-6v4l5-5l-5-5v4c-4.42,0-8,3.58-8,8c0,4.42,3.58,8,8,8s8-3.58,8-8H18z"/><polygon points="10.86,15.94 10.86,11.67 10.77,11.67 9,12.3 9,12.99 10.01,12.68 10.01,15.94"/><path d="M12.25,13.44v0.74c0,1.9,1.31,1.82,1.44,1.82c0.14,0,1.44,0.09,1.44-1.82v-0.74c0-1.9-1.31-1.82-1.44-1.82 C13.55,11.62,12.25,11.53,12.25,13.44z M14.29,13.32v0.97c0,0.77-0.21,1.03-0.59,1.03c-0.38,0-0.6-0.26-0.6-1.03v-0.97 c0-0.75,0.22-1.01,0.59-1.01C14.07,12.3,14.29,12.57,14.29,13.32z"/></g></g></svg>
                                    </button>
                                    <button aria-label="test" id="lf_landing_main_audio_download" class="lf_share_event lf_media_audioDownload">
                                        <a aria-label="test" alt="test" href="<?php echo get_template_directory_uri(); ?>/assets/audios/mit_ai_elon_musk.mp3" download>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.59 9H15V4c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v5H7.41c-.89 0-1.34 1.08-.71 1.71l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59c.63-.63.19-1.71-.7-1.71zM5 19c0 .55.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1H6c-.55 0-1 .45-1 1z"/></svg>
                                        </a>
                                    </button>
                                    <button aria-label="test" id="lf_landing_main_audio_volume_btn">
                                        <svg id="lf_landing_main_audio_volume" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M3 10v4c0 .55.45 1 1 1h3l3.29 3.29c.63.63 1.71.18 1.71-.71V6.41c0-.89-1.08-1.34-1.71-.71L7 9H4c-.55 0-1 .45-1 1zm13.5 2c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 4.45v.2c0 .38.25.71.6.85C17.18 6.53 19 9.06 19 12s-1.82 5.47-4.4 6.5c-.36.14-.6.47-.6.85v.2c0 .63.63 1.07 1.21.85C18.6 19.11 21 15.84 21 12s-2.4-7.11-5.79-8.4c-.58-.23-1.21.22-1.21.85z"/></svg>
                                        <input type="range" aria-label="test" id="lf_audio_volume_range">
                                    </button>
                                    <p class="lf_landing_main_audio_timer"><span id="lf_landing_main_audio_timer_current">0:00</span> / <span id="lf_landing_main_audio_timer_whole">0:00</span></p>
                                </div>
                                <div id="lf_audio_statics">
                                    <div id="lf_audio_statics_place"></div>
                                    <button aria-label="test" class="lf_share_event lf_media_audiodisLike" id="lf_audio_lieking_trigger">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path><path d="M21 12v-2h-9l1.34-5.34L9 9v10h9z" opacity=".3"></path><path d="M9 21h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.58 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9V9zM1 9h4v12H1z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="lf_scrolldown1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
        </div>            
        <section id="lf_landing_main_contexts" class="lf_contentVisCtrl">
            <?php the_content(); ?>
        </section>

        <section class="lf_landing_main_contexts">
            <?php get_template_part( 'Templates/quiz/shortexam-post' ); ?>
            <div class="lf_sharing">
                <?php
                    $title= urlencode(get_the_title());
                    $url= urlencode(get_the_permalink());
                    $homeurl= urlencode(get_bloginfo('url'));
                    $desc = urlencode(get_the_excerpt());  
                    $postthumburi = urlencode(get_the_post_thumbnail_url());  
                    $themdirect = get_template_directory_uri();
                ?>
                <ul class="lf_share_btns">
                    <div>
                        <li class="lf_share_event lf_media_facebook">
                            <a aria-label="facebook" target="_blank" rel="noopener noreferrer" href="https://facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo $title; ?>">
                                <img alt="facebook" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/facebook.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_pinterest">
                            <a aria-label="pinterest" target="_blank" rel="noopener noreferrer" href="https://pinterest.com/pin/create/button/?description=<?php echo $title; ?>&media=<?php echo $postthumburi; ?>&url=<?php echo $url; ?>">
                                <img alt="pinterest" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/pinterest.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_email">
                            <a aria-label="email" target="_blank" href="mailto:?subject=<?php echo $title; ?>&body=Check out this site <?php echo $url; ?>">
                                <img alt="email" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/email.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_twitter">
                            <a aria-label="twitter" target="_blank" rel="noopener noreferrer" href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>&hashtags=<?php echo $title; ?>">
                                <img alt="twitter" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/twitter.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_whatsapp">
                            <a aria-label="whatsapp" target="_blank" rel="noopener noreferrer" href="https://wa.me/?text=<?php echo $url; ?>">
                                <img alt="whatsapp" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/whatsapp.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_telegram">
                            <a aria-label="telegram" target="_blank" rel="noopener noreferrer" href="https://telegram.me/share/url?url=<?php echo $url; ?>&text=<?php echo $title; ?>">
                                <img alt="telegram" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/telegram.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_linkedin">
                            <a aria-label="linkedin" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>&summary=<?php echo $desc; ?>&source=<?php echo $title; ?>">
                                <img alt="linkedin" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/linkedin.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_blogger">
                            <a aria-label="blogger" target="_blank" rel="noopener noreferrer" href="https://www.blogger.com/blog-this.g?n=<?php echo $desc; ?>&t=<?php echo $title; ?>&u=<?php echo $url; ?>">
                                <img alt="blogger" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/blogger.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_tumblr">
                            <a aria-label="tumblr" target="_blank" rel="noopener noreferrer" href="https://www.tumblr.com/share?t=<?php echo $title; ?>&u=<?php echo $url; ?>">
                                <img alt="tumblr" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/tumblr.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_reddit">
                            <a aria-label="reddit" target="_blank" rel="noopener noreferrer" href="http://www.reddit.com/submit?url=<?php echo $url; ?>&title=<?php echo $title; ?>">
                                <img alt="reddit" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/reddit.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_sms">
                            <a aria-label="sms" target="_blank" href="sms:?body=Hi there. Check out<?php echo $url; ?>">
                                <img alt="sms" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/sms.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_rss">
                            <a aria-label="rss" target="_blank" href="https://homapilot.com/feed/">
                                <img alt="rss" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/rss.svg" />
                            </a>
                        </li>
                        <!-- <li class="lf_share_event lf_media_print" id="lf_landing_print">
                            <a aria-label="print" target="_blank" href="#">
                                <img alt="print" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/printer.svg" />
                            </a>
                        </li> -->
                        <li class="lf_share_event lf_media_url lf_d">
                            <p aria-label="url">
                                <img alt="url" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/copy.svg" />
                            </p>
                        </li>
                    </div>
                    <input aria-label="test" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="lf_input_clip"/>
                    <span class="lf_copyurl_tooltip" id="lf_copyurl_tooltip_main">Link copied!</span>
                </ul>
                <ul class="lf_share_status"></ul>
            </div>
        </section>
        
        <?php nextPrev(); ?>
        
        
        
        <?php get_template_part( 'sidebar-bottom' ); ?>
        <section id="lf_comments" class="lf_contentVisCtrl">
            <h2 class="lf_item_e">Comments<span id="lf_comments_counter"><?php echo get_comments_number(); ?></span></h2>
            <div>
                <?php comments_template(); ?>
            </div>

        </section>
    </main>
    <?php get_template_part( 'sidebar-inpage' ); ?>
    
</section>




<?php
    $page_href = get_the_ID();
    // star ctrl
    $ax_rate_content = "SELECT Rate, Page_Id FROM starrate WHERE Page_Id='$page_href'";
    $ax_p_rate_content = $conn->query($ax_rate_content);
    $starraters = 0;
    $totalrate =0;
    $rates = array();
    $bestrate = 0;
    if($ax_p_rate_content->num_rows >0) {
        while($row2 = $ax_p_rate_content->fetch_assoc()) {
            $starraters++;
            $totalrate += $row2["Rate"];
            if($row2["Rate"] > $bestrate) $bestrate = $row2["Rate"];
        }
        $sum = get_post_meta( $page_href, '_starrate', true );
    ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "CreativeWorkSeries",
            "name": "<?php echo get_the_title(); ?>",
            "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?php echo number_format($sum, 1, '.', '') ?>",
            "bestRating": "<?php echo $bestrate; ?>",
            "ratingCount": "<?php echo $starraters; ?>"
        }}
    </script>
<?php } ?>


<?php get_footer(); ?>