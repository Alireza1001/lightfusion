<?php

// assets
function lf_add_style() {
	wp_enqueue_style('AXGCSS', get_template_directory_uri()."/assets/css/AXGCustom.css");
	if(is_front_page()) {
		wp_enqueue_style('lf_home_init_style', get_template_directory_uri()."/assets/css/home.init.css");
		wp_enqueue_style('lf_home_style', get_template_directory_uri()."/assets/css/home.css");
		wp_register_script('lf_home_script', get_template_directory_uri()."/assets/js/home.js", array(), true);
		wp_enqueue_script('lf_home_script');
	}else if(is_page_template( 'page-about.php' ) || is_page_template( 'page-contact.php' )) {
		wp_enqueue_style('lf_about_style', get_template_directory_uri()."/assets/css/about.css");
		wp_register_script('lf_about_script', get_template_directory_uri()."/assets/js/about.js", array(), true);
		wp_enqueue_script('lf_about_script');
	}else if(is_page_template( 'page-category.php' )) {
	    wp_enqueue_style('lf_home_init_style', get_template_directory_uri()."/assets/css/home.init.css");
		wp_enqueue_style('lf_home_style', get_template_directory_uri()."/assets/css/home.css");
		wp_enqueue_style('lf_category_style', get_template_directory_uri()."/assets/css/category.css");
		wp_register_script('lf_category_script', get_template_directory_uri()."/assets/js/category.js", array(), true);
		wp_enqueue_script('lf_category_script');
		wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
	}else if(is_home() || is_archive() || is_page_template( 'page-category2.php' )) {
		wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
		wp_register_script('lf_weblog_script', get_template_directory_uri()."/assets/js/weblog.js", array(), true);
		wp_enqueue_script('lf_weblog_script');
	}else if(is_archive()) wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
	else if(is_404()) wp_enqueue_style('lf_404_style', get_template_directory_uri()."/assets/css/404.css");
	else if(is_single() || is_page()) wp_enqueue_style('lf_landing_style', get_template_directory_uri()."/assets/css/landing.css");
	if(!is_front_page() && !is_page_template( 'page-about.php' ) && !is_page_template( 'page-contact.php' )) {
		wp_register_script('lf_sidebar_script', get_template_directory_uri()."/assets/js/sidebar.js", array(), true);
		wp_enqueue_script('lf_sidebar_script');
	}
	global $post;
	$parent_name = get_the_title($post->post_parent);
	wp_localize_script( 'lf_category_script', 'parent_name', $parent_name );
}add_action( 'wp_enqueue_scripts', 'lf_add_style' );




// script tag modification
add_filter('script_loader_tag', 'script_modify', 10, 3);
function script_modify($tag, $handle, $src) {
	if(strpos($handle, "lf") !== false) return '<script defer id="'.$handle.'-js" src="'.$src.'"></script>';
	else if(strpos($handle, "lf_about_script") !== false || strpos($handle, "lf_contact_script") !== false) return '<script async id="'.$handle.'-js" src="'.$src.'"></script>';
	else return $tag;
}

// style tag modification
add_filter( 'style_loader_tag',  'style_modify', 10, 4 );
function style_modify( $html, $handle, $href, $media ){
	if($handle == "dashicons" || $handle == "wp-block-library" ) return "";
	else if(strpos($handle, "lf") !== false ) return '<link id="'.$handle.'-css" rel="preload" href="'.$href.'" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"> <noscript><link rel="stylesheet" href="'.$href.'"></noscript>';
	else return $html;
}



// theme supports
add_theme_support( 'menus' );
add_theme_support( 'title-tag' );
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );


// disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);


//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


