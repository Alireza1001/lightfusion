// page_link
var page_href_link = window.location.href.slice(0,window.location.href.indexOf('#'));
if(page_href_link.slice(-1) == "/") page_href_link=page_href_link.slice(0, -1);
const lf_main = document.getElementsByTagName("main");












// video ctrl
if(document.getElementById("lf_landing_main_video_cover") != null) {
    const lf_videos = document.getElementById("lf_landing_main_video");
    const lf_videos_cover = document.getElementById("lf_landing_main_video_cover");
    const lf_video_loading = document.getElementById("lf_video_loading");

    // play btn
    const lf_videos_play = document.getElementById("lf_landing_main_video_play");
    const lf_videos_play2 = document.getElementById("lf_landing_main_video_play2");
    const lf_videos_bgshadow = document.getElementById("lf_btngroup_shadow");
    const lf_landing_main_video_cover = document.getElementById("lf_landing_main_video_cover");
    let should_tick = false;
    let video_play_state = 0;
    let video_play_db_state = 1;
    var show_loading_video=1;

    lf_videos.addEventListener("click", lf_video_play);
    lf_videos_play.addEventListener("click", lf_video_play);
    lf_videos_play2.addEventListener("click", lf_video_play);
    lf_videos_bgshadow.addEventListener("click", lf_video_play);

    function lf_video_play() {
        if(video_play_state == 0){
            lf_videos.play();
            if(show_loading_video==1) {
                lf_video_loading.style.zIndex = 1;
                lf_video_loading.style.opacity = 1;
                lf_video_loading.classList.add("lf_active");
            }
            lf_landing_main_video_cover.classList.add("lf_mainvideo_onplay");
            should_tick = true;
            video_play_state=1;
        }else{
            lf_videos.pause();
            lf_landing_main_video_cover.classList.remove("lf_mainvideo_onplay");
            should_tick = true;
            should_tick = false;
            video_play_state=0;
        }
    }



    lf_videos.addEventListener("canplay", ()=>{
        lf_video_loading.style.zIndex = -1;
        lf_video_loading.style.opacity = 0;
        lf_video_loading.classList.remove("lf_active");
        show_loading_video=0;
    });






    // fullscreen btn
    const lf_video_fullscreen_go = document.getElementById("lf_landing_main_video_fullscreen_go");
    const lf_video_fullscreen_exit = document.getElementById("lf_landing_main_video_fullscreen_exit");
    let lf_video_fullscreen_state = 0;
    function lf_video_fullscreen_check() {
        if(lf_video_fullscreen_state==0) {
            if(lf_videos_cover.requestFullScreen){
                lf_videos_cover.requestFullScreen();
            } else if(lf_videos_cover.webkitRequestFullScreen){
                lf_videos_cover.webkitRequestFullScreen();
            } else if(lf_videos_cover.mozRequestFullScreen){
                lf_videos_cover.mozRequestFullScreen();
            }
            lf_video_fullscreen_state=1;
            lf_video_fullscreen_go.style.display = "none";
        }
        if(lf_video_fullscreen_state==1) {
            lf_video_fullscreen_exit.style.display = "block";
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) { /* Firefox */
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE/Edge */
                document.msExitFullscreen();
            }
            lf_video_fullscreen_state=0;
        }
    }
    lf_video_fullscreen_go.addEventListener("click", lf_video_fullscreen_check);
    lf_video_fullscreen_exit.addEventListener("click", lf_video_fullscreen_check);

    // sound
    const lf_video_volume = document.getElementById("lf_landing_main_video_volume"); 
    const lf_video_volume_range = document.getElementById("lf_video_volume_range"); 
    lf_video_volume.addEventListener("click", ()=>{
        if(window.innerWidth>1200){
            if(lf_videos.muted){
                lf_videos.muted = false;
                lf_video_volume.classList.remove("lf_vide_muted");
            } else {
                lf_videos.muted = true;
                lf_video_volume.classList.add("lf_vide_muted");
            }
        }
    });
    lf_video_volume.addEventListener("dblclick", ()=>{
        if(window.innerWidth<1200){
            if(lf_videos.muted){
                lf_videos.muted = false;
                lf_video_volume.classList.remove("lf_vide_muted");
            } else {
                lf_videos.muted = true;
                lf_video_volume.classList.add("lf_vide_muted");
            }
        }
    });
    lf_video_volume_range.addEventListener("input", ()=>{
        lf_videos.volume = lf_video_volume_range.value/100;
        if(lf_videos.muted){
            lf_videos.muted = false;
            lf_video_volume.classList.remove("lf_vide_muted");
        }
    });


    // seeker

    const lf_video_time_seeker = document.getElementById("lf_video_time_seeker");
    const lf_video_time_fultime_placeholder = document.getElementById("lf_landing_main_video_timer_whole");
    const lf_video_time_current_placeholder = document.getElementById("lf_landing_main_video_timer_current");
    var extrazero_s_fulltime="",extrazero_m_fulltime="", extrazero_h_fulltime="";


    lf_videos.addEventListener("loadedmetadata", ()=>{
        var lf_video_long = lf_videos.duration;
        var lf_vid_long_h = parseInt(lf_video_long / 3600);
        var lf_vid_long_m = parseInt(lf_video_long / 60)-(lf_vid_long_h*60);
        var lf_vid_long_s = parseInt(lf_video_long)-(lf_vid_long_m*60)-(lf_vid_long_h *3600);
    
        if(lf_vid_long_s<10 && lf_vid_long_s>0)
            extrazero_s_fulltime="0";
        else
            extrazero_s_fulltime="";

        if(lf_vid_long_m<10 && lf_vid_long_m>0)
            extrazero_m_fulltime="0";
        else
            extrazero_m_fulltime="";

        if(lf_vid_long_h<10 && lf_vid_long_h>0)
            extrazero_h_fulltime="0";
        else
            extrazero_h_fulltime="";

        // console.log(lf_vid_long_h, lf_vid_long_m, lf_vid_long_s);
        if(lf_vid_long_h>0)
            lf_video_time_fultime_placeholder_text = extrazero_h_fulltime+lf_vid_long_h+":"+extrazero_m_fulltime+lf_vid_long_m+":"+extrazero_s_fulltime+lf_vid_long_s;
        else
            lf_video_time_fultime_placeholder_text = extrazero_m_fulltime+lf_vid_long_m+":"+extrazero_s_fulltime+lf_vid_long_s;
        
        lf_video_time_fultime_placeholder.innerText = lf_video_time_fultime_placeholder_text;
    });



    // lf_video_ticker
    var lf_video_ticker_currentTime_s=0, lf_video_ticker_currentTime_s=0, lf_video_ticker_currentTime_min=0, lf_video_ticker_currentTime_h=0, lf_video_ticker_currentTime_text=0;
    var extrazero_s="",extrazero_m="", extrazero_h="";
    setInterval( ()=> {
        lf_video_ticker_currentTime_s = lf_videos.currentTime;
        lf_video_ticker_currentTime_actual_s = parseInt(lf_video_ticker_currentTime_s%60);
        lf_video_ticker_currentTime_min = parseInt(lf_video_ticker_currentTime_s/60);
        lf_video_ticker_currentTime_h = parseInt(lf_video_ticker_currentTime_s/3600);
        if(should_tick) {
            // if(lf_video_ticker_currentTime_actual_s >= 60) {
            //     lf_video_ticker_currentTime_s=0;
            //     lf_video_ticker_currentTime_min++;
            //     if(lf_video_ticker_currentTime_min >= 60){
            //         lf_video_ticker_currentTime_s=0;
            //         lf_video_ticker_currentTime_min=0;
            //         lf_video_ticker_currentTime_h++;
            //     }
            // }
            
            if(lf_video_ticker_currentTime_actual_s<10)
                extrazero_s="0";
            else
                extrazero_s="";

            if(lf_video_ticker_currentTime_min<10 && lf_video_ticker_currentTime_min>0)
                extrazero_m="0";
            else
                extrazero_m="";

            if(lf_video_ticker_currentTime_h<10 && lf_video_ticker_currentTime_h>0)
                extrazero_h="0";
            else
                extrazero_h="";
                
            
            if(lf_video_ticker_currentTime_h <= 0)
                lf_video_ticker_currentTime_text = extrazero_m+lf_video_ticker_currentTime_min+":"+extrazero_s+lf_video_ticker_currentTime_actual_s;
            else
                lf_video_ticker_currentTime_text = extrazero_h+lf_video_ticker_currentTime_h+":"+extrazero_m+lf_video_ticker_currentTime_min+":"+extrazero_s+f_video_ticker_currentTime_actual_s;
            
            lf_video_time_current_placeholder.innerText = lf_video_ticker_currentTime_text;
            lf_video_time_seeker.value = 100*lf_videos.currentTime/lf_videos.duration;
            // console.log(lf_video_ticker_currentTime_h,lf_video_ticker_currentTime_min,lf_video_ticker_currentTime_actual_s);
        }
    }, 100);

    lf_video_time_seeker.addEventListener("input", ()=>{
        lf_videos.currentTime = lf_videos.duration*lf_video_time_seeker.value/100;
    });

    // next 10s
    const lf_landing_main_video_next = document.getElementById("lf_landing_main_video_next");
    lf_landing_main_video_next.addEventListener("click", ()=>{
        lf_videos.currentTime+=10;
        // lf_video_time_seeker.value+=10*lf_videos.duration/100;
    });

    // subtitle
    const lf_landing_main_video_subtitle = document.getElementById("lf_landing_main_video_subtitle");
    lf_landing_main_video_subtitle_state = 1;
    lf_landing_main_video_subtitle.addEventListener("click", ()=>{
        if(lf_landing_main_video_subtitle_state==1){
            lf_videos.textTracks[0].mode = 'hidden';
            lf_landing_main_video_subtitle.classList.add("lf_video_subtitle_off");
            lf_landing_main_video_subtitle_state=0;
        }
        else{
            lf_videos.textTracks[0].mode = 'showing';
            lf_landing_main_video_subtitle.classList.remove("lf_video_subtitle_off");
            lf_landing_main_video_subtitle_state=1;
        }
    });



    // video navigation
    // navigator.mediaSession.metadata = new MediaMetadata({
    //     title: "test",
    //     artist: "Alireza Ataei",
    //     album: "go Fuck your self",
    //     artwork: [
    //         {src: wp_dir_url+"/assets/images/blogimg.jpg", sizes: "192x192", type: "image/jpg"}
    //     ]
        
    // });




    // lf_video_like

    // video status receive
    var xhttp_video = new XMLHttpRequest();
    xhttp_video.open("GET", wp_dir_url+'/form_ctrl/videostatus_inpage.php?req_page='+post_id+'', true);
    xhttp_video.send();
    xhttp_video.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lf_video_statics_place").innerHTML = this.response;
        }
    };


    var lf_videolike_trigger = document.getElementById("lf_video_lieking_trigger");
    var lf_videolike_trigger_path = document.querySelectorAll("#lf_video_lieking_trigger path");
    lf_videolike_trigger.addEventListener("click", ()=>{
        // setTimeout(()=>{
            if(lf_videolike_trigger.classList[1] == "lf_media_videoLike") {
                lf_videolike_trigger_path[1].style.opacity=.3;
                lf_videolike_trigger_path[1].style.fill="#fff";
                lf_videolike_trigger.classList.remove("lf_media_videoLike");
                lf_videolike_trigger.classList.add("lf_media_videodisLike");
            } else {
                lf_videolike_trigger_path[1].style.opacity=1;
                lf_videolike_trigger_path[1].style.fill="#e24854";
                lf_videolike_trigger.classList.add("lf_media_videoLike");
                lf_videolike_trigger.classList.remove("lf_media_videodisLike");
            }
        // }, 700);
    });
}




