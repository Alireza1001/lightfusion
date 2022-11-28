<?php

add_action( 'wp_enqueue_scripts', 'lf_add_style' );
function lf_add_style() {
	wp_enqueue_style('lf_axgCSS', get_template_directory_uri()."/assets/css/AXGCustom.css");
	if (is_front_page()) {
		wp_enqueue_style('lf_home_init_style', get_template_directory_uri()."/assets/css/home.init.css");
		wp_enqueue_style('lf_home_style', get_template_directory_uri()."/assets/css/home.css");
	} else if (is_page_template( 'page-about.php' ) || is_page_template( 'page-contact.php' )) {
		wp_enqueue_style('lf_about_style', get_template_directory_uri()."/assets/css/about.css");
		wp_register_script('lf_about_script', get_template_directory_uri()."/assets/js/about.js", array(), true);
		wp_enqueue_script('lf_about_script');
	} else if (is_page_template( 'page-category.php' )) {
	    wp_enqueue_style('lf_home_init_style', get_template_directory_uri()."/assets/css/home.init.css");
		wp_enqueue_style('lf_home_style', get_template_directory_uri()."/assets/css/home.css");
		wp_enqueue_style('lf_category_style', get_template_directory_uri()."/assets/css/category.css");
		wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
	} else if (is_home() || is_archive() || is_page_template( 'page-category2.php' )) {
		wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
		wp_register_script('lf_weblog_script', get_template_directory_uri()."/assets/js/weblog.js", array(), true);
		wp_enqueue_script('lf_weblog_script');
	} else if (is_archive()) wp_enqueue_style('lf_weblog_style', get_template_directory_uri()."/assets/css/weblog.css");
	else if (is_404()) wp_enqueue_style('lf_404_style', get_template_directory_uri()."/assets/css/404.css");
	else if (is_single() || is_page()) wp_enqueue_style('lf_landing_style', get_template_directory_uri()."/assets/css/landing.css");
	if (!is_front_page() && !is_page_template( 'page-about.php' ) && !is_page_template( 'page-contact.php' )) {
		wp_register_script('lf_sidebar_script', get_template_directory_uri()."/assets/js/sidebar.js", array(), true);
		wp_enqueue_script('lf_sidebar_script');
	}
	wp_enqueue_style('lf_shortcodes_style', get_template_directory_uri()."/assets/css/shortcodes.css");
	wp_enqueue_style('lf_header_style', get_template_directory_uri()."/assets/css/header.css");
	wp_enqueue_style('lf_libcustom_style', get_template_directory_uri()."/assets/css/libcustom.css");

	global $post;
	$parent_name = get_the_title($post->post_parent);
	wp_localize_script( 'lf_category_script', 'parent_name', $parent_name );
}

// style tag modification
add_filter( 'style_loader_tag',  'style_modify', 10, 4 );
function style_modify( $html, $handle, $href, $media ){
	if ($handle == "dashicons" || $handle == "wp-block-library" ) return "";
	else if (strpos($handle, "lf") !== false || strpos($handle, "axg") !== false ) return '<link id="'.$handle.'-css" rel="preload" href="'.$href.'" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"> <noscript><link rel="stylesheet" href="'.$href.'"></noscript>';
	else return $html;
}



// accessing global access for page id
function post_id_access() {	?>
	<script type="text/javascript">
		var post_id = '<?php global $post; echo $post->ID; ?>';
	</script>
<?php } add_action('wp_head','post_id_access');



// menu
function lightfusionMenu() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'Footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'lightfusionMenu' );


// (AXONCODES) breadcrumb_category_blog
function get_post_breadcrumb_blog2() {
    global $post;
	$breadcrumb = [];
	
	echo "<a href='/'>Home</a>";
	$lf_cat_link_addup = 'href="/';


	if (is_page_template( 'single2.php' )) {

		$categories = [];
		$themaincatparent = 0;
		$themaincatparentslug = "";
		foreach(get_the_category() as $item) if ($item->parent == 0) {$themaincatparent = $item->term_id;$themaincatparentslug = $item->slug;echo ' > <a href="/'.$item->slug.'/">'.$item->name.'</a> ';}
		foreach(get_the_category() as $item) if ($item->parent == $themaincatparent) echo ' > <a href="/'.$themaincatparentslug.'/'.strtolower(str_replace(" ", "-", $item->name)).'/">'.$item->name.'</a> ';
	
	} else foreach(get_the_category() as $category) array_push($breadcrumb, $category->name);


	$counts=0;
	foreach ($breadcrumb as $item) {
		$lf_cat_link_addup = $lf_cat_link_addup.$item.'/';
		$lf_cat_link_addup = strtolower($lf_cat_link_addup);
		$lf_cat_link_addup = str_replace(" ","-",$lf_cat_link_addup);
		echo ' > <a '.$lf_cat_link_addup.'">'.$item.'</a> ';
	}
    if (!is_single()) echo ' > <a href="'.getTheLink($post).'">'.get_the_title().'</a> ';
	else echo ' > <a href="'.getTheLink($post).'">Current post</a> ';
}


// img srcset content
function add_responsive_class($content){
	if (strlen($content) > 0) {
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
	} else return $content;
} add_filter('the_content', 'add_responsive_class');

// text limiter
function textlimit($content, $limit) {
	$content_arr = explode(' ', $content);
	for ($i=0; $i < $limit; $i++) echo $content_arr[$i].' ';
	if (count($content_arr) > $limit) echo '...';
}

// next/prev post link
function nextPrev() {
	global $post;
	$nextprev_value = get_post_meta( $post->ID, '_nextprev', true );
	if (strlen($nextprev_value) > 0) {
		$thecategories = get_the_category();
		$thecurrentposttitle = get_the_title();
		if (count($thecategories) == 2) {
			
			$category1 = $thecategories[0]->name;
			$category2 = $thecategories[1]->name;
			$query = new WP_Query( array( 'category_name' => $category1.'+'.$category2 ) );
			if ($query->have_posts()):
				?>
				<section id="lf_nextprev">
				<?php
				echo '<p>'.$nextprev_value.'</p>';
				$theturn = 0;
				foreach($query->posts as $item) {
					if ($thecurrentposttitle == $item->post_title) break;
					$theturn++;
				}
				echo '<div>';
				$category1 = strtolower($category1);
				if ($theturn+1 < count($query->posts)) {
					$theturnhere = $theturn+1;
					$link = $query->posts[$theturnhere]->post_name;
					$link = "/$category1/$link";
					echo '<a id="lf_prev_btn" href="'.$link.'">❮ Previous</a>';
				}
				if ($theturn>0) {
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
    if (strlen($currentid)<=0) $currentid = $post->ID;
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
				<a aria-label="<?php echo getTheLink($post); ?>" class="lf_item" href="<?php echo getTheLink($post); ?>">
					<img alt="test" class="lf_item_bg" src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy"/>
					<bold class="lf_item_title"><?php echo get_the_title(); ?></bold>
					<p class="lf_item_p"><?php echo get_the_excerpt(); ?></p>
				</a>
			</li>
			<?php
		endwhile;
	endif; wp_reset_postdata();
}

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


function timeToRead_html( $post ) { 
    $value = get_post_meta( $post->ID, '_timeToRead', true );
	?>
    <input name="timeToRead_n" type="text" value="<?php echo $value ?>"/>
    
<?php }







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

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) return $data;
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4 );
  
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
} add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
		</style>';
}add_action( 'admin_head', 'fix_svg' );
?>