// gallery modification
add_filter( 'the_content', 'wpdocs_show_gallery_image_urls', 10, 99 );
function wpdocs_show_gallery_image_urls( $content ) {
    global $post;
    if(strpos($content, '[gallery') !== false) {
    	$lf_gallery_count=0;
    	$image_list = 
    	'<h2 class="lf_track_title lf_gallery_h2">Gallery</h2>
    	<section id="lf_landing_gallery">
    		<div class="lf_left">
    			<button aria-label="test" class="lf_gallery_ctrl" id="lf_gallery_next">
    				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
    			</button>
    			<svg id="lf_landing_main_pic_fullscreen_go" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6 14c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3c.55 0 1-.45 1-1s-.45-1-1-1H7v-2c0-.55-.45-1-1-1zm0-4c.55 0 1-.45 1-1V7h2c.55 0 1-.45 1-1s-.45-1-1-1H6c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm11 7h-2c-.55 0-1 .45-1 1s.45 1 1 1h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1s-1 .45-1 1v2zM14 6c0 .55.45 1 1 1h2v2c0 .55.45 1 1 1s1-.45 1-1V6c0-.55-.45-1-1-1h-3c-.55 0-1 .45-1 1z"/></svg>
    			<button aria-label="test" class="lf_gallery_ctrl" id="lf_gallery_prev">
    				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
    			</button>
    		</div>
    		<div class="lf_right">';
         foreach( get_post_gallery_images( $post ) as $image_url ) {
            $image_list .= '<img alt="test" loading="lazy" id="lf_gallery_active" class="lf_gallery_item item_'.$lf_gallery_count.'" src="'.$image_url . '" alt="test"/>';
            $lf_gallery_count++;
        }
        $image_list .= '</section>';
        
        $content_before_gallery = substr($content, 0, strpos($content, '[gallery'));
		$content_tmp_gallery = substr($content, strpos($content, '[gallery'));
		$content_after_gallery = substr($content_tmp_gallery, strpos($content_tmp_gallery, '"]')+2);
		$content = $content_before_gallery.$image_list.$content_after_gallery;
    }
    return $content;
}




// accessing global access for page id
function post_id_access() {	?>
	<script type="text/javascript">
		var post_id = '<?php global $post; echo $post->ID; ?>';
	</script>
<?php } add_action('wp_head','post_id_access');




// menu
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'Footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


// (AXONCODES) breadcrumb_category_blog
function get_post_breadcrumb_blog2() {
    global $post;
	$breadcrumb = [];
	
	echo "<a href='/'>Home</a>";
	$lf_cat_link_addup = 'href="/';


	if(is_page_template( 'single2.php' )) {

		$categories = [];
		$themaincatparent = 0;
		$themaincatparentslug = "";
		foreach(get_the_category() as $item) if($item->parent == 0) {$themaincatparent = $item->term_id;$themaincatparentslug = $item->slug;echo ' > <a href="/'.$item->slug.'/">'.$item->name.'</a> ';}
		foreach(get_the_category() as $item) if($item->parent == $themaincatparent) echo ' > <a href="/'.$themaincatparentslug.'/'.strtolower(str_replace(" ", "-", $item->name)).'/">'.$item->name.'</a> ';
	
	}else foreach(get_the_category() as $category) array_push($breadcrumb, $category->name);


	$counts=0;
	foreach($breadcrumb as $item) {
		$lf_cat_link_addup = $lf_cat_link_addup.$item.'/';
		$lf_cat_link_addup = strtolower($lf_cat_link_addup);
		$lf_cat_link_addup = str_replace(" ","-",$lf_cat_link_addup);
		echo ' > <a '.$lf_cat_link_addup.'">'.$item.'</a> ';
	}
    if(!is_single()) echo ' > <a href="'.get_the_permalink().'">'.get_the_title().'</a> ';
	else echo ' > <a href="'.get_the_permalink().'">Current post</a> ';
}


// img srcset content
function add_responsive_class($content){
	if(strlen($content) > 0) {
		$useragentos = $_SERVER["HTTP_USER_AGENT"];
		$generalimgexe=".jpg";
		$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
		$document = new DOMDocument();
		libxml_use_internal_errors(true);
		$document->loadHTML(utf8_decode($content));
		$imgs = $document->getElementsByTagName('img');
		foreach ($imgs as $img) {
			$imgmainsrc = $img->getAttribute('src');
			$baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));
			$exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));
			$newimgsrcset = $baseimgsrc.$exeimgsrc;
			$generalimgexe = $exeimgsrc;
			$newimgsrcset3 = $baseimgsrc."-large".$generalimgexe;
			$newimgsrcset2 = $baseimgsrc."-medium".$generalimgexe;
			$newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;
			$imgsrcsetqueue = "$newimgsrcset1 900w, $newimgsrcset2 1400w, $newimgsrcset3 2000w";
			$img->setAttribute('src', $newimgsrcset);
			$img->setAttribute('width', '100');
			$img->setAttribute('height', '100');
			$img->setAttribute('srcset',$imgsrcsetqueue);
			$img->setAttribute('srcset',$imgsrcsetqueue);
		}
		$html = $document->saveHTML();
		return $html;
	}else return $content;
}add_filter('the_content', 'add_responsive_class');