if(document.getElementById("lf_landing_main_audio_cover") != null) {
    var lf_audiolike_trigger = document.getElementById("lf_audio_lieking_trigger");
    var lf_audiolike_trigger_path = document.querySelectorAll("#lf_audio_lieking_trigger path");
    lf_audiolike_trigger.addEventListener("click", ()=>{
        // setTimeout(()=>{
            if(lf_audiolike_trigger.classList[1] == "lf_media_audioLike") {
                lf_audiolike_trigger_path[1].style.opacity=.3;
                lf_audiolike_trigger_path[1].style.fill="#fff";
                lf_audiolike_trigger.classList.remove("lf_media_audioLike");
                lf_audiolike_trigger.classList.add("lf_media_audiodisLike");
            } else {
                lf_audiolike_trigger_path[1].style.opacity=1;
                lf_audiolike_trigger_path[1].style.fill="#e24854";
                lf_audiolike_trigger.classList.add("lf_media_audioLike");
                lf_audiolike_trigger.classList.remove("lf_media_audiodisLike");
            }
        // }, 700);
    });


    // audio
    const lf_audio = document.getElementById("lf_landing_main_audio");







    // audio ctrl

    const audio_range = document.getElementById("audio_wave_range");
    const lf_audio_freq_fill = document.getElementById("lf_audio_freq_fill");
    const lf_audio_loading = document.getElementById("lf_audio_loading");






    // range
    lf_audio_freq_fill.style.width=0;
    let lf_audio_play_per = 0;

    setInterval(()=>{
        if(lf_audio_play_per==1) {
            audio_range.value = 100*(lf_audio.currentTime)/lf_audio.duration;
            lf_audio_freq_fill.style.width = audio_range.value+"%";
        }
    }, 10);
    audio_range.addEventListener("input", ()=>{
        lf_audio.currentTime = audio_range.value*lf_audio.duration/100;
        lf_audio_freq_fill.style.width = audio_range.value+"%";
    });


    // play btn
    const lf_audio_play = document.getElementById("lf_landing_main_audio_play");
    const lf_landing_main_audio_cover = document.getElementById("lf_landing_main_audio_cover");
    let should_tick_audio = false;
    let audio_play_state = 0;
    lf_audio.addEventListener("click", lf_audio_play_f);
    lf_audio_play.addEventListener("click", lf_audio_play_f);
    var show_loading_audio = 1;
    function lf_audio_play_f() {
        if(audio_play_state == 0){
            if(show_loading_audio == 1) {
                lf_audio_loading.style.zIndex = 4;
                lf_audio_loading.style.opacity = 1;
                lf_audio_loading.classList.add("lf_active");
            }
            lf_audio.play();
            lf_landing_main_audio_cover.classList.add("lf_mainaudio_onplay");
            should_tick_audio = true;
            audio_play_state=1;
        }else{
            lf_audio.pause();
            lf_landing_main_audio_cover.classList.remove("lf_mainaudio_onplay");
            should_tick_audio = true;
            should_tick_audio = false;
            audio_play_state=0;
        }
    }
    lf_audio.addEventListener("canplay", ()=>{
        lf_audio_play_per=1;
        lf_audio_loading.style.zIndex = -1;
        lf_audio_loading.style.opacity = 0;
        lf_audio_loading.classList.remove("lf_active");
        show_loading_audio=0;
    });
    // sound
    const lf_audio_volume = document.getElementById("lf_landing_main_audio_volume"); 
    const lf_audio_volume_range = document.getElementById("lf_audio_volume_range"); 
    lf_audio_volume.addEventListener("click", ()=>{
        if(window.innerWidth>1200){
            if(lf_audio.muted){
                lf_audio.muted = false;
                lf_audio_volume.classList.remove("lf_vide_muted");
            } else {
                lf_audio.muted = true;
                lf_audio_volume.classList.add("lf_vide_muted");
            }
        }
    });
    lf_audio_volume.addEventListener("dbclick", ()=>{
        if(window.innerWidth<1200){
            if(lf_audio.muted){
                lf_audio.muted = false;
                lf_audio_volume.classList.remove("lf_vide_muted");
            } else {
                lf_audio.muted = true;
                lf_audio_volume.classList.add("lf_vide_muted");
            }
        }
    });
    lf_audio_volume_range.addEventListener("input", ()=>{
        lf_audio.volume = lf_audio_volume_range.value/100;
        if(lf_audio.muted){
            lf_audio.muted = false;
            lf_audio_volume.classList.remove("lf_vide_muted");
        }
    });


    // seeker

    const lf_audio_time_fultime_placeholder = document.getElementById("lf_landing_main_audio_timer_whole");
    const lf_audio_time_current_placeholder = document.getElementById("lf_landing_main_audio_timer_current");
    var extrazero_s_fulltime_audio="",extrazero_m_fulltime_audio="", extrazero_h_fulltime_audio="";


    lf_audio.addEventListener("loadedmetadata", ()=>{
        var lf_audio_long = lf_audio.duration;
        var lf_vid_long_h = parseInt(lf_audio_long / 3600);
        var lf_vid_long_m = parseInt(lf_audio_long / 60)-(lf_vid_long_h*60);
        var lf_vid_long_s = parseInt(lf_audio_long)-(lf_vid_long_m*60)-(lf_vid_long_h *3600);
    
        if(lf_vid_long_s<10 && lf_vid_long_s>0)
            extrazero_s_fulltime_audio="0";
        else
            extrazero_s_fulltime_audio="";

        if(lf_vid_long_m<10 && lf_vid_long_m>0)
            extrazero_m_fulltime_audio="0";
        else
            extrazero_m_fulltime_audio="";

        if(lf_vid_long_h<10 && lf_vid_long_h>0)
            extrazero_h_fulltime_audio="0";
        else
            extrazero_h_fulltime_audio="";

        // console.log(lf_vid_long_h, lf_vid_long_m, lf_vid_long_s);
        if(lf_vid_long_h>0)
            lf_audio_time_fultime_placeholder_text = extrazero_h_fulltime_audio+lf_vid_long_h+":"+extrazero_m_fulltime_audio+lf_vid_long_m+":"+extrazero_s_fulltime_audio+lf_vid_long_s;
        else
            lf_audio_time_fultime_placeholder_text = extrazero_m_fulltime_audio+lf_vid_long_m+":"+extrazero_s_fulltime_audio+lf_vid_long_s;
        
        lf_audio_time_fultime_placeholder.innerText = lf_audio_time_fultime_placeholder_text;
    });



    // lf_audio_ticker
    var lf_audio_ticker_currentTime_s=0, lf_audio_ticker_currentTime_s=0, lf_audio_ticker_currentTime_min=0, lf_audio_ticker_currentTime_h=0, lf_audio_ticker_currentTime_text=0;
    var extrazero_s="",extrazero_m="", extrazero_h="";
    setInterval( ()=> {
        lf_audio_ticker_currentTime_s = lf_audio.currentTime;
        lf_audio_ticker_currentTime_actual_s = (parseInt(lf_audio_ticker_currentTime_s)-(lf_audio_ticker_currentTime_min*60)-(lf_audio_ticker_currentTime_h*3600));
        lf_audio_ticker_currentTime_actual_s = parseInt(lf_audio_ticker_currentTime_s%60);
        lf_audio_ticker_currentTime_min = parseInt(lf_audio_ticker_currentTime_s/60);
        lf_audio_ticker_currentTime_h = parseInt(lf_audio_ticker_currentTime_s/3600);
        
        if(should_tick_audio) {
        //     if(lf_audio_ticker_currentTime_actual_s >= 60) {
        //         lf_audio_ticker_currentTime_s=0;
        //         lf_audio_ticker_currentTime_min++;
        //         if(lf_audio_ticker_currentTime_min >= 60){
        //             lf_audio_ticker_currentTime_s=0;
        //             lf_audio_ticker_currentTime_min=0;
        //             lf_audio_ticker_currentTime_h++;
        //         }
        //     }
            
            if(lf_audio_ticker_currentTime_actual_s<10)
                extrazero_s="0";
            else
                extrazero_s="";

            if(lf_audio_ticker_currentTime_min<10 && lf_audio_ticker_currentTime_min>0)
                extrazero_m="0";
            else
                extrazero_m="";

            if(lf_audio_ticker_currentTime_h<10 && lf_audio_ticker_currentTime_h>0)
                extrazero_h="0";
            else
                extrazero_h="";
                
            
            if(lf_audio_ticker_currentTime_h <= 0)
                lf_audio_ticker_currentTime_text = extrazero_m+lf_audio_ticker_currentTime_min+":"+extrazero_s+lf_audio_ticker_currentTime_actual_s;
            else
                lf_audio_ticker_currentTime_text = extrazero_h+lf_audio_ticker_currentTime_h+":"+extrazero_m+lf_audio_ticker_currentTime_min+":"+extrazero_s+f_audio_ticker_currentTime_actual_s;
            
            lf_audio_time_current_placeholder.innerText = lf_audio_ticker_currentTime_text;
        }
    }, 100);



    // next 10s
    const lf_landing_main_audio_next = document.getElementById("lf_landing_main_audio_next");
    lf_landing_main_audio_next.addEventListener("click", ()=>{
        lf_audio.currentTime+=10;
    });



    // audio navigation
    // navigator.mediaSession.metadata = new MediaMetadata({
    //     title: "test",
    //     artist: "Alireza Ataei",
    //     album: "go Fuck your self",
    //     artwork: [
    //         {src: wp_dir_url+"/assets/images/blogimg.jpg", sizes: "192x192", type: "image/jpg"}
    //     ]
    // });


    // audio status receive
    var xhttp_audio = new XMLHttpRequest();
    xhttp_audio.open("GET", wp_dir_url+'/form_ctrl/audiostatus_inpage.php?req_page='+post_id+'', true);
    xhttp_audio.send();
    xhttp_audio.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lf_audio_statics_place").innerHTML = this.response;
        }
    };
}





