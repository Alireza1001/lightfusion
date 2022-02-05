// page_link
var page_href_link = window.location.href.slice(0,window.location.href.indexOf('#'));
if(page_href_link.slice(-1) == "/") page_href_link=page_href_link.slice(0, -1);



// course services data handle
if(document.getElementById("lf_landing_services")) {
    const lf_landing_services = document.getElementById("lf_landing_services");
    lf_landing_services.innerHTML = "";
    const arrow_svg = '<svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"/></svg>';
    for(i=0; i<categoryOrganizer.length; i++)
        lf_landing_services.innerHTML+='<li data-no="'+(i+1)+'" id="lf_sidecountry_'+categoryOrganizer[i].title.toLowerCase().replaceAll(' ', '_')+'_triger" class="lf_country_menu_trigger"><div> <img src="'+categoryOrganizer[i].icon+'" /> <span>'+categoryOrganizer[i].title+'</span>'+arrow_svg+'</div></li>';
}


var lf_available_course="", lf_available_course_link="";
const lf_countrys_list_data_services = document.getElementById("lf_countrys_list_data_services");
var lf_countrys_list_data_services_store;
for(i=0; i<categoryOrganizer.length; i++) {
    lf_countrys_list_data_services_store = '<ul id="lf_sidecountry_'+categoryOrganizer[i].title.toLowerCase().replaceAll(' ', '_')+'_menu" class="lf_country_submenu"> <ul class="lf_country_submenu_sub">';
    if(categoryOrganizer[i].content.length > 0)
        for(j=0; j<categoryOrganizer[i].content.length; j++) {
            lf_available_course = "";
            lf_available_course_link = 'href="'+categoryOrganizer[i].content[j].link+'"';
            if(!categoryOrganizer[i].content[j].valid){
                lf_available_course_link = 'href="/"';
                lf_available_course = "lf_course_block";
            }
            lf_countrys_list_data_services_store += '<li class="'+lf_available_course+'"><a aria-label="'+categoryOrganizer[i].content[j].title.toLowerCase().replaceAll(' ', '_')+'" '+lf_available_course_link+'>'+categoryOrganizer[i].content[j].icon+'<h2 class="ax_title">'+categoryOrganizer[i].content[j].title+'</h2></a></li>';
        }
    else 
        lf_countrys_list_data_services_store += '<li class="lf_coming_soon"><a><h2 class="ax_title">coming soon</h2></a></li>';
    lf_countrys_list_data_services_store += '</ul></ul>';
    lf_countrys_list_data_services.innerHTML += lf_countrys_list_data_services_store;
}
document.querySelectorAll(".lf_course_block").forEach(item=>{
    item.addEventListener("click", (e)=>{e.preventDefault();});
});

// side services state
const lf_landing_country_triger = document.getElementsByClassName("lf_country_menu_trigger");
const lf_landing_country_submenu = document.getElementsByClassName("lf_country_submenu");

function lf_country_ctrl(lf_n) {
    if(lf_n != -1) {
        if(lf_n == 0) {
            lf_open_main_sidebar();
        }else {
            lf_n--;
            for(i=0; i<categoryOrganizer.length; i++) 
                if(i != lf_n)
                    if(lf_landing_country_triger[i].classList[1] == "axg_active") {
                        lf_landing_country_triger[i].classList.remove("axg_active");
                        lf_landing_country_submenu[i].classList.remove("axg_active");
                        document.getElementById("lf_landing_left").style.maxWidth = "90vw";
                        lf_open_main_sidebar();
                    }
            if (lf_landing_country_triger[lf_n].classList[1] != "axg_active") {
                lf_landing_country_triger[lf_n].classList.add("axg_active");
                lf_landing_country_submenu[lf_n].classList.add("axg_active");
                document.getElementById("lf_landing_left").style.maxWidth = "90vw";
                lf_open_main_sidebar();
            }else{
                lf_landing_country_submenu[lf_n].classList.remove("axg_active");
                lf_landing_country_triger[lf_n].classList.remove("axg_active");
                document.getElementById("lf_landing_left").style.maxWidth = "90vw";
            }
        }
    } else {
        for(i=0; i<categoryOrganizer.length; i++) 
            if(lf_landing_country_triger[i].classList[1] == "axg_active") {
                lf_landing_country_triger[i].classList.remove("axg_active");
                lf_landing_country_submenu[i].classList.remove("axg_active");
            }
        document.getElementById("lf_landing_left").style.maxWidth = "40px";
        lf_close_main_sidebar();
    }
}