// img srcset thumbnail
function modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
	if(strlen($html) > 0) {
		$id = get_post_thumbnail_id();
		$src = wp_get_attachment_image_src($id, $size);
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
		$newimgsrcset2 = $baseimgsrc."-medium".$generalimgexe;
		$newimgsrcset3 = $baseimgsrc."-large".$generalimgexe;
		$imgsrcsetqueue = "$newimgsrcset1 300w, $newimgsrcset2 900w, $newimgsrcset3 1500w";
		$html = '<img src="' . $src[0] . '" alt="' . $alt . '" class="' . $class . '" srcset="'.$imgsrcsetqueue.'"/>';
	}
	return $html;
}
add_filter('post_thumbnail_html', 'modify_post_thumbnail_html', 99, 5);


// next/prev post link
function nextPrev() {
	global $post;
	$nextprev_value = get_post_meta( $post->ID, '_nextprev', true );
	if(strlen($nextprev_value) > 0) {
		$thecategories = get_the_category();
		$thecurrentposttitle = get_the_title();
		if(count($thecategories) == 2) {
			
			$category1 = $thecategories[0]->name;
			$category2 = $thecategories[1]->name;
			$query = new WP_Query( array( 'category_name' => $category1.'+'.$category2 ) );
			if($query->have_posts()):
				?>
				<section id="lf_nextprev">
				<?php
				echo '<p>'.$nextprev_value.'</p>';
				$theturn = 0;
				foreach($query->posts as $item) {
					if($thecurrentposttitle == $item->post_title) break;
					$theturn++;
				}
				echo '<div>';
				$category1 = strtolower($category1);
				if($theturn+1 < count($query->posts)) {
					$theturnhere = $theturn+1;
					$link = $query->posts[$theturnhere]->post_name;
					$link = "/$category1/$link";
					echo '<a id="lf_prev_btn" href="'.$link.'">❮ Previous</a>';
				}
				if($theturn>0) {
					$theturnhere = $theturn-1;
					$link = $query->posts[$theturnhere]->post_name;
					$link = "/$category1/$link";
					echo '<a id="lf_next_btn" href="'.$link.'">Next ❯</a>';
				}
				echo '</div>';
				?>
				</section>
				<?php
			endif;
		}
	}
}



// (AXONCODES) get all child pages
function ax_get_child_pages($currentid) {
    if(strlen($currentid)<=0) $currentid = $post->ID;
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $currentid,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	);
	$parent = new WP_Query( $args );
	if ( $parent->have_posts() ) :
		while ( $parent->have_posts() ) : $parent->the_post(); 
			?>
			<li>
				<a aria-label="<?php the_permalink(); ?>" class="lf_item" href="<?php the_permalink(); ?>">
					<img alt="test" class="lf_item_bg" src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy"/>
					<bold class="lf_item_title"><?php echo get_the_title(); ?></bold>
					<p class="lf_item_p"><?php echo get_the_excerpt(); ?></p>
				</a>
			</li>
			<?php
		endwhile;
	endif; wp_reset_postdata();
}