// faq
if(document.querySelector("div#lf_faq") != null) {
    const lf_faq_head = document.querySelectorAll("div#lf_faq .lf_items > div h3");
    const lf_item_faq = document.querySelectorAll("div#lf_faq .lf_items > div");
    lf_item_faq[0].classList.add("lf_active");


    lf_item_faq.forEach(item=>{
        item.addEventListener("click", ()=>{
            if(item.classList[1] == "lf_active") {
                item.classList.remove("lf_active");
            }else{
                for(i=0; i<lf_item_faq.length; i++) {
                    if(lf_item_faq[i].classList[1] == "lf_active") {
                        lf_item_faq[i].classList.remove("lf_active");
                    }
                }
                item.classList.add("lf_active");
            }
        });
    });



    // function lf_faq_ctrl(lf_i) {
    //     if(lf_item_faq[lf_i].classList[1] == "lf_active") {
    //         lf_item_faq[lf_i].classList.remove("lf_active");
    //     }else{
    //         for(i=0; i<lf_faq_head_count; i++) {
    //             if(lf_item_faq[i].classList[1] == "lf_active") {
    //                 lf_item_faq[i].classList.remove("lf_active");
    //             }
    //         }
    //         lf_item_faq[lf_i].classList.add("lf_active");
    //     }
    // }
}








