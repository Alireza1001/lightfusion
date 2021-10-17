
<?php
    header("Cache-Control: no-cache");
    // header("Cache-Control: max-age=0");
?>


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
    
    <!-- AXONGLITCH LIBRARY -->
    <!-- dropdown -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/dropdown/assets/css/style.css" />
    <!-- logo -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/logo/assets/css/style.css" />
    <!-- custom -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/assets/css/custom.css" />
    <link rel="stylesheet" href="https://axoncodes.com/libraries/assets/css/font&vars.css" />
    
    <!-- wp_head -->
    <?php wp_head(); ?>

    <?php require_once('header-style.php'); ?>
</head>
<body class="home" id="axoncodes" <?php body_class(); ?>>
    <script> var logo_stat = navigator.appVersion.indexOf("Mac OS"); </script>

    <header>
        <!-- logo -->
        <ax-elements
        mode="logo" 
        src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/Large size red.png"
        link="/"
        alt="homa pilot logo"
        ></ax-elements>

        <!-- dropdown -->
        <ax-elements 
            mode="dropdown"
            headTitlecolor="#FFF4A3"
            height="70"
            color="#282A35"
            colorHover="#fff"
            activeBackground="#282A35"
            headBackground="#0000"
            headBackgroundHover="#04AA6D"
            structure="dropdownGroup"
            title="Menu"
            background="#cbcbcb"
            subOpening="sub"
            subTrigger="click">
            <ax-elements 
                mode="dropdown"
                exit="true"
                headTitle="Tutorials"
                headTitlecolor="#FFF4A3"
                height="70"
                color="#282A35"
                colorHover="#fff"
                activeBackground="#282A35"
                headBackground="#0000"
                headBackgroundHover="#04AA6D"
                structure="mega singletab"
                title="Tutorials"
                background="#282a36"
                targetLocator="dropdown1"
                subOpening="sub"
                subTrigger="click"
                options='<?php print_r(wordpressAXDropdownContent(wp_get_nav_menu_items('tutorials'))); ?>'></ax-elements>
            <ax-elements 
                mode="dropdown"
                exit="true"
                headTitle="Paper Airplanes"
                headTitlecolor="#FFF4A3"
                height="70"
                color="#282A35"
                colorHover="#fff"
                activeBackground="#282A35"
                headBackground="#0000"
                headBackgroundHover="#04AA6D"
                structure="mega singletab"
                title="Paper Airplanes"
                background="#282a36"
                targetLocator="dropdown2"
                subOpening="sub"
                subTrigger="click"
                options='<?php print_r(wordpressAXDropdownContent(wp_get_nav_menu_items('paper_airplanes'))); ?>'></ax-elements>
            <ax-elements 
                mode="dropdown"
                exit="true"
                headTitle="Videos"
                headTitlecolor="#FFF4A3"
                height="70"
                color="#282A35"
                colorHover="#fff"
                activeBackground="#282A35"
                headBackground="#0000"
                headBackgroundHover="#04AA6D"
                structure="mega singletab"
                title="Videos"
                background="#282a36"
                targetLocator="dropdown3"
                subOpening="sub"
                subTrigger="click"
                options='<?php print_r(wordpressAXDropdownContent(wp_get_nav_menu_items('videos'))); ?>'></ax-elements>
            <ax-elements 
                mode="dropdown"
                headTitlecolor="#FFF4A3"
                height="70"
                color="#282A35"
                colorHover="#fff"
                activeBackground="#282A35"
                headBackground="#0000"
                headBackgroundHover="#04AA6D"
                title="Contact"
                background="#282a36"
                targetLocator="dropdown4"
                subOpening="sub"
                subTrigger="click"
                options='<?php print_r(wordpressAXDropdownContent(wp_get_nav_menu_items('contact'))); ?>'></ax-elements>
        </ax-elements>
    </header>

    <nav></nav>

    <ax-elements nomain="true">
        <section class="dropdown mega" mode="mega" nomain="true">
            <div class="dropdownTakeout" id="dropdown1"></div>
        </section>
        <section class="dropdown mega" mode="mega" nomain="true">
            <div class="dropdownTakeout" id="dropdown2"></div>
        </section>
        <section class="dropdown mega" mode="mega" nomain="true">
            <div class="dropdownTakeout" id="dropdown3"></div>
        </section>
        <section class="dropdown simple" mode="simple" nomain="true">
            <div class="dropdownTakeout" id="dropdown4"></div>
        </section>
    </ax-elements>


    
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
                <a title="homapilot home" href="/" id="ax_head_home">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                </a>
                <a title="homapilot about" href="/about">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
                </a>
                <div id="ax_theme_switch">
                    <svg id="ax_theme_switch_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.43 2.3c-2.38-.59-4.68-.27-6.63.64-.35.16-.41.64-.1.86C8.3 5.6 10 8.6 10 12c0 3.4-1.7 6.4-4.3 8.2-.32.22-.26.7.09.86 1.28.6 2.71.94 4.21.94 6.05 0 10.85-5.38 9.87-11.6-.61-3.92-3.59-7.16-7.44-8.1z"/></svg>
                </div>
                <?php get_template_part( 'search' ); ?>
            </div>
            <div class="ax-menu-logo">
                <a href="/" title="homapilot index">
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
    
<div id="lf_naturalizer" style="display: none"></div>