<?php if(false) { ?>
<!-- <ul class="lf_head_share_btns">
    <ul class="lf_share_status2"></ul>
    <li class="lf_share_event lf_media_whatsapp">
        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://wa.me/?text=<?php echo getTheLink($post); ?>">
        <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/whatsapp.svg" />
        </a>
    </li>
    <li class="lf_share_event lf_media_telegram">
        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://telegram.me/share/url?url=<?php echo getTheLink($post); ?>&text=<?php echo get_the_title(); ?>">
        <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/telegram.svg" />
        </a>
    </li>
    <li class="lf_share_event lf_media_twitter">
        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://twitter.com/intent/tweet?url=<?php echo getTheLink($post); ?>&text=<?php echo get_the_title(); ?>">
        <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg" />
        </a>
    </li>
    <li class="lf_share_event lf_media_facebook">
        <a aria-label="test" target="_blank" rel="noopener noreferrer" href="https://facebook.com/sharer.php?u=<?php echo getTheLink($post); ?>&t=<?php echo get_the_title(); ?>">
        <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.svg" />
        </a>
    </li>
    <li class="lf_share_event lf_media_url lf_m">
        <p aria-label="test">
        <img alt="test" width="20px" height="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/copy.svg" />
            <?php if(is_home()) { ?>
                <input aria-label="test" value="https://caspianpartner.org/blog/" class="lf_input_clip"/>
            <?php } else { ?>
                <input aria-label="test" value="<?php echo get_permalink($post->ID) ?>" class="lf_input_clip"/>
            <?php } ?>
        </p>
    </li>
    <li>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 9V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"/></svg>
    </li>
    <span class="lf_copyurl_tooltip" id="lf_copyurl_tooltip_m">Link copied</span>
</ul> -->
<?php } ?>
<div id="lf_article_head">
    <div class="lf_breadcrumb">
        <?php if (is_home()) { ?>
            <p><?php echo "<a href='/'>Home</a> > Blog"; ?></p>
        <?php } else if(is_archive()) { ?>
            <p><?php echo "<a href='/'>Home</a>"." > ".get_the_title(); ?></p>
        <?php } else if(get_the_title($post->post_parent)!=get_the_title()){ ?>
            <p><?php echo "<a href='/'>Home</a>"." > <a href='".get_the_permalink($post->post_parent)."'>".get_the_title($post->post_parent)."</a> > <a href='".getTheLink($post)."'>".get_the_title()."</a>" ?></p>
        <?php }else { ?>
            <p><?php get_post_breadcrumb_blog2(); ?></p>
        <?php } ?>
        
    </div>
    <div class="lf_star_rating lf_star_rating0">
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
        <p>Rate</p>
    </div>
</div>