// gallery


if(document.getElementById("lf_landing_gallery") != null) {
    const lf_picture_list = document.querySelectorAll(".lf_gallery_item");
    const lf_gallery_next = document.getElementById("lf_gallery_next");
    const lf_gallery_prev = document.getElementById("lf_gallery_prev");
    var lf_gallery_cover_h = document.querySelector("section#lf_landing_gallery .lf_left").offsetHeight;
    var lf_gallery_cover_w = document.querySelector("section#lf_landing_gallery .lf_left").offsetWidth;
    var lf_gallery_active_h=0;
    var lf_gallery_active_w=0;
    var extrah_h = 0;
    var extrah_w = 0;
    let lf_gallery_c_active_num;
    var current_item_handle;
    const lf_gallery_items = document.getElementsByClassName("lf_gallery_item");

    lf_picture_list.forEach(item=>{item.addEventListener("click", ()=>{lf_gallery_size_ctrl(item)});});

    window.addEventListener('load', ()=>{
        lf_gallery_size_ctrl(lf_picture_list[0]);
    });

    window.addEventListener('resize', ()=>{
        lf_gallery_size_ctrl(current_item_handle);
    });

    lf_gallery_next.addEventListener("click", ()=>{lf_gallery_np(1);});
    lf_gallery_prev.addEventListener("click", ()=>{lf_gallery_np(-1);});

    function lf_gallery_np(lf_np) {
        lf_gallery_c_active_num = current_item_handle.classList[1].slice(-1);
        lf_gallery_c_active_num = parseInt(lf_gallery_c_active_num);
        if(lf_np==1 && lf_gallery_items[lf_gallery_c_active_num+1] == null){
            lf_gallery_c_active_num=0;
        }
        else if(lf_np==-1 && lf_gallery_items[lf_gallery_c_active_num-1] == null){
            lf_gallery_c_active_num=lf_gallery_items.length;
        }
        lf_gallery_size_ctrl(lf_gallery_items[lf_gallery_c_active_num+lf_np]);
    };

    function lf_gallery_size_ctrl(item) {
        current_item_handle = item;
        lf_gallery_cover_h = document.querySelector("section#lf_landing_gallery .lf_left").offsetHeight;
        lf_gallery_cover_w = document.querySelector("section#lf_landing_gallery .lf_left").offsetWidth;
        lf_gallery_active_h=0;
        lf_gallery_active_w=0;
        extrah_h = 0;
        extrah_w = 0;
        for(i=0; i<lf_picture_list.length; i++) {
            if(lf_picture_list[i].classList[2] == "lf_active") {
                item.style.padding = 0+"px "+0+"px";
                lf_picture_list[i].classList.remove("lf_active");
            }
        }
        item.classList.add("lf_active");
        lf_gallery_active_h =  item.clientHeight;
        lf_gallery_active_w =  item.clientWidth;
        extrah_h = (lf_gallery_cover_h-lf_gallery_active_h)/2;
        extrah_w = (lf_gallery_cover_w-lf_gallery_active_w)/2;
        if(extrah_h<0)extrah_h=0;
        if(extrah_w<0)extrah_w=0;
        item.style.padding = extrah_h+"px "+extrah_w+"px";
    }



    let gallery_fullscreen_state = 0;
    const main_pic = document.getElementById("lf_landing_gallery");
    const main_pic_btn = document.getElementById("lf_landing_main_pic_fullscreen_go");
    main_pic_btn.addEventListener("click", ()=>{

        if(gallery_fullscreen_state==0) {
            if(main_pic.requestFullScreen){
                main_pic.requestFullScreen();
            } else if(main_pic.webkitRequestFullScreen){
                main_pic.webkitRequestFullScreen();
            } else if(main_pic.mozRequestFullScreen){
                main_pic.mozRequestFullScreen();
            }
            gallery_fullscreen_state=1;
        }else{
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) { 
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) { 
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
            gallery_fullscreen_state=0;
        }
    });
}








