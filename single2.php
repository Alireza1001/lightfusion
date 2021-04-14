<?php  
/* 
* Template Name: paperairplane
* Template Post Type: post
*/
?>

<?php get_header(); global $post; ?>
<div id="lf_progressbar_cover"><span id="lf_progressbar"></span></div>
<span id="lf_progressbar_num"></span>
<section id="whole_page_wrapup">
    <?php get_template_part( 'sidebar' ); ?>
    <main id="lf_landing">
        <?php get_template_part( 'nav-status' ); ?>
        <div id="lf_landing_main_poster">
            <?php 
                the_post_thumbnail();
                $imgmaintag='';if(get_the_post_thumbnail()){$id=get_post_meta( $post->ID,'_multithumbmail',true );$src=wp_get_attachment_image_src($id);$alt=get_the_title($id);$class="";$useragentos=$_SERVER["HTTP_USER_AGENT"];$generalimgexe=".jpg";$imgmainsrc = $src[0];$baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));$exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));$generalimgexe = $exeimgsrc;$newimgsrcset = $baseimgsrc.$exeimgsrc;$newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;$newimgsrcset2 = $baseimgsrc."-medium".$generalimgexe;$newimgsrcset3 = $baseimgsrc."-large".$generalimgexe;$imgsrcsetqueue = "$newimgsrcset1 300w, $newimgsrcset2 900w, $newimgsrcset3 1500w";$imgmaintag = '<img id="lf_multithumbnail_img" src="' . $src[0] . '" loading="eager" alt="' . $alt . '" class="' . $class . '" srcset="'.$imgsrcsetqueue.'"/>';}
                echo $imgmaintag;
            ?>
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
                <div id="detailed_categories">
                    <?php 

                        $categories = [];
    
                        foreach(get_the_category() as $item) if($item->name == 'Type') $categories[] = $item->term_id;
                        foreach(get_the_category() as $item) if($item->name == 'Difficulty') $categories[] = $item->term_id;
                        foreach(get_the_category() as $item) if($item->name == 'Scissors') $categories[] = $item->term_id;
                        foreach(get_the_category() as $item) if($item->name == 'Tape') $categories[] = $item->term_id;

                        foreach(get_the_category() as $item) if($item->category_parent == $categories[0]) echo "<p>".$item->name."</p>";
                        foreach(get_the_category() as $item) if($item->category_parent == $categories[1]) echo "<p>".$item->name."</p>";
                        foreach(get_the_category() as $item) if($item->category_parent == $categories[2]) echo "<p>".$item->name."</p>";
                        foreach(get_the_category() as $item) if($item->category_parent == $categories[3]) echo "<p>".$item->name."</p>";


                    ?>
                </div>
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




        <section id="ax_hero_image">
            <div class="ax_tabs">
            
                <div id="ax_tabs_inside_cover">
                    <p data="General" class="ax_item ax_active" id="General-tap">
                        <span>Instruction</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" id="Layer_1" data-name="Layer 2" viewBox="0 0 1536.8 587.36"><defs><style>#Layer_1 .cls-1,#Layer_1 .cls-3{fill:#c33;}#Layer_1 .cls-2{fill:#f33;}#Layer_1 .cls-3{stroke:#003;stroke-miterlimit:10;stroke-width:4px;}#Layer_1 .cls-4{fill:#333;}</style></defs><metadata>Created by Laya Amiri for Homa Pilot 2021 - 2025</metadata><title>General Piloting Courses</title><path class="cls-1" d="M1640.5,453.5h0c-.43.11-10.31,2.9-16,16-4.92,11.44-6.62,30.74,4,63,0,0-.39.38-1.18,1.08-7.8,6.92-54.24,45.48-137.82,60.92-92,17-372,1-372,1s-4.15-.49-11.49-1.4l70.49-11.6c-6-57-192-43-192-43l-91.75,18.9C801,536.91,671.5,491.5,671.5,491.5s-162-41-217-42c-40.79-.74-67.83-13-79.08-19.34L525.5,400.5c-2-23-118-13-118-13l-52.94,14.28a182.93,182.93,0,0,1-8.06-32.28c-8-48-53-268-53-268s82-4,100,21,91,168,91,168,31,43,102,47,110,3,133,1,191-38,191-38,76-14,117-15,109-9,188,3a285.65,285.65,0,0,1,55.58,14.7l-64.58,20.3s-14,3-12,15,16,86,16,86,3,13,18,10,152-37,170-45c0,0,8,10,80,18,6,.66,12.07,1.53,18.23,2.57C1564.81,421.54,1640.5,453.5,1640.5,453.5Z" transform="translate(-192.5 -101.26)"></path><path class="cls-1" d="M1176.5,582.5,1106,594.1,562.5,683.5s-76,4-121-20l-20-8,471.25-97.1,91.75-18.9S1170.5,525.5,1176.5,582.5Z" transform="translate(-192.5 -101.26)"></path><path class="cls-2" d="M562.5,683.5s-41,8-79,4-127-23-127-23-17,0-27-19,92,10,92,10" transform="translate(-192.5 -101.26)"></path><path class="cls-1" d="M525.5,400.5,375.42,430.16,272.5,450.5s-35,8-80-5l162.06-43.72L407.5,387.5S523.5,377.5,525.5,400.5Z" transform="translate(-192.5 -101.26)"></path><path class="cls-1" d="M1624.5,320.5l-126.06,89c-.56.2-1.12.39-1.71.56-6.16-1-12.26-1.91-18.23-2.57-72-8-80-18-80-18-4.4-7-11.19-14.75-19.88-22.78,41.46-19.34,124.64-58.22,129.88-61.22,7-4,5-25,5-25,19-1,88,11,105,21S1624.5,320.5,1624.5,320.5Z" transform="translate(-192.5 -101.26)"></path><path d="M1398.5,389.5c-18,8-155,42-170,45s-18-10-18-10-14-74-16-86,12-15,12-15l64.58-20.3c10.27,3.8,20.33,8.08,30,12.72,28.5,13.62,53.87,30.24,72.31,46.16,1.8,1.56,3.54,3.1,5.2,4.64C1387.31,374.75,1394.1,382.5,1398.5,389.5Z" transform="translate(-192.5 -101.26)"></path><path d="M1144.5,323.5c-25.26-8-106-3-106-3s-12,3-11,16,13,79,13,79,1,12,15,13,105,4,105,4,12,2,11-14c0,0-16-44-18-80C1153.5,338.5,1154.81,326.78,1144.5,323.5Z" transform="translate(-192.5 -101.26)"></path><path d="M985.5,325.5s-89,10-109,29,6,42,6,42,30,25,115,26c0,0,10,1,7-15s-8-33-10-60S985.5,325.5,985.5,325.5Z" transform="translate(-192.5 -101.26)"></path><path class="cls-3" d="M1724,505c-7.8,4.25-21.87,10.86-43.08,17.13-3.45,1-7.08,2-10.91,3a396,396,0,0,1-42.69,8.42c.79-.7,1.18-1.08,1.18-1.08-10.59-32.22-8.89-51.52-4-63,5.65-13.13,15.53-15.92,16-16h0s57.19,19.34,84.41,41.06A6.3,6.3,0,0,1,1724,505Z" transform="translate(-192.5 -101.26)"></path><path class="cls-4" d="M1647.5,519c0,3.49-3.18,6.42-7.48,7.25l3.48-7.75-6,.5-3.35,7.06c-3.87-1-6.65-3.8-6.65-7.06,0-4.14,4.48-7.5,10-7.5S1647.5,514.86,1647.5,519Z" transform="translate(-192.5 -101.26)"></path><path class="cls-4" d="M1640.39,518.76a1.84,1.84,0,0,1,1.83,2.59l-2.2,4.9-50.45,112.4a1.84,1.84,0,0,1-3.51-.65l-.53-9a1.86,1.86,0,0,1,.17-.9l48.45-102,2.9-6.1a1.83,1.83,0,0,1,1.51-1.05Z" transform="translate(-192.5 -101.26)"></path><ellipse class="cls-4" cx="1458" cy="365.24" rx="10" ry="3"></ellipse><path class="cls-4" d="M1644.5,466.5s-10,1-1-177c0,0,3-19,9,0s11.26,87.57,2.63,176.79Z" transform="translate(-192.5 -101.26)"></path><path class="cls-4" d="M1706.5,567.5c-13.54-3.19-30.25-31.11-36.49-42.34,3.83-1,7.46-2,10.91-3,6.12,4.79,14.44,11.61,18.58,16.34C1706.5,546.5,1723.5,571.5,1706.5,567.5Z" transform="translate(-192.5 -101.26)"></path></svg>
                    </p>
                    <p data="ATPL" class="ax_item" id="ATPL-tap">
                        <span>Video Guide</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" id="Layer_2" data-name="Layer 2" viewBox="0 0 1877.05 622"><defs><style>#Layer_2 .cls-1{fill:#c33;}#Layer_2 .cls-1,#Layer_2 .cls-2,#Layer_2 .cls-3,#Layer_2 .cls-4{stroke:#c33;stroke-miterlimit:10;}#Layer_2 .cls-2{fill:#f33;}</style></defs><metadata>Created by Laya Amiri for Homa Pilot 2021 - 2025</metadata><title>ATPL Courses for Piloting Students</title><path class="cls-1" d="M1876.5,596.5s-34,30-90,43-40,16-151,26c0,0-151,5-198,2,0,0-12,5-127,14,0,0-152.47,1.2-225.77,1.74,166-9.73,293.71-17.72,301.77-19.74,24-6,19-35-14-38s-54-12-110-11-217,28-217,28-57.25,9.66-157.34,22.43l-3.66-.43-122-4s-130-16-193-36-289-74-289-74l-.12,0,140.12-13c10-6,0-13,0-13l-189-1-16.95,3.56c-2.41-3.87-8.47-14.87-6.05-24.56,3-12,5-25,22-34l22,1-136-275h92l301,253s23,19,63,21c39,1.95,526.62,4.85,551.05,5h1s96.25-11.92,181.08-20.21c23.3-2.28,45.75-4.28,65.09-5.7,10.09-.73,19.34-1.3,27.43-1.67,4.91-.22,9.41-.36,13.4-.42,69-1,274,4,274,4s33,1,51,11,37,26,37,26l84,49s15,7,28,26S1876.5,596.5,1876.5,596.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M420.5,537.5l-140.12,13L74.5,569.5l189.37-24.63L420.5,524.5S430.5,531.5,420.5,537.5Z" transform="translate(-13.06 -194)"></path><polygon class="cls-1" points="407.44 330.5 250.81 350.87 61.44 375.5 4.44 374.5 201.49 333.06 218.44 329.5 407.44 330.5"></polygon><path class="cls-1" d="M871.35,695.53l-58.28,3.3q28.68-1.74,55.52-3.76h0Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M777.28,700.85q-7.6.4-15.33.78" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M811.73,698.91q-16.71,1-34,1.92" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1024,679.83c212.63-26.31,297.43-61.93,297.43-61.93" transform="translate(-13.06 -194)"></path><polygon class="cls-2" points="265.44 534.5 198.44 536.5 145.44 484.5 187.44 482.5 265.44 534.5"></polygon><path class="cls-3" d="M1398.1,445.92c-8.09.37-17.34.94-27.43,1.67.09-.82.2-1.63.35-2.42,1.66-9,7.06-15.67,13.48-15.67C1391.09,429.5,1396.62,436.5,1398.1,445.92Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1384.5,429.5c-6.42,0-11.82,6.63-13.48,15.67-.15.79-.26,1.6-.35,2.42-19.34,1.42-41.79,3.42-65.09,5.7l-1-1.24c-10.18-12.4-23.35-31.57-37.15-52.81l69.1,21.26S1383.5,422.5,1384.5,429.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1305.58,453.29c-84.83,8.29-181.08,20.21-181.08,20.21h-1L1121.38,446l-1.55-19.8L1107.5,269.5l-36-49h33l56,43s19,3,28,11c5.39,4.79,44.16,71.31,78.89,124.74h0c13.8,21.24,27,40.41,37.15,52.81Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1121.38,446l-21.28-8a2.58,2.58,0,0,1,.05-4.84l19.68-7Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1148.86,710.84c-41.55-9.8-92.36,2.66-92.36,2.66-.28.52-.56,1-.83,1.55l-.43.85c-.21.4-.4.8-.59,1.2-.09.18-.18.36-.26.54-.18.36-.34.73-.5,1.09-.27.59-.53,1.19-.78,1.77H1032.5c-17.6,10.27-14.23,34.51-11.18,46.71L994.5,762.5c-8-18,0-27,0-27h-23c-15.37-22-67.34-34.28-100.14-40h0l-2.75-.46c58-4.35,109.68-9.58,155.43-15.24l22.63,5.63h0Z" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M1168.5,747c0,19.61-7.61,35.5-17,35.5-8.85,0-16.12-14.11-16.92-32.15,0-1.1-.08-2.22-.08-3.35,0-19.61,7.61-35.5,17-35.5S1168.5,727.39,1168.5,747Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1151.5,782.5c-76,14-100-10-100-10a44.75,44.75,0,0,1-2-6.19c-.09-.36-.18-.73-.27-1.12s-.18-.78-.27-1.19c0-.21-.09-.42-.13-.63-.09-.43-.18-.87-.26-1.32l-.12-.68c-.08-.47-.16-.94-.24-1.43a70.94,70.94,0,0,1-.77-7.63c0-.32,0-.65,0-1s0-.7,0-1.05c0-.51,0-1,0-1.55s0-1,0-1.56,0-.87,0-1.32c0-.11,0-.22,0-.33,0-.88.09-1.76.17-2.67v-.05l.09-1c0-.42.08-.85.13-1.28s.11-1,.18-1.45c.09-.7.2-1.4.31-2.12.07-.41.14-.83.22-1.24.24-1.32.52-2.68.86-4,.13-.57.28-1.15.44-1.73a.08.08,0,0,1,0,0c.13-.5.27-1,.42-1.51.22-.76.46-1.53.72-2.3.19-.59.39-1.18.61-1.78a.88.88,0,0,1,.05-.15c.2-.55.41-1.11.63-1.67s.53-1.33.81-2,.51-1.18.78-1.77c.16-.36.32-.73.5-1.09.08-.18.17-.36.26-.54.19-.4.38-.8.59-1.2l.43-.85c.27-.52.55-1,.83-1.55,0,0,50.81-12.46,92.36-2.66l2.64.66c-9.39,0-17,15.89-17,35.5,0,1.13,0,2.25.08,3.35C1135.38,768.39,1142.65,782.5,1151.5,782.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1053.11,720.5c-.28.68-.56,1.35-.81,2s-.43,1.12-.63,1.67a.88.88,0,0,0-.05.15c-.22.6-.42,1.19-.61,1.78-.26.77-.5,1.54-.72,2.3-.15.5-.29,1-.42,1.51a.08.08,0,0,0,0,0c-.16.58-.31,1.16-.44,1.73-.34,1.37-.62,2.73-.86,4-.08.41-.15.83-.22,1.24-.11.72-.22,1.42-.31,2.12-.07.49-.13,1-.18,1.45s-.09.86-.13,1.28l-.09,1v.05c-.08.91-.13,1.79-.17,2.67,0,.11,0,.22,0,.33,0,.45,0,.89,0,1.32s0,1.05,0,1.56,0,1,0,1.55c0,.35,0,.71,0,1.05s0,.66,0,1a70.94,70.94,0,0,0,.77,7.63c.08.49.16,1,.24,1.43l.12.68c.08.45.17.89.26,1.32,0,.21.09.42.13.63.09.41.18.81.27,1.19s.18.76.27,1.12a44.75,44.75,0,0,0,2,6.19l-19-3.32-11.23-2c-3.05-12.2-6.42-36.44,11.18-46.71Z" transform="translate(-13.06 -194)"></path><line class="cls-1" x1="981.44" y1="541.5" x2="1019.44" y2="526.5"></line><path class="cls-1" d="M1386.5,663.5c-8.06,2-135.75,10-301.77,19.74h0l-38,2.22h0L1024,679.83c-45.75,5.66-97.42,10.89-155.43,15.24h0q-26.85,2-55.52,3.76l-1.34.08-34,1.92-.41,0-91,5.12c-48.86,2.73-96.07,5.36-140,7.79C392,722.32,278.5,728.5,278.5,728.5l-15-10c264.9-12.2,485.93-35.87,624.66-53.57,100.09-12.77,157.34-22.43,157.34-22.43s161-27,217-28,77,8,110,11S1410.5,657.5,1386.5,663.5Z" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M805.5,780c0,19.61-7.61,35.5-17,35.5l-.65,0c-9.09-.71-16.35-16.31-16.35-35.47,0-12,2.83-22.52,7.16-29l0,0a17.39,17.39,0,0,1,4.65-4.86,9.23,9.23,0,0,1,5.17-1.67C797.89,744.5,805.5,760.39,805.5,780Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M783.33,746.17c1.48-1.57,2.3-2.46,2.3-2.46S742.5,732.5,695.5,739.5c0,0-19,25-6,60-36-3-59-14-59-14-9-16,0-24,0-24h-22c-15.13-19.67-47.42-39.33-62.25-47.74,43.91-2.43,91.12-5.06,140-7.79L712.5,719.5l76,25A9.23,9.23,0,0,0,783.33,746.17Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M787.85,815.47l-88.35-4c-9-3-10-12-10-12-13-35,6-60,6-60,47-7,90.13,4.21,90.13,4.21s-.82.89-2.3,2.46a17.39,17.39,0,0,0-4.65,4.86l0,0c-4.33,6.43-7.16,17-7.16,29C771.5,799.16,778.76,814.76,787.85,815.47Z" transform="translate(-13.06 -194)"></path><path class="cls-4" d="M783.33,746.17c-1.16,1.24-2.74,2.89-4.65,4.86A17.39,17.39,0,0,1,783.33,746.17Z" transform="translate(-13.06 -194)"></path><polyline class="cls-1" points="617.44 567.5 649.44 557.5 676.57 555.21"></polyline><path class="cls-1" d="M662.5,751.5s-15.77,18.77-.88,43.39" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M1776.8,493l-20.67,19.39a2.13,2.13,0,0,1-1.41.58l-64.49,1.32a3,3,0,0,0-.42.05l-46.26,10.25-.27,0-30.17,2.78a2.13,2.13,0,0,1-2.33-2.19l1.29-40.07a2.12,2.12,0,0,1,2.08-2.06l33.08-.68,23.3-.48.19,0c2-.23,34.56-4.3,59.1-23a2.12,2.12,0,0,1,2.29-.2,245.07,245.07,0,0,1,44.66,31.15A2.14,2.14,0,0,1,1776.8,493Z" transform="translate(-13.06 -194)"></path><ellipse class="cls-3" cx="1127.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1075.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1023.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="971.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1334.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1282.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1230.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1178.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="713.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="661.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="609.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="557.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="920.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="868.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="816.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="764.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1542.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1490.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1438.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1386.44" cy="384.5" rx="13" ry="19"></ellipse></svg>
                    </p>
                    <p data="DIY Aircraft" class="ax_item" id="DIY Aircraft-tap">
                        <span>Download & Print</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" id="Layer_2" data-name="Layer 2" viewBox="0 0 1877.05 622"><defs><style>#Layer_2 .cls-1{fill:#c33;}#Layer_2 .cls-1,#Layer_2 .cls-2,#Layer_2 .cls-3,#Layer_2 .cls-4{stroke:#c33;stroke-miterlimit:10;}#Layer_2 .cls-2{fill:#f33;}</style></defs><metadata>Created by Laya Amiri for Homa Pilot 2021 - 2025</metadata><title>ATPL Courses for Piloting Students</title><path class="cls-1" d="M1876.5,596.5s-34,30-90,43-40,16-151,26c0,0-151,5-198,2,0,0-12,5-127,14,0,0-152.47,1.2-225.77,1.74,166-9.73,293.71-17.72,301.77-19.74,24-6,19-35-14-38s-54-12-110-11-217,28-217,28-57.25,9.66-157.34,22.43l-3.66-.43-122-4s-130-16-193-36-289-74-289-74l-.12,0,140.12-13c10-6,0-13,0-13l-189-1-16.95,3.56c-2.41-3.87-8.47-14.87-6.05-24.56,3-12,5-25,22-34l22,1-136-275h92l301,253s23,19,63,21c39,1.95,526.62,4.85,551.05,5h1s96.25-11.92,181.08-20.21c23.3-2.28,45.75-4.28,65.09-5.7,10.09-.73,19.34-1.3,27.43-1.67,4.91-.22,9.41-.36,13.4-.42,69-1,274,4,274,4s33,1,51,11,37,26,37,26l84,49s15,7,28,26S1876.5,596.5,1876.5,596.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M420.5,537.5l-140.12,13L74.5,569.5l189.37-24.63L420.5,524.5S430.5,531.5,420.5,537.5Z" transform="translate(-13.06 -194)"></path><polygon class="cls-1" points="407.44 330.5 250.81 350.87 61.44 375.5 4.44 374.5 201.49 333.06 218.44 329.5 407.44 330.5"></polygon><path class="cls-1" d="M871.35,695.53l-58.28,3.3q28.68-1.74,55.52-3.76h0Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M777.28,700.85q-7.6.4-15.33.78" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M811.73,698.91q-16.71,1-34,1.92" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1024,679.83c212.63-26.31,297.43-61.93,297.43-61.93" transform="translate(-13.06 -194)"></path><polygon class="cls-2" points="265.44 534.5 198.44 536.5 145.44 484.5 187.44 482.5 265.44 534.5"></polygon><path class="cls-3" d="M1398.1,445.92c-8.09.37-17.34.94-27.43,1.67.09-.82.2-1.63.35-2.42,1.66-9,7.06-15.67,13.48-15.67C1391.09,429.5,1396.62,436.5,1398.1,445.92Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1384.5,429.5c-6.42,0-11.82,6.63-13.48,15.67-.15.79-.26,1.6-.35,2.42-19.34,1.42-41.79,3.42-65.09,5.7l-1-1.24c-10.18-12.4-23.35-31.57-37.15-52.81l69.1,21.26S1383.5,422.5,1384.5,429.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1305.58,453.29c-84.83,8.29-181.08,20.21-181.08,20.21h-1L1121.38,446l-1.55-19.8L1107.5,269.5l-36-49h33l56,43s19,3,28,11c5.39,4.79,44.16,71.31,78.89,124.74h0c13.8,21.24,27,40.41,37.15,52.81Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1121.38,446l-21.28-8a2.58,2.58,0,0,1,.05-4.84l19.68-7Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1148.86,710.84c-41.55-9.8-92.36,2.66-92.36,2.66-.28.52-.56,1-.83,1.55l-.43.85c-.21.4-.4.8-.59,1.2-.09.18-.18.36-.26.54-.18.36-.34.73-.5,1.09-.27.59-.53,1.19-.78,1.77H1032.5c-17.6,10.27-14.23,34.51-11.18,46.71L994.5,762.5c-8-18,0-27,0-27h-23c-15.37-22-67.34-34.28-100.14-40h0l-2.75-.46c58-4.35,109.68-9.58,155.43-15.24l22.63,5.63h0Z" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M1168.5,747c0,19.61-7.61,35.5-17,35.5-8.85,0-16.12-14.11-16.92-32.15,0-1.1-.08-2.22-.08-3.35,0-19.61,7.61-35.5,17-35.5S1168.5,727.39,1168.5,747Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1151.5,782.5c-76,14-100-10-100-10a44.75,44.75,0,0,1-2-6.19c-.09-.36-.18-.73-.27-1.12s-.18-.78-.27-1.19c0-.21-.09-.42-.13-.63-.09-.43-.18-.87-.26-1.32l-.12-.68c-.08-.47-.16-.94-.24-1.43a70.94,70.94,0,0,1-.77-7.63c0-.32,0-.65,0-1s0-.7,0-1.05c0-.51,0-1,0-1.55s0-1,0-1.56,0-.87,0-1.32c0-.11,0-.22,0-.33,0-.88.09-1.76.17-2.67v-.05l.09-1c0-.42.08-.85.13-1.28s.11-1,.18-1.45c.09-.7.2-1.4.31-2.12.07-.41.14-.83.22-1.24.24-1.32.52-2.68.86-4,.13-.57.28-1.15.44-1.73a.08.08,0,0,1,0,0c.13-.5.27-1,.42-1.51.22-.76.46-1.53.72-2.3.19-.59.39-1.18.61-1.78a.88.88,0,0,1,.05-.15c.2-.55.41-1.11.63-1.67s.53-1.33.81-2,.51-1.18.78-1.77c.16-.36.32-.73.5-1.09.08-.18.17-.36.26-.54.19-.4.38-.8.59-1.2l.43-.85c.27-.52.55-1,.83-1.55,0,0,50.81-12.46,92.36-2.66l2.64.66c-9.39,0-17,15.89-17,35.5,0,1.13,0,2.25.08,3.35C1135.38,768.39,1142.65,782.5,1151.5,782.5Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M1053.11,720.5c-.28.68-.56,1.35-.81,2s-.43,1.12-.63,1.67a.88.88,0,0,0-.05.15c-.22.6-.42,1.19-.61,1.78-.26.77-.5,1.54-.72,2.3-.15.5-.29,1-.42,1.51a.08.08,0,0,0,0,0c-.16.58-.31,1.16-.44,1.73-.34,1.37-.62,2.73-.86,4-.08.41-.15.83-.22,1.24-.11.72-.22,1.42-.31,2.12-.07.49-.13,1-.18,1.45s-.09.86-.13,1.28l-.09,1v.05c-.08.91-.13,1.79-.17,2.67,0,.11,0,.22,0,.33,0,.45,0,.89,0,1.32s0,1.05,0,1.56,0,1,0,1.55c0,.35,0,.71,0,1.05s0,.66,0,1a70.94,70.94,0,0,0,.77,7.63c.08.49.16,1,.24,1.43l.12.68c.08.45.17.89.26,1.32,0,.21.09.42.13.63.09.41.18.81.27,1.19s.18.76.27,1.12a44.75,44.75,0,0,0,2,6.19l-19-3.32-11.23-2c-3.05-12.2-6.42-36.44,11.18-46.71Z" transform="translate(-13.06 -194)"></path><line class="cls-1" x1="981.44" y1="541.5" x2="1019.44" y2="526.5"></line><path class="cls-1" d="M1386.5,663.5c-8.06,2-135.75,10-301.77,19.74h0l-38,2.22h0L1024,679.83c-45.75,5.66-97.42,10.89-155.43,15.24h0q-26.85,2-55.52,3.76l-1.34.08-34,1.92-.41,0-91,5.12c-48.86,2.73-96.07,5.36-140,7.79C392,722.32,278.5,728.5,278.5,728.5l-15-10c264.9-12.2,485.93-35.87,624.66-53.57,100.09-12.77,157.34-22.43,157.34-22.43s161-27,217-28,77,8,110,11S1410.5,657.5,1386.5,663.5Z" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M805.5,780c0,19.61-7.61,35.5-17,35.5l-.65,0c-9.09-.71-16.35-16.31-16.35-35.47,0-12,2.83-22.52,7.16-29l0,0a17.39,17.39,0,0,1,4.65-4.86,9.23,9.23,0,0,1,5.17-1.67C797.89,744.5,805.5,760.39,805.5,780Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M783.33,746.17c1.48-1.57,2.3-2.46,2.3-2.46S742.5,732.5,695.5,739.5c0,0-19,25-6,60-36-3-59-14-59-14-9-16,0-24,0-24h-22c-15.13-19.67-47.42-39.33-62.25-47.74,43.91-2.43,91.12-5.06,140-7.79L712.5,719.5l76,25A9.23,9.23,0,0,0,783.33,746.17Z" transform="translate(-13.06 -194)"></path><path class="cls-1" d="M787.85,815.47l-88.35-4c-9-3-10-12-10-12-13-35,6-60,6-60,47-7,90.13,4.21,90.13,4.21s-.82.89-2.3,2.46a17.39,17.39,0,0,0-4.65,4.86l0,0c-4.33,6.43-7.16,17-7.16,29C771.5,799.16,778.76,814.76,787.85,815.47Z" transform="translate(-13.06 -194)"></path><path class="cls-4" d="M783.33,746.17c-1.16,1.24-2.74,2.89-4.65,4.86A17.39,17.39,0,0,1,783.33,746.17Z" transform="translate(-13.06 -194)"></path><polyline class="cls-1" points="617.44 567.5 649.44 557.5 676.57 555.21"></polyline><path class="cls-1" d="M662.5,751.5s-15.77,18.77-.88,43.39" transform="translate(-13.06 -194)"></path><path class="cls-3" d="M1776.8,493l-20.67,19.39a2.13,2.13,0,0,1-1.41.58l-64.49,1.32a3,3,0,0,0-.42.05l-46.26,10.25-.27,0-30.17,2.78a2.13,2.13,0,0,1-2.33-2.19l1.29-40.07a2.12,2.12,0,0,1,2.08-2.06l33.08-.68,23.3-.48.19,0c2-.23,34.56-4.3,59.1-23a2.12,2.12,0,0,1,2.29-.2,245.07,245.07,0,0,1,44.66,31.15A2.14,2.14,0,0,1,1776.8,493Z" transform="translate(-13.06 -194)"></path><ellipse class="cls-3" cx="1127.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1075.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1023.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="971.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1334.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1282.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1230.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1178.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="713.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="661.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="609.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="557.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="920.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="868.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="816.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="764.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1542.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1490.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1438.44" cy="384.5" rx="13" ry="19"></ellipse><ellipse class="cls-3" cx="1386.44" cy="384.5" rx="13" ry="19"></ellipse></svg>
                    </p>
                </div>
       
            </div>
        </section>



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

        <?php if(false) { ?>
        <!-- <div class="lf_scrolldown1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>
        </div> -->
        <?php } ?>

        <section id="lf_landing_main_contexts" class="lf_contentVisCtrl">
            <?php the_content(); ?>
        </section>

        <section class="lf_landing_main_contexts">
            <?php include('Templates/quiz/shortexam-post.php'); ?>
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
                                <img alt="email" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/gmail.svg" />
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
                        <li class="lf_share_event lf_media_print" id="lf_landing_print">
                            <a aria-label="print" target="_blank" href="#">
                                <img alt="print" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/printer.svg" />
                            </a>
                        </li>
                        <li class="lf_share_event lf_media_url lf_d">
                            <p aria-label="url">
                                <img alt="url" width="20px" height="20px" src="<?php echo $themdirect; ?>/assets/icons/copy.svg" />
                            </p>
                        </li>
                    </div>
                    <!-- <input aria-label="test" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="lf_input_clip"/>
                    <span class="lf_copyurl_tooltip" id="lf_copyurl_tooltip_main">Link copied!</span> -->
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
        if(!$sum) $sum = 0;
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