function lf_open_main_sidebar() {
    if(window.outerWidth <= 1024) {
        // document.getElementsByTagName("main")[0].style.transform = "translate(90%, 9px)";
        // document.getElementsByTagName("main")[0].style.borderRadius = "6px";
        // document.getElementsByTagName("main")[0].style.boxShadow = "rgba(0, 0, 0, 0.67) -5px 7px 20px -6px";
        document.getElementsByTagName("main")[0].style.opacity = "0";
        document.getElementsByTagName("main")[0].style.zIndex = "-1";
        // document.getElementById("lf_landing_right").style.display = "none";
        document.getElementById("lf_landing_left").style.width = "90vw";
    }
    // document.getElementById("AX_HP").style.overflowX = "hidden";
    // document.getElementById("AX_HP").style.overflowY = "hidden";
}
function lf_close_main_sidebar() {
    // if(window.outerWidth <= 1024) {
        // document.getElementsByTagName("main")[0].style.transform = "translate(0, 9px)";
        // document.getElementsByTagName("main")[0].style.boxShadow = ""
        // document.getElementsByTagName("main")[0].style.borderRadius = "0";
        document.getElementById("lf_landing_left").style.width = "";
        document.getElementsByTagName("main")[0].style.opacity = "";
        document.getElementsByTagName("main")[0].style.zIndex = "";
        // document.getElementById("lf_landing_right").style.display = "block";
        lf_landing_left.style.maxWidth = "40px";
    // }
    // document.getElementById("AX_HP").style.overflowX = "unset";
    // document.getElementById("AX_HP").style.overflowY = "unset";
}

window.addEventListener("resize", ()=>{
    lf_close_main_sidebar();
});

if(document.querySelector(".lf_country_menu_trigger")) {
    document.querySelectorAll(".lf_country_menu_trigger").forEach(item=>{
        item.addEventListener("click", ()=>{lf_country_ctrl(item.getAttribute("data-no"))});
    });
}
document.getElementsByTagName("main")[0].addEventListener("click", ()=>{lf_country_ctrl(-1)});

// leftsidebar btn on mobile

const lf_leftmenu_btn = document.getElementById("lf_leftmenu_btn");
const lf_landing_left = document.getElementById("lf_landing_left");
let lf_landing_left_status = 0;
lf_leftmenu_btn.addEventListener("click", ()=>{
    if(document.getElementById("lf_landing_left").offsetWidth == 40) {
        lf_landing_left.style.maxWidth = "90vw";
        lf_landing_left_status=1;
        lf_country_ctrl(0);
        lf_open_main_sidebar();
    }else{
        lf_landing_left.style.maxWidth = "40px";
        lf_landing_left_status=0;
        lf_country_ctrl(-1);
        lf_close_main_sidebar();
    }
});

document.querySelectorAll("ul.lf_country_submenu").forEach(item=>{
    item.addEventListener("click", ()=>{
        lf_country_ctrl(-1);
    });
});
document.querySelectorAll("ul.lf_country_submenu li").forEach(item=>{
    item.addEventListener("click", ()=>{
        document.querySelector("ul.lf_country_submenu.axg_active").classList.add("axg_active");
    });
});


// print
document.getElementById("lf_landing_print").addEventListener("click", ()=>{
    window.print();
});
window.addEventListener("beforeprint", ()=>{
    document.getElementById("whole_page_wrapup").classList.add("lf_print_mode");
    document.getElementById("ax_footer").classList.add("lf_print_mode");
    document.getElementById("axon_header").classList.add("lf_print_mode");
    document.getElementById("lf_progressbar_cover").classList.add("lf_print_mode");
    // document.getElementById("lf_progressbar_num").classList.add("lf_print_mode");
    // document.getElementById("lf_landing_right").classList.add("lf_print_mode");
    
});
window.addEventListener("afterprint", ()=>{
    document.getElementById("whole_page_wrapup").classList.remove("lf_print_mode");
    document.getElementById("ax_footer").classList.remove("lf_print_mode");
    document.getElementById("axon_header").classList.remove("lf_print_mode");
    document.getElementById("lf_progressbar_cover").classList.remove("lf_print_mode");
    // document.getElementById("lf_progressbar_num").classList.remove("lf_print_mode");
    // document.getElementById("lf_landing_right").classList.remove("lf_print_mode");
});



