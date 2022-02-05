<?php
/**
 * The header for Light Fusion Theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LightFusion
 * @since 3.7.1
 */

if (!defined('ABSPATH')) exit;
	
?>



<!DOCTYPE html>
<html id="AX_HP" lang="en" dir="ltr">
<head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#4285f4">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <!-- categories -->
    <script type="text/javascript" async> 
        const categoryOrganizer = <?php echo json_encode(getCategoriesJson()); ?>;
    </script>

    <?php 
        $users_list = get_users();
        $get_comments_number = get_comments_number();
        $translation_array = get_template_directory_uri();
    ?>


    <script type="text/javascript" async>
        const userslist = <?php echo json_encode($users_list); ?>;
        const wp_dir_url = "<?php echo $translation_array; ?>";
        const wp_comment_count = "<?php echo $get_comments_number; ?>";
    </script>
    
    <!-- AXONGLITCH LIBRARY -->
    <!-- dropdown -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/dropdown/assets/css/style.css" />
    <!-- logo -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/logo/assets/css/style.css" />
    <!-- scrolldownAnimation -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/scrolldownAnimation/assets/css/style.css" />
    <!-- fontVars -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/assets/css/fontVars.css" />
    <!-- colorVars -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/assets/css/colorVars.css" />

    <!-- wp_head -->
    <?php wp_head(); ?>

    <?php require_once('header-style.php'); ?>
</head>
<body class="home" id="axoncodes" <?php body_class(); ?>>
    <header>
        <?php
            axg_headerLogo(get_theme_mod( 'custom_logo' )); // logo
            get_template_part( 'search' );
            generateMenuTemplates('header'); // header dropdown 
        ?>
    </header>

    <nav></nav>

    <?php axg_dropdownsbody(wp_get_nav_menus()); ?>

    <?php if(false) { ?>
        <header id="axon_header">
            <div class="ax-nav-left" tabindex="0">
                <div class="ax-menu-btn">
                    <div class="ax-menu-btn-line">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
            <div class="ax-nav-card" >
                <a title="home" href="/" id="ax_head_home">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                </a>
                <a title="about" href="/about">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
                </a>
                <div id="ax_theme_switch">
                    <svg id="ax_theme_switch_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.43 2.3c-2.38-.59-4.68-.27-6.63.64-.35.16-.41.64-.1.86C8.3 5.6 10 8.6 10 12c0 3.4-1.7 6.4-4.3 8.2-.32.22-.26.7.09.86 1.28.6 2.71.94 4.21.94 6.05 0 10.85-5.38 9.87-11.6-.61-3.92-3.59-7.16-7.44-8.1z"/></svg>
                </div>
                <?php get_template_part( 'search' ); ?>
            </div>
            <div class="ax-menu-logo">
                <a href="/" title="index">
                    <img alt="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/Large size red.png" width="130" height="50" />
                </a>
                <div id="header_print_new"></div>
            </div>
        </header>
        <section id="ax-megaheader">
            <nav id="ax-main-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </nav>
            <div id="side_nav"><div>
        </section>
    <?php } ?>
    
<div id="axg_naturalizer"></div>