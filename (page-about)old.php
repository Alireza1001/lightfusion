<?php get_header(); 
/* Template Name: AboutOLD */?>

<main>
    <!-- <img id="lf_bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutus_bg.jpg"/> -->


    <section id="lf_lastwords">
        <div class="lf_poster">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
        </div>
        <div class="lf_txt">
            <p>لورم ایپسوم متن ساختگی با تولیکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی</p>
            <p class="lf_author">بنیامین امیری</p>
        </div>
    </section>

    <section id="lf_country_list">
    </section>

    <section id="lf_summery_services">
        <div class="lf_item"><a href="#">
            <span>خرید خانه</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/GettyImages_1163435614.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>اخذ اقامت</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>اخذ ویزا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>ثبت شرکت</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>مهاجرت</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/travel-hero-image3.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/rewards-exclusive-luxury-737x426.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
        <div class="lf_item"><a href="#">
            <span>کانادا</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cares-act-employee-retention-credit.jpg"/>
            <p>لورم ایپسوم متن ساختگی با تولی</p>
        </a></div>
    </section>

    


</main>
<script>
    var lf_about_counries_sub = "";
window.addEventListener("load", ()=>{
    for(i=0; i<ax_services_data.length; i++) {
        lf_about_counries_sub = "";
        for(j=0; j<ax_services_data[i][2].length; j++) {
            lf_about_counries_sub += '<li><a href="'+ax_services_data[i][0][j]+'">'+ax_services_data[i][2][j]+'</a><li>';
        }
        document.getElementById("lf_country_list").innerHTML += '<div class="lf_item"><div><span>'+ax_services_data[i][4][1]+'<hr/>'+ax_services_data[i][4][0]+'</span>'+ax_services_data[i][4][2]+'</div><ul>'+lf_about_counries_sub+'</ul></div>';
    }
});
</script>
<?php get_footer(); ?>