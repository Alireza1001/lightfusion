<aside id="lf_landing_right">
    <?php if(is_home()) { ?>
        <section class="lf_blog_item_filter" id="lf_weblog_filter_1">
            <p>Course: </p>
            <select id="lf_weblog_country_filter" name="lf_weblog_country_filter" >
                <option value=''>all</options>
                <option value='General'>General</options>
                <option value='ATPL'>ATPL</options>
            </select>
            <p>Subject: </p>
            <select id="lf_weblog_type_filter" name="lf_weblog_type_filter" >
                <option value=''>all</options>
                <option value='PrinciplesofFlight'>Principles of Flight</options>
                <option value='Meteorology'>Meteorology</options>
                <option value='FlightInstruments'>Flight Instruments</options>
                <option value='Meteorology'>Meteorology</options>
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
        </section>
    <?php }else if(is_page_template( 'page-category.php' )) {

    }else{ ?>
        <ul class="lf_landing_right_sub">
            <p id="lf_landing_leftside_second_content_list_guid3">
                <span>Content List</span>
            </p>
            <div id="lf_right_content_list_bg"></div>
        </ul>
    <?php } ?>
    
        <div class="lf_sharing">
            <ul class="lf_share_btns">
                <p>Share</p>
                <div>
                    <li class="lf_share_event lf_media_facebook">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>&t=<?php echo get_the_title(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_pinterest">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://pinterest.com/pin/create/button/?description=<?php echo get_the_title(); ?>&media=<?php echo get_the_post_thumbnail_url(); ?>&url=<?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/pinterest.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_email">
                        <a aria-label="test" target="_blank" href="mailto:?subject=<?php echo get_the_title(); ?>&body=Check out this site <?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gmail.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_twitter">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo get_the_title(); ?>&hashtags=homapilot">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_whatsapp">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://wa.me/?text=<?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/whatsapp.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_telegram">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://telegram.me/share/url?url=<?php echo get_the_permalink(); ?>&text=<?php echo get_the_title(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/telegram.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_linkedin">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary=<?php echo get_the_excerpt(); ?>&source=homapilot">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_blogger">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://www.blogger.com/blog-this.g?n=<?php echo get_the_excerpt(); ?>&t=<?php echo get_the_title(); ?>&u=<?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/blogger.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_tumblr">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://www.tumblr.com/share?t=<?php echo get_the_title(); ?>&u=<?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/tumblr.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_reddit">
                        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="http://www.reddit.com/submit?url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/reddit.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_sms">
                        <a aria-label="test" target="_blank" href="sms:?body=Hi there. Check out<?php echo get_the_permalink(); ?>">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/sms.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_rss">
                        <a aria-label="test" target="_blank" href="https://homapilot.com/feed/">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/rss.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_print" id="lf_landing_print">
                        <a aria-label="print" target="_blank" href="#">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/printer.svg" />
                        </a>
                    </li>
                    <li class="lf_share_event lf_media_url lf_d">
                        <p aria-label="test">
                            <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/copy.svg" />
                        </p>
                    </li>
                </div>
                <input aria-label="test" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="lf_input_clip"/>
                <span class="lf_copyurl_tooltip" id="lf_copyurl_tooltip_main">Link copied!</span>
            </ul>
            <ul class="lf_share_status"></ul>
        </div>
    </aside>