// share count

// send
let audio_play_db_state=1;
const share_icons = document.querySelectorAll(".lf_share_event");
share_icons.forEach(item=>{
    item.addEventListener("click", ()=>{
        
        // setTimeout(()=>{
            if(item.classList[0]!=null && item.classList[1]!=null) {
                var lf_sharemedia_var = item.classList[1];
                var lf_media = lf_sharemedia_var.slice(lf_sharemedia_var.lastIndexOf("_")+1, lf_sharemedia_var.length);
                var share_reqer = new XMLHttpRequest();
                share_reqer.open("GET", wp_dir_url+'/form_ctrl/share_form.php?req_page='+post_id+'&media='+lf_media+'', true);
                share_reqer.send(); 
                // *****video script here
                if(document.getElementById("lf_landing_main_audio_cover") != null) {
                    if(audio_play_db_state==1) {
                        document.querySelectorAll(".lf_share_event.lf_media_audioPlay").forEach(item=>{item.classList.remove("lf_share_event"); item.classList.remove("lf_media_audioPlay");});
                        audio_play_db_state=0;
                    }
                }
            }
        // },200);

    });
});

// recieve
var comment_reqer = new XMLHttpRequest();
const comment_list = document.getElementById("lf_share_count");
comment_reqer.open("GET", wp_dir_url+'/form_ctrl/share_inpage.php?req_page='+post_id+'&comment_count='+wp_comment_count+'', true);
comment_reqer.send();
comment_reqer.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.querySelectorAll(".lf_share_status").forEach(item=>{
            item.innerHTML = this.response;
        });
    }
};


// copy
var lf_copyUrl = document.querySelector(".lf_input_clip");
document.querySelectorAll(".lf_share_event.lf_media_url").forEach(item=>{
    item.addEventListener("click", ()=>{
        if(item.classList[2] == "lf_d")
            var lf_round = 1;
        else
            var lf_round = 0;
        lf_copyUrl.select();
        lf_copyUrl.setSelectionRange(0,99999);
        document.execCommand("copy");
        var lf_copyurl_tooltip_main = document.getElementById("lf_copyurl_tooltip_main");
        lf_copyurl_tooltip_main.style.zIndex = 3;
        lf_copyurl_tooltip_main.style.opacity = 1;
        setTimeout(()=>{
            lf_copyurl_tooltip_main.style.opacity = 0;
            lf_copyurl_tooltip_main.style.zIndex = -9;
        }, 1000);
        var lf_copyurl_tooltip_m = document.getElementById("lf_copyurl_tooltip_main");
        lf_copyurl_tooltip_m.style.zIndex = 3;
        lf_copyurl_tooltip_m.style.opacity = 1;
        setTimeout(()=>{
            lf_copyurl_tooltip_m.style.opacity = 0;
            lf_copyurl_tooltip_m.style.zIndex = -9;
        }, 1000);
    });
})



