// var darkmode_status=0;
// document.getElementById("ax_theme_switch").addEventListener("click", ()=>{
//     if(darkmode_status==1) {
//         document.getElementsByTagName("main")[0].setAttribute("id", "");
//         darkmode_status=0;
//     } else {
//         document.getElementsByTagName("main")[0].setAttribute("id", "dark_mode");
//         darkmode_status=1;
//     }
// });




// social media hover ctrl
var lf_sovialmedoa_hover_rec=3;
var lf_socialmedias_moves = [];
const lf_socialmedias = document.querySelectorAll("section#lf_about_socialmedia .lf_about_items .lf_about_item");
    
lf_socialmedias[5].style.maxWidth = "30px";
lf_socialmedias[5].style.width = "30px";
lf_socialmedias[1].style.maxWidth = "30px";
lf_socialmedias[1].style.width = "30px";
lf_socialmedias[4].style.maxWidth = "37px";
lf_socialmedias[4].style.width = "37px";
lf_socialmedias[2].style.maxWidth = "37px";
lf_socialmedias[2].style.width = "37px";
lf_socialmedias[3].style.maxWidth = "43px";
lf_socialmedias[3].style.width = "43px";

lf_socialmedias.forEach(item=>{
    item.addEventListener("mouseover", ()=>{
        if(window.innerWidth > 600) {
            for(i=0; i<lf_socialmedias.length; i++) {
                lf_socialmedias[i].style.maxWidth = "23px";
                lf_socialmedias[i].style.width = "23px";
                lf_socialmedias[i].classList.remove("lf_active");
            }
            for(i=0; i<lf_socialmedias.length; i++) {
                if(item.innerHTML == lf_socialmedias[i].innerHTML) {
                    if(lf_socialmedias[i-2] != null) {
                        lf_socialmedias[i-2].style.maxWidth = "30px";
                        lf_socialmedias[i-2].style.width = "30px";
                    }
                    if(lf_socialmedias[i+2] != null) {
                        lf_socialmedias[i+2].style.maxWidth = "30px";
                        lf_socialmedias[i+2].style.width = "30px";
                    }
                    if(lf_socialmedias[i-1] != null) {
                        lf_socialmedias[i-1].style.maxWidth = "37px";
                        lf_socialmedias[i-1].style.width = "37px";
                    }
                    if(lf_socialmedias[i+1] != null) {
                        lf_socialmedias[i+1].style.maxWidth = "37px";
                        lf_socialmedias[i+1].style.width = "37px";
                    }
                    if(lf_socialmedias[i] != null) {
                        lf_socialmedias[i].style.maxWidth = "43px";
                        lf_socialmedias[i].style.width = "43px";
                        lf_socialmedias[i].classList.add("lf_active");
                    }
                }
            }
        }
    });
});
window.addEventListener("resize", ()=>{
    if(window.innerWidth < 600) {
        for(i=0; i<lf_socialmedias.length; i++) {
            lf_socialmedias[i].style.maxWidth = "33px";
            lf_socialmedias[i].style.width = "33px";
            lf_socialmedias[i].classList.remove("lf_active");
        }
    }
});
window.addEventListener("load", ()=>{
    if(window.innerWidth < 600) {
        for(i=0; i<lf_socialmedias.length; i++) {
            lf_socialmedias[i].style.maxWidth = "33px";
            lf_socialmedias[i].style.width = "33px";
            lf_socialmedias[i].classList.remove("lf_active");
        }
    }
});
// custome new window
const lf_share_event2 = document.querySelectorAll("section#lf_about_socialmedia .lf_about_items .lf_about_item a");
lf_share_event2.forEach(item=>{
    item.addEventListener("click", e=>{
        e.preventDefault();
        if(window.width < 600) {
            window.open(item.href,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400");
        } else {
            window.open(item.href,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400");
        }
    });
});



// joinus form ctrl
// const lf_joinus_form = document.getElementById("lf_joinus_form");
// const lf_joinus_form_file = document.getElementById("lf_joinus_form_attach");
// document.getElementById("lf_joinus_form").addEventListener("submit", e=>{
//     e.preventDefault();
//     if(lf_joinus_form.checkValidity()) {
//         inpage_notification(5000, "درخواست شما با موفقیت ثبت گردید." );
//         var xhttp_joinus = new XMLHttpRequest();
//         lf_joinus_form_data = new FormData(lf_joinus_form);
//         lf_joinus_form_data.append('clientFile', lf_joinus_form_file.files[0]);
//         lf_joinus_form_path = wp_dir_url+"/form_ctrl/joinus_form.php";
//         xhttp_joinus.open("POST", lf_joinus_form_path, true);
//         xhttp_joinus.send(lf_joinus_form_data);
//     }
// });