// add shortcodes secret deals
function lf_secretDeals_shortcode() { 
	$message = 
	'<section class="lf_secret_deals">
		<div class="lf_poster_cover">
			<svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 32 32" style="margin: -1px;">
				<path d="M15.967-.072C7.158-.072-.008 7.106-.008 15.929c0 8.822 7.166 15.999 15.975 15.999 8.837 0 16.025-7.177 16.025-15.999S24.803-.072 15.967-.072zm7.602 26.823l.034-.134c.054-.216.104-.431.157-.647a.936.936 0 0 0-1.147-1.077c-.404.117-.461-.135-.462-.144a.933.933 0 0 0-.77-.936.933.933 0 0 0-.543.062c-.246.03-.315-.106-.332-.155a.938.938 0 0 0-.772-.91 1.011 1.011 0 0 0-.486.038s-.437.01-.335-.588a.592.592 0 0 0 .009-.186l.698-5.066c.071-.654-.053-1.048-.554-1.132-.543-.09-.822.29-.914.799 0 0-1.602 7.001-1.859 9.367-.079.717-.143 1.843-.196 3.091l-.103.002c-4.35 0-8.208-2.112-10.61-5.368.19-.455.524-.986 1.105-1.529 1.589-1.488 3.391-.193 3.972.058.582.25 3.469 1.043 3.934-.464 0 0 .155-.522.116-1.565 0 0 .039-.483.775-.347.736.134 1.162-.812.406-1.605 0 0 .737-.56 1.124-1.198.388-.637-.135-.676-.251-.772-.116-.097-.426-.812.174-1.024s2.481-.541 1.609-1.933c-.872-1.391-1.512-2.145-1.802-3.265-.291-1.121-.251-1.372.136-1.874s.33-1.237.33-2.01c0-.294.035-.928-.023-1.699l-.068.119c-.556.965-1.855 1.774-2.72 2.413-1.728 1.274-3.82 1.951-5.627 3.09-1.999 1.261-3.188 3.21-3.852 5.441a19.076 19.076 0 0 0-.717 4.099c-.036.528-.031 1.09.008 1.653-2.351-4.849-1.522-10.844 2.512-14.867 2.781-2.773 6.502-4.012 10.14-3.758l-.002-.009c6.993.349 12.566 6.126 12.566 13.199 0 4.483-2.241 8.442-5.66 10.831zM13.473 9.329c.685-.495 1.112-.479 1.112-.479a.785.785 0 1 1 0 1.57.78.78 0 0 1-.578-.261c-.374-.322-.534-.83-.534-.83z" fill="#FEBA02"></path>
			</svg>
		</div>
		<div class="lf_content">
			<h3 class="lf_title">Signup for bounce tips</h3>
			<form action="/caspian" method="POST" class="lf_SecretDeals">
				<div>
					<label for="lf_secretDeals_input_name">You shall recieve cool useful tips and more detailed explanations about the important courses and first to catch up on our limited free services</label>
					<div class="ax_sub_item">
						<button type="submit" title="test" name="ax_sub_sibmit" class="lf_SecretDeals_btn">Signup</button>
						<input type="email" name="lf_secretDeals_input_name" id="lf_secretDeals_input_name" required autocomplete placeholder="Email"/>
					</div>
				</div>
			</form>
		</div>
		<img alt="test" class="lf_secret_deals_close" src="/wp-content/themes/lightfusion/assets/icons/clear-dark.svg" />
	</section>'; 
	return $message;
}add_shortcode('secretDeals', 'lf_secretDeals_shortcode'); 







// add shortcodes content
function lf_content_shortcode($atts, $content) {

	$type = $atts['type'];
	$keyword = $atts['keyword'];

	if(strlen($keyword)>0) $title = " ".ucwords($keyword).": ";
	$altTitle = "title='$keyword'";

	if($type == "code") {
		$code = str_replace("&lt;", "<span class='lf_content_htmltags_tag'>&lt;</span><span class='lf_content_htmltags_element'>", $content);
		$code = str_replace("&gt;", "</span><span class='lf_content_htmltags_tag'>&gt;</span>", $code);
		$message = "<section class='lf_content_htmltags'><h3>$keyword</h3><section class='lf_content_htmltags_inner'>$code</section></section>";
	}else if($type == "tooltip") {
		$theicon = '<svg class="lf_content_tooltip_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>';
		$message = "<span class='lf_content_tooltip'><span class='lf_content_tooltip_keyword'>$keyword</span> $theicon <span class='lf_content_tooltip_content'>$content</span></span>";
	}else if(strpos($type, "inner")>0) $message = "<span class='lf_content_$type' $altTitle> <span style='font-weight:600;'>$title </span> $content </span>";
	else $message = "<div class='lf_content_$type' $altTitle> <span style='font-weight:600;'>$title</span>$content</div>";
	
	return $message;

}add_shortcode('content', 'lf_content_shortcode');




// disable srcset on frontend
function disable_wp_responsive_images(){return 1;}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');
 
 
// change wp-login logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo/favicon-Homa-Pilot.png);
    		width:100px;
    		height:100px;
    		background-size: 100px;
    		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// METABOX REGISTERATION
function wporg_add_custom_box() {
    $screens = [ 'post' ];
    foreach ( $screens as $screen ) {
        // Register meta box timetoread
        add_meta_box(
            'timeToRead',
            'Time To Read',
            'timeToRead_html',
            $screen
        );
        // Register meta box FAQ
        add_meta_box(
            'faq',
            'FAQ',
            'faq_html',
            $screen
        );
        // Register meta box media-video
        add_meta_box(
            'mediaVideo',
            'Video Media',
            'video_html',
            $screen
        );
        add_meta_box(
            'mediaAudio',
            'Audio Media',
            'audio_html',
            $screen
        );
        // exercise
        add_meta_box(
            'exercise',
            'Quiz',
            'exercise_html',
            $screen
        );
        
        // nextprev
        add_meta_box(
            'nextprev',
            'Next / Prev posts',
            'nextprev_html',
            $screen
        );

		// starrate
        add_meta_box(
            'starrate',
            'StarRate state',
            'starrate_html',
            $screen
        );

		// multi thumbnail
        // add_meta_box(
        //     'second_thumbnail',
        //     'second_thumbnail',
        //     'second_thumbnail_html',
        //     $screen
        // );

		// download_print
        // add_meta_box(
        //     'download_print',
        //     'download_print',
        //     'download_print_html',
        //     $screen
        // );

		// download_printtext
        // add_meta_box(
        //     'download_print_text',
        //     'download_print_text',
        //     'download_print_text_html',
        //     $screen
        // );
        
    }
}

