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
    <!-- naturalizer -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/activationHandler/style.css" />
    <!-- searchbar -->
    <link rel="stylesheet" href="https://axoncodes.com/libraries/searchbar/template/style.css" />

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

    <?php axg_dropdownsbody(wp_get_nav_menus()); ?>