// custome new window
const lf_share_event = document.querySelectorAll("li.lf_share_event a");
lf_share_event.forEach(item=>{
    item.addEventListener("click", e=>{
        if(item.getAttribute("aria-label") != "print") {
            window.open(item.href,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400");
        }
        e.preventDefault();
    });
});



// star rating ctrl
var lf_rate_storage = 0;
var lf_rate_change = 0;

// hovering
const lf_landing_stars = document.getElementsByClassName("lf_star_system");
const lf_rate_done = document.getElementsByClassName("lf_rate_done");

// rateing ctrl
var feedback_reqer = new XMLHttpRequest();
var lf_user_rate_dialog = "";
function lf_landing_starrating_ctrl(lf_n) {
    switch(lf_n) {
        case 0:
            lf_user_rate_dialog = "Thanks for your rate. \"poor content\"";
            break;
        case 1:
            lf_user_rate_dialog = "Thanks for your rate. \"not useful\"";
            break;
        case 2:
            lf_user_rate_dialog = "Thanks for your rate. \"useful\"";
            break;
        case 3:
            lf_user_rate_dialog = "Thanks for your rate. \"very useful\"";
            break;
        case 4:
            lf_user_rate_dialog = "Thanks for your rate. \"excellent\"";
            break;
    }
    inpage_notification(5000, lf_user_rate_dialog );
    lf_landing_stars[4-lf_n].classList.add("axg_active");
    lf_landing_stars[9-lf_n].classList.add("axg_active");
    rate_submite(lf_n);
}

function lf_rate_store_avg(lf_n) {
    if(lf_rate_storage == 0) lf_rate_storage = lf_n;
    else lf_rate_storage = (lf_rate_storage+lf_n)/2;
    lf_rate_change=1;
}

var lf_final_user_rate = 0;
function rate_submite(lf_n) {
    lf_n++;
    feedback_reqer.open("POST", wp_dir_url+'/form_ctrl/starrating_form.php?rate='+lf_n+'&page_id='+post_id+'', true);
    feedback_reqer.send();
}

lf_landing_stars[4].addEventListener("click", ()=>{lf_landing_starrating_ctrl(0);});
lf_landing_stars[3].addEventListener("click", ()=>{lf_landing_starrating_ctrl(1);});
lf_landing_stars[2].addEventListener("click", ()=>{lf_landing_starrating_ctrl(2);});
lf_landing_stars[1].addEventListener("click", ()=>{lf_landing_starrating_ctrl(3);});
lf_landing_stars[0].addEventListener("click", ()=>{lf_landing_starrating_ctrl(4);});

lf_landing_stars[9].addEventListener("click", ()=>{lf_landing_starrating_ctrl(0);});
lf_landing_stars[8].addEventListener("click", ()=>{lf_landing_starrating_ctrl(1);});
lf_landing_stars[7].addEventListener("click", ()=>{lf_landing_starrating_ctrl(2);});
lf_landing_stars[6].addEventListener("click", ()=>{lf_landing_starrating_ctrl(3);});
lf_landing_stars[5].addEventListener("click", ()=>{lf_landing_starrating_ctrl(4);});






// feedback

var seond_set_qs = [
    [
        "It helped me complete my goad(s)",
        "It had the information I needed",
        "It had accurate information",
        "It was easy to read",
        "Something else"
    ],[
        "It didn't help me complete my goad(s)",
        "It was missing information I needed",
        "It had inaccurate information",
        "It was hard to read",
        "Something else"
    ]
]
const yes = document.getElementById("lf_feedback_btn_yes");
const no = document.getElementById("lf_feedback_btn_no");

const ans2_btns = document.querySelectorAll(".q_set2_qs");

const lf_feedback_set1 = document.getElementById("lf_feedback_q_set1");
const lf_feedback_set2 = document.getElementById("lf_feedback_q_set2");
const lf_feedback_final = document.getElementById("lf_feedback_q_final");



yes.addEventListener("click", ()=>{second_round_feedback(0);});
no.addEventListener("click", ()=>{second_round_feedback(1);});

function second_round_feedback(lf_type) {
    lf_feedback_set1.classList.add("lf_feedback_collapse");
    lf_feedback_set2.classList.remove("lf_feedback_collapse");
    let lf_btn_count=0;
    ans2_btns.forEach(item => {
        item.innerText = seond_set_qs[lf_type][lf_btn_count++];
    });
}

ans2_btns.forEach(item => {
    item.addEventListener("click", ()=>{
        lf_feedback_set2.classList.add("lf_feedback_collapse");
        lf_feedback_final.classList.remove("lf_feedback_collapse");
    });
});

var yesno_ans = "";
var set2_ans = "";
const lf_feedback_yesno = document.querySelectorAll(".lf_feedback_yesno");
const q_set2_qs = document.querySelectorAll(".q_set2_qs");

lf_feedback_yesno.forEach(item=>{
    item.addEventListener("click", ()=>{
        yesno_ans = item.classList[1].slice(-1);
        set2_ans=  item.classList[1].slice(-1);
    });
});


q_set2_qs.forEach(item=>{
    item.addEventListener("click", ()=>{
        set2_ans=  item.classList[1].slice(-1);
        feedback_reqer.open("POST", wp_dir_url+'/form_ctrl/feedback_form.php?q1='+yesno_ans+'&q2='+set2_ans+'&page_id='+post_id+'', true);
        feedback_reqer.send();
    });
});
