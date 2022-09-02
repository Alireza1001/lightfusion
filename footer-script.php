<script type="text/javascript">
        if(document.querySelector('#lf_landing_main_title_cover #lf_landing_main_title svg')) {
            if(navigator.share) {
                const shareData = {
                    title: "<?php get_the_title();
         ?>",
                    text: "<?php get_the_excerpt();
         ?>",
                    url: "<?php getTheLink($post);
         ?>",
                }
                
                const btn = document.querySelector('#lf_landing_main_title_cover #lf_landing_main_title svg');
        
                
                btn.addEventListener('click', async () => {
                    try {
                    await navigator.share(shareData)
                        inpage_notification(3000, 'MDN shared successfully');
        
                    } catch(err) {
                        inpage_notification(3000, 'Error: ' + err);
        
                    }
                });
        
            }
        }
        let ax_theme_state=0;
        const ax_main=document.getElementsByTagName("main");
        if(document.getElementById("ax_head_home")) {const ax_head_home=document.getElementById("ax_head_home");
        if(ax_main[0].id=="lf_home"){ax_head_home.style.display="none";
        }} let root=document.documentElement;
        ax_theme_state=sessionStorage.getItem("darkmode_on");
        var tab_state=1;
        const menu_bar_1=document.querySelectorAll("#axon_header .ax-nav-left .ax-menu-btn span")[0];
        const menu_bar_2=document.querySelectorAll("#axon_header .ax-nav-left .ax-menu-btn span")[1];
        const menu_bar_3=document.querySelectorAll("#axon_header .ax-nav-left .ax-menu-btn span")[2];
        const submegamenu=document.querySelector("section#ax-megaheader");
        const submegamenu_searchbox2=document.querySelector("section#ax-megaheader nav#ax-main-nav");
        function ax_nav(){if(tab_state==1){submegamenu.style.maxHeight="150%";
        menu_bar_1.style.transform="rotate(-47deg) translateY(4px)";
        menu_bar_2.style.transform="rotate(47deg) translateY(-5px)";
        menu_bar_3.style.opacity="0";
        submegamenu.style.background="#3c3c3cc2";
        tab_state=0;
        }else{submegamenu.style.maxHeight="0%";
        menu_bar_1.style.transform="rotate(0deg)";
        menu_bar_2.style.transform="rotate(0deg)";
        menu_bar_3.style.opacity="1";
        submegamenu.style.background="transparent";
        tab_state=1;
        }} if(document.querySelector("#axon_header .ax-nav-left .ax-menu-btn, section#ax-megaheader")) document.querySelector("#axon_header .ax-nav-left .ax-menu-btn, section#ax-megaheader").addEventListener("click",ax_nav);
        if(document.getElementById("side_nav"))document.getElementById("side_nav").addEventListener("click",ax_nav);
        // const ax_theme_switch_icon=document.getElementById("ax_theme_switch_icon");
        // var ax_theme_switch_bg;
        //  if(document.getElementById("ax_theme_switch")) ax_theme_switch_bg=document.getElementById("ax_theme_switch");
        root.style.setProperty('--ax_service_tab_bg',"#d0d0d0cc");
        root.style.setProperty('--ax_service_tab_active',"#fff");
        root.style.setProperty('--ax_home_offer_p',"#3e3e3e");
        root.style.setProperty('--ax_btn_bg',"#4CAF50");
        root.style.setProperty('--ax_btn_color',"#fff");
        root.style.setProperty('--ax_home_offer_bg',"#e9e5d76e");
        root.style.setProperty('--ax_home_offer_bg_hover',"#e9e5d7");
        root.style.setProperty('--ax_confer_placeholder',"#afafaf");
        
        
        // const ax_totop=document.getElementById("ax_scroll_top");
        

        // ax_totop.addEventListener("click",(e)=>{
        //     e.preventDefault();
        
        //     window.scroll({top:0,left:0,behavior:'smooth'});
        
        // });
        
        document.querySelectorAll("a").forEach(item=>{item.scroll({behavior:'smooth'})});
        
        // window.addEventListener("scroll",ax_totop_btn);
        
        // ax_totop_btn();
        
        // function ax_totop_btn(){
        //     if(window.innerWidth>768){
        //         if(window.scrollY<450) ax_totop.style.bottom=-50+"px";
        
        //         else ax_totop.style.bottom=20+"px";
        
        //     }else{
        //         if(window.scrollY<450) ax_totop.style.bottom=-50+"px";
        
        //         else ax_totop.style.bottom=35+"px";
        
        //     }
        // }
        
        const lf_confer_inputs=document.querySelectorAll(".ax_confer_input");
        const ax_confer_placeholder=document.querySelectorAll(".ax_confer_placeholder");
        lf_confer_inputs.forEach(item=>{item.addEventListener("input",()=>{var the_input_count=item.classList[1];
        if(item.value.length==0){for(i=0;
        i<ax_confer_placeholder.length;
        i++){if(ax_confer_placeholder[i].classList[1]==the_input_count){ax_confer_placeholder[i].classList.remove("axg_active");
        }}}else{for(i=0;
        i<ax_confer_placeholder.length;
        i++){if(ax_confer_placeholder[i].classList[1]==the_input_count){ax_confer_placeholder[i].classList.add("axg_active");
        }}}});
        });
        var subscribe_reqer=new XMLHttpRequest();
        const axsubs=document.getElementById("ax_scubscribersinput");
        var axsubs_actionPath="";
        var axsubs_formData=null;
        axsubs.addEventListener("submit",(e)=>{e.preventDefault();
        inpage_notification(5000,"You have success fully been added to our customers list");
        axsubs_formData=new FormData(axsubs);
        axsubs_actionPath="<?php echo WP_PLUGIN_DIR; ?>/axonglitch-wp/form_ctrl/subscribe_form.php";
        subscribe_reqer.open("POST",axsubs_actionPath);
        subscribe_reqer.send(axsubs_formData);
        },false);
        if(document.getElementById("ax_conferform")){const axconfer=document.getElementById("ax_conferform");
        var axconfer_actionPath="";
        var axconfer_formData=null;
        axconfer.addEventListener("submit",(e)=>{e.preventDefault();
        if(axconfer.checkValidity()){inpage_notification(5000,"Your request have been successfully added");
        axconfer_formData=new FormData(axconfer);
        axconfer_actionPath="<?php echo WP_PLUGIN_DIR; ?>/axonglitch-wp/form_ctrl/confer_form.php";
        subscribe_reqer.open("POST",axconfer_actionPath);
        subscribe_reqer.send(axconfer_formData);
        }},false);
        } const lf_inpage_notification=document.getElementById("lf_inpage_notification");
        let lf_inpage_notification_status=0;
        let current_width=0;
        var inpage_notif_inter_setting;
        function inpage_notification(long,txt){lf_inpage_notification_status=1;
        document.querySelector("#lf_inpage_notification span").style.maxWidth=0+"%";
        current_width = 0;
        document.querySelector("#lf_inpage_notification div").innerHTML=txt;
        lf_inpage_notification.style.transform="translateX(0vw)";
        clearInterval(inpage_notif_inter_setting);
        inpage_notif_inter_setting=setInterval(()=>{if(lf_inpage_notification_status==1){document.querySelector("#lf_inpage_notification span").style.maxWidth=(current_width*100/long)+"%";
        current_width+=(long/100);
        if(current_width>=(long+(long/100))){lf_inpage_notification.style.transform="translateX(-80vw)";
        lf_inpage_notification_status=0;
        current_width=0;
        document.querySelector("#lf_inpage_notification span").style.maxWidth=0+"%";
        clearInterval(inpage_notif_inter_setting);
        }}},(long/100));
        }document.querySelector("#lf_inpage_notification svg").addEventListener("click",()=>{lf_inpage_notification.style.transform="translateX(-80vw)";
        lf_inpage_notification_status=0;
        current_width=0;
        document.querySelector("#lf_inpage_notification span").style.maxWidth=0+"%";
        clearInterval(inpage_notif_inter_setting);
        });

        // if (document.getElementById("axg_searchform")) {
				// 	document.getElementById("axg_searchform").addEventListener("click", e => {
				// 		e.preventDefault();
        // 		document.getElementById("axg_searchform_res_cover").style.display="block";
				// 		// if(document.getElementById("lf_progressbar_num")) document.getElementById("lf_progressbar_num").style.opacity=0;
				// 		activationHandler.start('axg_searchbar')
        // 	});
				// }
        if(document.querySelector("section.lf_secret_deals")){document.querySelector("section.lf_secret_deals img.lf_secret_deals_close").addEventListener("click",()=>{document.querySelector("section.lf_secret_deals").classList.add("lf_closed");
        var seacretdeals_close_reqer=new XMLHttpRequest();
        seacretdeals_close_reqer.open("GET",'<?php echo WP_PLUGIN_DIR; ?>/axonglitch-wp/form_ctrl/secretDeals_form.php?PageId='+post_id+'&Email=cancel',true);
        seacretdeals_close_reqer.send();
        });
        document.querySelector("section.lf_secret_deals .lf_content form").addEventListener("submit",(e)=>{e.preventDefault();
        if(document.querySelector("section.lf_secret_deals .lf_content form").checkValidity()){document.querySelector("section.lf_secret_deals").classList.add("lf_closed");
        var seacretdeals_reqer=new XMLHttpRequest();
        seacretdeals_reqer.open("GET",'<?php echo WP_PLUGIN_DIR; ?>/axonglitch-wp/form_ctrl/secretDeals_form.php?PageId='+post_id+'&Email='+document.querySelector("section.lf_secret_deals .lf_content form input").value+'',true);
        seacretdeals_reqer.send();
        inpage_notification(7000,"Thanks for your subscription");
        }});
        };
        
        function lf_switch_darkmode_on(){
            if(ax_theme_state==1){
                root.style.setProperty('--lf_country_li_hover',"#5a5a5a");
        root.style.setProperty('--lf_country_li_active',"#7f7f7f");
        // ax_theme_switch_bg.style.backgroundColor="#fdfdfd";
        // ax_theme_switch_icon.style.backgroundColor="#1f1f1f";
        // ax_theme_switch_icon.style.fill="#d8d8d8";
        // ax_theme_switch_icon.innerHTML='<svg id="ax_theme_switch_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0z" fill="none"/><path d="M6.76 4.84l-1.8-1.79-1.41 1.41 1.79 1.79 1.42-1.41zM4 10.5H1v2h3v-2zm9-9.95h-2V3.5h2V.55zm7.45 3.91l-1.41-1.41-1.79 1.79 1.41 1.41 1.79-1.79zm-3.21 13.7l1.79 1.8 1.41-1.41-1.8-1.79-1.4 1.4zM20 10.5v2h3v-2h-3zm-8-5c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm-1 16.95h2V19.5h-2v2.95zm-7.45-3.91l1.41 1.41 1.79-1.8-1.41-1.41-1.79 1.8z"/></svg>';
        // ax_theme_switch_icon.style.transform="translate(38px, 4px) rotate(160deg)";
        root.style.setProperty('--ax_body_bg',"#212121");
        root.style.setProperty('--bg1',"#1b1b1b");
        root.style.setProperty('--bg2',"#212020");
        root.style.setProperty('--bg3',"#3c3c3c");
        root.style.setProperty('--txt1',"#d9d9d9");
        root.style.setProperty('--txt2',"#a3a3a3");
        root.style.setProperty('--ax_btn_color',"#121212");
        root.style.setProperty('--ax_service_bg',"#afafaf");
        root.style.setProperty('--ax_service_sh1',"#a1a1a173");
        root.style.setProperty('--ax_service_sh2',"#00000073");
        root.style.setProperty('--ax_service_sh3',"#0000");
        root.style.setProperty('--ax_service_sub',"#0d6193");
        root.style.setProperty('--ax_service_tab_bg',"#232323cc");
        root.style.setProperty('--ax_service_tab_active',"#1b1b1b");
        root.style.setProperty('--ax_home_offer_p',"#f5f5f5");
        root.style.setProperty('--ax_home_offer_bg',"#6b6969");
        root.style.setProperty('--ax_home_offer_bg_hover',"#303030");
        root.style.setProperty('--ax_btn_bg',"#82a32d");
        root.style.setProperty('--ax_btn_color',"#191919");
        root.style.setProperty('--ax_confer_input',"#afafaf");
        root.style.setProperty('--ax_confer_placeholder',"#343434");
        root.style.setProperty('--ax_confer_placeholder_focus',"#1f1f1f");
        root.style.setProperty('--ax_head_search_bg',"#6b6b6b");
        root.style.setProperty('--ax_head_search_txt',"#c0c0c0");
        root.style.setProperty('--ax_head_search_span',"#afafaf");
        root.style.setProperty('--ax_head_search_span_hover',"#171717");
        root.style.setProperty('--ax_hovering_tel_txt1',"#d9d9d9");
        root.style.setProperty('--ax_hovering_tel_svg_bg1',"#2E7D32");
        root.style.setProperty('--ax_hovering_tel_bg1',"#1b1b1b94");
        root.style.setProperty('--ax_hovering_tel_svg_hover_bg1',"#e3e3e3");
        root.style.setProperty('--ax_homenews_hover_bg',"#131313");
        root.style.setProperty('--ax_form_label',"#131313");
        root.style.setProperty('--ax_audio_bg_mode',"darken");
        root.style.setProperty('--ax_audio_bg',"#ff8f26");
        root.style.setProperty('--darkmode_reverse',"#fff");
        root.style.setProperty('--weblog_filter',"#4e4e4e");
        root.style.setProperty('--search_hover',"#424242");
        root.style.setProperty('--search_active',"#313131");
        root.style.setProperty('--page_titles',"#000");
        root.style.setProperty('--page_titles_shadow',"#bdbdbd");
        root.style.setProperty('--fulwidth_sections_bg',"#0D47A1");
        root.style.setProperty('--mobilesidebarbg',"#1f3e20");
        root.style.setProperty('--sidebar_nav_li_bg',"#191919");
        root.style.setProperty('--links_colors',"#3fb1e0");
        
                    root.style.setProperty('--lf_editor_bg',"#282c34");
        
                root.style.setProperty('--lf_editor_border',"#545454");
        
                if(document.getElementById("lf_landing_main_audio_freq_img")!=null){document.getElementById("lf_landing_main_audio_freq_img").setAttribute("src",wp_dir_url+"/assets/images/audio_visual/audio_canvas_white.png");
        } ax_theme_state=0;
        } else{sessionStorage.setItem("darkmode_on", 0);
        document.querySelectorAll("img").forEach(item=>{if(item.getAttribute("src").search("-light.svg")>=0){var img_src=item.getAttribute("src");
        var img_src_tmp=img_src.slice(0,-10);
        img_src_tmp+="-dark.svg";
        item.setAttribute("src",img_src_tmp);
        }});
        root.style.setProperty('--lf_editor_bg',"#282c34");
        
                root.style.setProperty('--lf_editor_border',"#f1f1f1");
        root.style.setProperty('--lf_country_li_hover',"#e1e1e1");
        root.style.setProperty('--lf_country_li_active',"#b1b1b1");
        // ax_theme_switch_bg.style.backgroundColor="#4f4f4f";
        // ax_theme_switch_icon.style.backgroundColor="#dcdcdc";
        // ax_theme_switch_icon.style.fill="#171717";
        // ax_theme_switch_icon.innerHTML='<svg id="ax_theme_switch_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12.43 2.3c-2.38-.59-4.68-.27-6.63.64-.35.16-.41.64-.1.86C8.3 5.6 10 8.6 10 12c0 3.4-1.7 6.4-4.3 8.2-.32.22-.26.7.09.86 1.28.6 2.71.94 4.21.94 6.05 0 10.85-5.38 9.87-11.6-.61-3.92-3.59-7.16-7.44-8.1z"/></svg>';
        // ax_theme_switch_icon.style.transform="translate(6px, 4px) rotate(20deg)";
        root.style.setProperty('--ax_body_bg',"#fff");
        root.style.setProperty('--bg1',"#fff");
        root.style.setProperty('--bg2',"#f5f5f5");
        root.style.setProperty('--bg3',"#e9e9e9");
        root.style.setProperty('--txt1',"#191919");
        root.style.setProperty('--txt2',"#2e2e2e");
        root.style.setProperty('--ax_btn_color_rev',"#fff");
        root.style.setProperty('--ax_service_bg',"#fff");
        root.style.setProperty('--ax_service_sh1',"#d6d6d6");
        root.style.setProperty('--ax_service_sh2',"#303030");
        root.style.setProperty('--ax_service_sh3',"#f5f5f5");
        root.style.setProperty('--ax_service_sub',"#b3c3ff");
        root.style.setProperty('--ax_service_tab_bg',"#d0d0d0cc");
        root.style.setProperty('--ax_service_tab_active',"#fff");
        root.style.setProperty('--ax_home_offer_p',"#3e3e3e");
        root.style.setProperty('--ax_home_offer_bg',"#e9e5d76e");
        root.style.setProperty('--ax_home_offer_bg_hover',"#e9e5d7");
        root.style.setProperty('--ax_btn_bg',"#43a047");
        root.style.setProperty('--ax_btn_color',"#fff");
        root.style.setProperty('--ax_confer_input',"#fff");
        root.style.setProperty('--ax_confer_placeholder',"#afafaf");
        root.style.setProperty('--ax_confer_placeholder_focus',"#5b5b5b");
        root.style.setProperty('--ax_head_search_bg',"#f7f7f7");
        root.style.setProperty('--ax_head_search_txt',"#787878");
        root.style.setProperty('--ax_head_search_span',"#1f1e1f");
        root.style.setProperty('--ax_head_search_span_hover',"#f7f7f7");
        root.style.setProperty('--ax_hovering_tel_txt1',"#000");
        root.style.setProperty('--ax_hovering_tel_svg_bg1',"#66bb6a");
        root.style.setProperty('--ax_hovering_tel_bg1',"#ffffff61");
        root.style.setProperty('--ax_hovering_tel_svg_hover_bg1',"#fff");
        root.style.setProperty('--ax_homenews_hover_bg',"#cecece");
        root.style.setProperty('--ax_form_label',"#212121");
        root.style.setProperty('--ax_audio_bg_mode',"color-dodge");
        root.style.setProperty('--ax_audio_bg',"#ff7c00");
        root.style.setProperty('--search_hover',"#d0d0d0");
        root.style.setProperty('--search_active',"#b5b5b5");
        root.style.setProperty('--darkmode_reverse',"#0e0e0e");
        root.style.setProperty('--weblog_filter',"#cecece");
        root.style.setProperty('--page_titles',"#fff");
        root.style.setProperty('--page_titles_shadow',"#000");
        root.style.setProperty('--fulwidth_sections_bg',"#90CAF9");
        root.style.setProperty('--mobilesidebarbg',"#4caf50");
        root.style.setProperty('--sidebar_nav_li_bg',"#c7c7c7");
        root.style.setProperty('--links_colors',"#00aaef");
        
                    sessionStorage.setItem("darkmode_on", 1);
        
                document.querySelectorAll("img").forEach(item=>{
                    if(item.getAttribute("src").search("-dark.svg")>=0){
                        var img_src=item.getAttribute("src");
        
                        var img_src_tmp=img_src.slice(0,-9);
        
                        img_src_tmp+="-light.svg";
        
                        item.setAttribute("src",img_src_tmp);
        
                    }
                });
        
                if(document.getElementById("lf_landing_main_audio_freq_img")!=null){
                    document.getElementById("lf_landing_main_audio_freq_img").setAttribute("src",wp_dir_url+"/assets/images/audio_visual/audio_canvas_dark.png");
        
                } ax_theme_state=1;
        
            }
        }
        
        // if(document.getElementById("ax_theme_switch")) document.getElementById("ax_theme_switch").addEventListener("click",lf_switch_darkmode_on);
        
        // if(sessionStorage.getItem("darkmode_on") == null)sessionStorage.setItem("darkmode_on", 0);
        // else{
        //   if(sessionStorage.getItem("darkmode_on") == 1) {
        //     lf_switch_darkmode_on();
        //   }
        // }

        // if(window.matchMedia('(prefers-color-scheme: dark)').matches==true)if(sessionStorage.getItem("darkmode_on")==0)lf_switch_darkmode_on();
        </script>
    <?php if(is_single() || is_page()) { ?>
        <script type="text/javascript">var page_href_link=window.location.href.slice(0,window.location.href.indexOf('#'));
        if(page_href_link.slice(-1)=="/")page_href_link=page_href_link.slice(0,-1);
        const lf_main=document.getElementsByTagName("main");
        if(document.getElementById("lf_landing_main_audio_cover")!=null){var lf_audiolike_trigger=document.getElementById("lf_audio_lieking_trigger");
        var lf_audiolike_trigger_path=document.querySelectorAll("#lf_audio_lieking_trigger path");
        lf_audiolike_trigger.addEventListener("click",()=>{if(lf_audiolike_trigger.classList[1]=="lf_media_audioLike"){lf_audiolike_trigger_path[1].style.opacity=.3;
        lf_audiolike_trigger_path[1].style.fill="#fff";
        lf_audiolike_trigger.classList.remove("lf_media_audioLike");
        lf_audiolike_trigger.classList.add("lf_media_audiodisLike");
        }else{lf_audiolike_trigger_path[1].style.opacity=1;
        lf_audiolike_trigger_path[1].style.fill="#e24854";
        lf_audiolike_trigger.classList.add("lf_media_audioLike");
        lf_audiolike_trigger.classList.remove("lf_media_audiodisLike");
        }});
        const lf_audio=document.getElementById("lf_landing_main_audio");
        const audio_range=document.getElementById("audio_wave_range");
        const lf_audio_freq_fill=document.getElementById("lf_audio_freq_fill");
        const lf_audio_loading=document.getElementById("lf_audio_loading");
        lf_audio_freq_fill.style.width=0;
        let lf_audio_play_per=0;
        setInterval(()=>{if(lf_audio_play_per==1){audio_range.value=100*(lf_audio.currentTime)/lf_audio.duration;
        lf_audio_freq_fill.style.width=audio_range.value+"%";
        }},10);
        audio_range.addEventListener("input",()=>{lf_audio.currentTime=audio_range.value*lf_audio.duration/100;
        lf_audio_freq_fill.style.width=audio_range.value+"%";
        });
        const lf_audio_play=document.getElementById("lf_landing_main_audio_play");
        const lf_landing_main_audio_cover=document.getElementById("lf_landing_main_audio_cover");
        let should_tick_audio=false;
        let audio_play_state=0;
        lf_audio.addEventListener("click",lf_audio_play_f);
        lf_audio_play.addEventListener("click",lf_audio_play_f);
        var show_loading_audio=1;
        function lf_audio_play_f(){if(audio_play_state==0){if(show_loading_audio==1){lf_audio_loading.style.zIndex=4;
        lf_audio_loading.style.opacity=1;
        lf_audio_loading.classList.add("axg_active");
        } lf_audio.play();
        lf_landing_main_audio_cover.classList.add("lf_mainaudio_onplay");
        should_tick_audio=true;
        audio_play_state=1;
        }else{lf_audio.pause();
        lf_landing_main_audio_cover.classList.remove("lf_mainaudio_onplay");
        should_tick_audio=true;
        should_tick_audio=false;
        audio_play_state=0;
        }} lf_audio.addEventListener("canplay",()=>{lf_audio_play_per=1;
        lf_audio_loading.style.zIndex=-1;
        lf_audio_loading.style.opacity=0;
        lf_audio_loading.classList.remove("axg_active");
        show_loading_audio=0;
        });
        const lf_audio_volume=document.getElementById("lf_landing_main_audio_volume");
        const lf_audio_volume_range=document.getElementById("lf_audio_volume_range");
        lf_audio_volume.addEventListener("click",()=>{if(window.innerWidth>1200){if(lf_audio.muted){lf_audio.muted=false;
        lf_audio_volume.classList.remove("lf_vide_muted");
        }else{lf_audio.muted=true;
        lf_audio_volume.classList.add("lf_vide_muted");
        }}});
        lf_audio_volume.addEventListener("dbclick",()=>{if(window.innerWidth<1200){if(lf_audio.muted){lf_audio.muted=false;
        lf_audio_volume.classList.remove("lf_vide_muted");
        }else{lf_audio.muted=true;
        lf_audio_volume.classList.add("lf_vide_muted");
        }}});
        lf_audio_volume_range.addEventListener("input",()=>{lf_audio.volume=lf_audio_volume_range.value/100;
        if(lf_audio.muted){lf_audio.muted=false;
        lf_audio_volume.classList.remove("lf_vide_muted");
        }});
        const lf_audio_time_fultime_placeholder=document.getElementById("lf_landing_main_audio_timer_whole");
        const lf_audio_time_current_placeholder=document.getElementById("lf_landing_main_audio_timer_current");
        var extrazero_s_fulltime_audio="",extrazero_m_fulltime_audio="",extrazero_h_fulltime_audio="";
        lf_audio.addEventListener("loadedmetadata",()=>{var lf_audio_long=lf_audio.duration;
        var lf_vid_long_h=parseInt(lf_audio_long/3600);
        var lf_vid_long_m=parseInt(lf_audio_long/60)-(lf_vid_long_h*60);
        var lf_vid_long_s=parseInt(lf_audio_long)-(lf_vid_long_m*60)-(lf_vid_long_h*3600);
        if(lf_vid_long_s<10&&lf_vid_long_s>0) extrazero_s_fulltime_audio="0";
        else extrazero_s_fulltime_audio="";
        if(lf_vid_long_m<10&&lf_vid_long_m>0) extrazero_m_fulltime_audio="0";
        else extrazero_m_fulltime_audio="";
        if(lf_vid_long_h<10&&lf_vid_long_h>0) extrazero_h_fulltime_audio="0";
        else extrazero_h_fulltime_audio="";
        if(lf_vid_long_h>0) lf_audio_time_fultime_placeholder_text=extrazero_h_fulltime_audio+lf_vid_long_h+":"+extrazero_m_fulltime_audio+lf_vid_long_m+":"+extrazero_s_fulltime_audio+lf_vid_long_s;
        else lf_audio_time_fultime_placeholder_text=extrazero_m_fulltime_audio+lf_vid_long_m+":"+extrazero_s_fulltime_audio+lf_vid_long_s;
        lf_audio_time_fultime_placeholder.innerText=lf_audio_time_fultime_placeholder_text;
        });
        var lf_audio_ticker_currentTime_s=0,lf_audio_ticker_currentTime_s=0,lf_audio_ticker_currentTime_min=0,lf_audio_ticker_currentTime_h=0,lf_audio_ticker_currentTime_text=0;
        var extrazero_s="",extrazero_m="",extrazero_h="";
        setInterval(()=>{lf_audio_ticker_currentTime_s=lf_audio.currentTime;
        lf_audio_ticker_currentTime_actual_s=(parseInt(lf_audio_ticker_currentTime_s)-(lf_audio_ticker_currentTime_min*60)-(lf_audio_ticker_currentTime_h*3600));
        lf_audio_ticker_currentTime_actual_s=parseInt(lf_audio_ticker_currentTime_s%60);
        lf_audio_ticker_currentTime_min=parseInt(lf_audio_ticker_currentTime_s/60);
        lf_audio_ticker_currentTime_h=parseInt(lf_audio_ticker_currentTime_s/3600);
        if(should_tick_audio){if(lf_audio_ticker_currentTime_actual_s<10) extrazero_s="0";
        else extrazero_s="";
        if(lf_audio_ticker_currentTime_min<10&&lf_audio_ticker_currentTime_min>0) extrazero_m="0";
        else extrazero_m="";
        if(lf_audio_ticker_currentTime_h<10&&lf_audio_ticker_currentTime_h>0) extrazero_h="0";
        else extrazero_h="";
        if(lf_audio_ticker_currentTime_h<=0) lf_audio_ticker_currentTime_text=extrazero_m+lf_audio_ticker_currentTime_min+":"+extrazero_s+lf_audio_ticker_currentTime_actual_s;
        else lf_audio_ticker_currentTime_text=extrazero_h+lf_audio_ticker_currentTime_h+":"+extrazero_m+lf_audio_ticker_currentTime_min+":"+extrazero_s+f_audio_ticker_currentTime_actual_s;
        lf_audio_time_current_placeholder.innerText=lf_audio_ticker_currentTime_text;
        }},100);
        const lf_landing_main_audio_next=document.getElementById("lf_landing_main_audio_next");
        lf_landing_main_audio_next.addEventListener("click",()=>{lf_audio.currentTime+=10;
        });
        var audio_reqer=new XMLHttpRequest();
        audio_reqer.open("GET",'<?php echo WP_PLUGIN_DIR; ?>/axonglitch-wp/form_ctrl/audiostatus_inpage.php?req_page='+post_id+'',true);
        audio_reqer.send();
        audio_reqer.onreadystatechange=function(){if(this.readyState==4&&this.status==200){document.getElementById("lf_audio_statics_place").innerHTML=this.response;
        }};
        } if(document.querySelector("#lf_faq")!=null){const lf_faq_head=document.querySelectorAll("#lf_faq .lf_items > div h3");
        const lf_item_faq=document.querySelectorAll("#lf_faq .lf_items > div");
        lf_item_faq[0].classList.add("axg_active");
        lf_item_faq.forEach(item=>{item.addEventListener("click",()=>{if(item.classList[1]=="axg_active"){item.classList.remove("axg_active");
        }else{for(i=0;
        i<lf_item_faq.length;
        i++){if(lf_item_faq[i].classList[1]=="axg_active"){lf_item_faq[i].classList.remove("axg_active");
        }} item.classList.add("axg_active");
        }});
        });
        } if(document.getElementById("lf_landing_gallery")!=null){const lf_picture_list=document.querySelectorAll(".lf_gallery_item");
        const lf_gallery_next=document.getElementById("lf_gallery_next");
        const lf_gallery_prev=document.getElementById("lf_gallery_prev");
        var lf_gallery_cover_h=document.querySelector("section#lf_landing_gallery .lf_left").offsetHeight;
        var lf_gallery_cover_w=document.querySelector("section#lf_landing_gallery .lf_left").offsetWidth;
        var lf_gallery_active_h=0;
        var lf_gallery_active_w=0;
        var extrah_h=0;
        var extrah_w=0;
        let lf_gallery_c_active_num;
        var current_item_handle;
        const lf_gallery_items=document.getElementsByClassName("lf_gallery_item");
        lf_picture_list.forEach(item=>{item.addEventListener("click",()=>{lf_gallery_size_ctrl(item)});
        });
        window.addEventListener('load',()=>{lf_gallery_size_ctrl(lf_picture_list[0]);
        });
        window.addEventListener('resize',()=>{lf_gallery_size_ctrl(current_item_handle);
        });
        lf_gallery_next.addEventListener("click",()=>{lf_gallery_np(1);
        });
        lf_gallery_prev.addEventListener("click",()=>{lf_gallery_np(-1);
        });
        function lf_gallery_np(lf_np){lf_gallery_c_active_num=current_item_handle.classList[1].slice(-1);
        lf_gallery_c_active_num=parseInt(lf_gallery_c_active_num);
        if(lf_np==1&&lf_gallery_items[lf_gallery_c_active_num+1]==null){lf_gallery_c_active_num=0;
        } else if(lf_np==-1&&lf_gallery_items[lf_gallery_c_active_num-1]==null){lf_gallery_c_active_num=lf_gallery_items.length;
        } lf_gallery_size_ctrl(lf_gallery_items[lf_gallery_c_active_num+lf_np]);
        };
        function lf_gallery_size_ctrl(item){if(document.querySelector("#lf_landing_gallery .lf_right img")){current_item_handle=item;
        lf_gallery_cover_h=document.querySelector("section#lf_landing_gallery .lf_left").offsetHeight;
        lf_gallery_cover_w=document.querySelector("section#lf_landing_gallery .lf_left").offsetWidth;
        lf_gallery_active_h=0;
        lf_gallery_active_w=0;
        extrah_h=0;
        extrah_w=0;
        for(i=0;
        i<lf_picture_list.length;
        i++){if(lf_picture_list[i].classList[2]=="axg_active"){item.style.padding=0+"px "+0+"px";
        lf_picture_list[i].classList.remove("axg_active");
        }} item.classList.add("axg_active");
        lf_gallery_active_h=item.clientHeight;
        lf_gallery_active_w=item.clientWidth;
        extrah_h=(lf_gallery_cover_h-lf_gallery_active_h)/2;
        extrah_w=(lf_gallery_cover_w-lf_gallery_active_w)/2;
        if(extrah_h<0)extrah_h=0;
        if(extrah_w<0)extrah_w=0;
        item.style.padding=extrah_h+"px "+extrah_w+"px";
        }}let gallery_fullscreen_state=0;
        const main_pic=document.getElementById("lf_landing_gallery");
        const main_pic_btn=document.getElementById("lf_landing_main_pic_fullscreen_go");
        main_pic_btn.addEventListener("click",()=>{if(gallery_fullscreen_state==0){if(main_pic.requestFullScreen){main_pic.requestFullScreen();
        }else if(main_pic.webkitRequestFullScreen){main_pic.webkitRequestFullScreen();
        }else if(main_pic.mozRequestFullScreen){main_pic.mozRequestFullScreen();
        } gallery_fullscreen_state=1;
        }else{if(document.exitFullscreen){document.exitFullscreen();
        }else if(document.mozCancelFullScreen){document.mozCancelFullScreen();
        }else if(document.webkitExitFullscreen){document.webkitExitFullscreen();
        }else if(document.msExitFullscreen){document.msExitFullscreen();
        } gallery_fullscreen_state=0;
        }});
        }var lf_scroll_position,lf_document_height,lf_scroll_status;
        let ld_continue_count_in_progressbar=1;
        const lf_progressbar=document.getElementById("lf_progressbar");
        // const lf_progressbar_num=document.getElementById("lf_progressbar_num");
        lf_progressbar_ctrl();
        window.addEventListener("scroll",lf_progressbar_ctrl);
        function lf_progressbar_ctrl(){lf_document_height=lf_main[0].clientHeight-document.documentElement.clientHeight;
        lf_scroll_position=document.documentElement.scrollTop;
        lf_scroll_status=100*lf_scroll_position/lf_document_height;
        lf_scroll_status=parseInt(lf_scroll_status);
        if(lf_progressbar) lf_progressbar.style.width=lf_scroll_status+"%";
        // if(lf_progressbar_num){
        //     if(lf_scroll_status>=100) lf_progressbar_num.innerText="100%";
        // else lf_progressbar_num.innerText=lf_scroll_status+"%";
        // } 
        document.querySelectorAll("section#lf_comments ol.commentlist > li").forEach(item=>{if(item.classList[1]=="byuser"){var dash_index=item.classList[2].lastIndexOf("-");
        var str_length=item.classList[2].length;
        var user_name=item.classList[2].slice(dash_index+1,str_length);
        for(i=0;
        i<userslist.length;
        i++){if(user_name==userslist[i]["data"]["display_name"]){document.querySelectorAll("section#lf_comments ol.commentlist > li."+item.classList[2]+" .comment-meta .comment-author img").forEach(item2=>{item2.src=wp_dir_url+"/assets/images/authors/"+userslist[i]["data"]["ID"]+".jpg";
        item2.srcset=wp_dir_url+"/assets/images/authors/"+userslist[i]["data"]["ID"]+".jpg";
        });
        }}}});
        }</script>
    <?php } ?>

    <?php searchScript(); ?>