// top progressbar
var lf_scroll_position, lf_document_height, lf_scroll_status;
let ld_continue_count_in_progressbar=1;
const lf_progressbar = document.getElementById("lf_progressbar");
const lf_progressbar_num = document.getElementById("lf_progressbar_num");
lf_progressbar_ctrl();
window.addEventListener("scroll", lf_progressbar_ctrl);
function lf_progressbar_ctrl() {
    lf_document_height = lf_main[0].clientHeight-document.documentElement.clientHeight;
    lf_scroll_position = document.documentElement.scrollTop;
    lf_scroll_status = 100*lf_scroll_position/lf_document_height;
    lf_scroll_status = parseInt(lf_scroll_status);
    if(lf_progressbar)
        lf_progressbar.style.width = lf_scroll_status+"%";
    if(lf_scroll_status>=100) {
        if(lf_progressbar_num)
            lf_progressbar_num.innerText = "100%";
    }else{
        if(lf_progressbar_num)
            lf_progressbar_num.innerText = lf_scroll_status+"%";
    }

}





// users img in comments
document.querySelectorAll("section#lf_comments ol.commentlist > li").forEach(item=>{
    if(item.classList[1] == "byuser") {
        var dash_index = item.classList[2].lastIndexOf("-");
        var str_length = item.classList[2].length;
        var user_name = item.classList[2].slice(dash_index+1, str_length);
        for(i=0; i<userslist.length; i++) {
            if(user_name == userslist[i]["data"]["display_name"]) {
                document.querySelectorAll("section#lf_comments ol.commentlist > li."+item.classList[2]+" .comment-meta .comment-author img").forEach(item2=>{
                    item2.src = wp_dir_url+"/assets/images/authors/"+userslist[i]["data"]["ID"]+".jpg";
                    item2.srcset = wp_dir_url+"/assets/images/authors/"+userslist[i]["data"]["ID"]+".jpg";
                });
            }
        }
        // var user_id = "<?php echo get_users( array( 'search' => '"+user_name+"' )); ?>";
        // console.log(user_id);
    }
});




ax_main[0].addEventListener("click", e=>{
    // e.preventDefault();
    document.getElementById("ax_header_search_form").classList.remove("lf_active");
    document.getElementById("lf_searchform_res_cover").style.display = "none";
    document.getElementById("lf_progressbar_num").style.opacity = 1;
});