require_once('Templates/quiz/quiz-function-template.php');

function timeToRead_html( $post ) { 
    $value = get_post_meta( $post->ID, '_timeToRead', true );
	?>
    <input name="timeToRead_n" type="text" value="<?php echo $value ?>"/>
    
<?php }



require_once('Templates/faq/faq-function-template.php');




function video_html( $post ) { 
    $value1 = get_post_meta( $post->ID, '_mediaVideo', true ); ?>
    <input name="mediaVideo_n" type="text" value='<?php echo $value1 ?>'/>
<?php }
function audio_html( $post ) { 
    $value2 = get_post_meta( $post->ID, '_mediaAudio', true ); ?>
    <input name="mediaAudio_n" type="text" value='<?php echo $value2 ?>'/>
<?php }


function nextprev_html( $post ) { 
    $value = get_post_meta( $post->ID, '_nextprev', true ); ?>
    <textarea name="nextprev_n" type="text"><?php echo $value ?></textarea>
<?php }


function starrate_html( $post ) { 
    $value = get_post_meta( $post->ID, '_starrate', true ); ?>
    <p>Starrate on this post is: <?php echo $value; ?> </p>
<?php }


// require_once('Templates/multi-thumbnail/functions-template.php');


function wporg_save_postdata( $post_id ) {
    // timetoread
    if ( array_key_exists( 'timeToRead_n', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_timeToRead',
            $_POST['timeToRead_n']
        );
    }
    
    // videomedia
    if ( array_key_exists( 'mediaVideo_n', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_mediaVideo',
            $_POST['mediaVideo_n']
        );
    }
    
    // audiomedia
    if ( array_key_exists( 'mediaAudio_n', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_mediaAudio',
            $_POST['mediaAudio_n']
        );
    }
    
    // FAQ
    // $lf_faq_counts = $_POST['lf_faqmetabox_counter_input'];
    // $lf_faq_text = "{count:".$lf_faq_counts.";";
    // for($i=0; $i<$lf_faq_counts; $i++) {
    //     $lf_faq_title = $_POST['lf_faqmetabox_title'.$i];
    //     $lf_faq_value = $_POST['lf_faqmetabox_textarea'.$i];
    //     $lf_faq_text .= "{title:$lf_faq_title;value:$lf_faq_value},"; 
    // }
    // $lf_faq_text .= "}"; 
    // update_post_meta(
    //     $post_id,
    //     '_faq',
    //     $lf_faq_text
    // );


    // quiz
    update_post_meta(
        $post_id,
        '_exercise',
        $_POST['exercise_n']
    );
    
    
    // nexprev
    if ( array_key_exists( 'nextprev_n', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_nextprev',
            $_POST['nextprev_n']
        );
    }


	// starrate
    // if ( array_key_exists( 'starrate_n', $_POST ) ) {
    //     update_post_meta(
    //         $post_id,
    //         '_starrate',
    //         $_POST['starrate_n']
    //     );
    // }

	// second_thumbnail
    // if ( array_key_exists( 'second_thumbnail_n', $_POST ) ) {
    //     update_post_meta(
    //         $post_id,
    //         '_second_thumbnail',
    //         $_POST['second_thumbnail_n']
    //     );
    // }

	// download_print
    // if ( array_key_exists( 'download_print_n', $_POST ) ) {
    //     update_post_meta(
    //         $post_id,
    //         '_download_print',
    //         $_POST['download_print_n']
    //     );
    // }


	// download_print text
    // if ( array_key_exists( 'download_print_text_n', $_POST ) ) {
    //     update_post_meta(
    //         $post_id,
    //         '_download_print_text',
    //         $_POST['download_print_text_n']
    //     );
    // }

    
}
add_action( 'save_post', 'wporg_save_postdata' );
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );


?>
