
// document.getElementById("ax_tabs_inside_cover").innerHTML = '';
// for(i=0; i<ax_services_data.length; i++) {
//     var lf_service_taps_content = '';
//     lf_service_taps_content += '<p data="'+ax_services_data[i][4][0]+'" class="ax_item" id="'+ax_services_data[i][4][0]+'-tap">';
//     lf_service_taps_content += '<span>'+ax_services_data[i][4][0]+'</span>';
//     lf_service_taps_content += ax_services_data[i][4][2];
//     lf_service_taps_content += '</p>';
//     document.getElementById("ax_tabs_inside_cover").innerHTML += lf_service_taps_content;
// }


let round = 0;



// slider 
const ax_services_item = document.querySelector("section#ax_services .ax_items");
const ax_services_sub = document.querySelector("section#ax_services #lf_cats_sub");
const ax_tabs_item = document.querySelectorAll("section#ax_hero_image .ax_tabs .ax_item");
const hero_image = document.getElementById("ax_hero_img");
const ax_services_con_items = document.querySelectorAll("section#ax_hero_image .ax_tabs .ax_items .ax_item");
var os_stat = navigator.appVersion.indexOf("Mac OS");
if(os_stat >= 0) os_stat=1;
else os_stat=0;
var lf_items_of_services = document.querySelectorAll("section#ax_services .ax_items .ax_item");
var lf_items_of_services_sub = document.querySelectorAll("#lf_cats_sub ul");
lf_home_slider(document.querySelectorAll("div#ax_tabs_inside_cover > p")[0]);

document.querySelectorAll("div#ax_tabs_inside_cover > p").forEach(item=>{
    item.addEventListener("click", ()=>{
        document.getElementById('lf_cats_sub').style.height = "0px";
        lf_home_slider(item);
    });
});


function lf_home_slider(item) {
    let help_text_per = 1;
    let scolldown_per = 1;
    for(i=0; i<ax_services_data.length; i++) {
        if(item.getAttribute("data") == ax_services_data[i][4][0]) {
            document.getElementById("ax_services").classList.remove("lf_active");
            ax_services_sub.innerHTML = '<p id="lf_close"><span>scroll down for more</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></p>';
            ax_services_item.innerHTML = "";
            if(ax_services_data[i][0].length == 0) {
                ax_services_item.innerHTML = '<p></p><p class="lf_soon">COMING SOON!</p><p></p>';
                document.getElementById("ax_services").classList.remove("lf_active");
            }else{
                ax_services_item.innerHTML += '<p class="lf_help">*Click on courses to check the '+ax_services_data[i][4][1]+' piloting lessons</p>';
                var lf_available_course, lf_available_course_link;
                for(k=0; k<(ax_services_data[i][2].length)-1; k++){
                    lf_available_course = "";
                    if(ax_services_data[i][0][k][0] == "{block}") lf_available_course = "lf_course_block";
                    var ax_services_sub_data = '';
                    ax_services_sub_data += '<div data-status="none" data="'+ax_services_data[i][0][k][0]+'"><ul>';
                    for(j=2; j<ax_services_data[i][0][k].length; j++) ax_services_sub_data += '<li><a href="'+ax_services_data[i][0][k][j]+'">'+ax_services_data[i][0][k][++j]+'</a></li>';
                    ax_services_sub_data += '</ul>';
                    if(j>=14) {
                        scolldown_per=0;
                        ax_services_sub_data += '<div class="lf_scrolldown1"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg></div>';
                    }
                    ax_services_sub_data += '</div>';
                    ax_services_sub.innerHTML += ax_services_sub_data;
                    lf_available_course_link = "";
                    if(ax_services_data[i][0][k][0] != "{block}") lf_available_course_link = 'href="'+ax_services_data[i][0][k][1]+'"';
                    ax_services_item.innerHTML += 
                    '<div class="ax_item '+lf_available_course+'" data="'+ax_services_data[i][0][k][0]+'">'+
                        '<a '+lf_available_course_link+'>'+
                            ax_services_data[i][1][k]+
                            '<h2 class="ax_title">'+ax_services_data[i][2][k]+'</br><span>'+ax_services_data[i][4][1]+'</span></h2>'+
                            '<p class="lf_item_help">Learn this</p>'+
                        '</a>'+
                    '</div>';
                }
            }
            if(round != 0) hero_image.style.filter = "brightness(0)";
            var lf_i = i;
            setTimeout(()=>{
                var lf_heroimg_src = wp_dir_url+"/"+ax_services_data[lf_i][3][1];
                var lf_heroimg_src_dot_index = lf_heroimg_src.lastIndexOf(".");
                var lf_heroimg_src_part1 = lf_heroimg_src.slice(0, lf_heroimg_src_dot_index);
                var lf_heroimg_src_part1_alt = lf_heroimg_src_part1;
                var lf_heroimg_src_part2 = lf_heroimg_src.slice(lf_heroimg_src_dot_index);
                lf_heroimg_src_part1 += lf_heroimg_src_part2;
                lf_heroimg_src = lf_heroimg_src_part1;
                if(round != 0) {
                    hero_image.setAttribute("src", lf_heroimg_src);
                    hero_image.setAttribute("srcset", ""+lf_heroimg_src_part1_alt+"-small.jpg 300w, "+lf_heroimg_src_part1_alt+"-medium.jpg 700w, "+lf_heroimg_src_part1_alt+"-large.jpg 1000w");
                }
            }, 200);
            if(round != 0)
                hero_image.addEventListener("load", ()=>{
                    if(ax_theme_state == 1) hero_image.style.filter = "brightness(1)";
                    if(ax_theme_state == 0) hero_image.style.filter = "brightness(1)";
                });
            for(k=0; k<ax_services_data.length; k++)
                if(ax_tabs_item[k].classList.contains("ax_active") === true)
                    ax_tabs_item[k].classList.remove("ax_active");
            ax_tabs_item[i].classList.add("ax_active"); 
        }
    }
    round=1;


    lf_items_of_services = document.querySelectorAll("section#ax_services .ax_items .ax_item");
    lf_items_of_services_sub = document.querySelectorAll("#lf_cats_sub > div");
    lf_items_of_services.forEach(item=>{
        item.addEventListener("click", (e)=>{
            if(item.classList[1]){
                item.classList.remove("active");
            } 
            else{
                e.preventDefault();
                document.getElementById('lf_cats_sub').style.height = "100px";
                for(i=0; i<lf_items_of_services.length; i++)
                    if(lf_items_of_services[i].classList[1])
                            lf_items_of_services[i].classList.remove("active");
                item.classList.add("active");
                var lf_selected_item = item.getAttribute("data");
                lf_items_of_services_sub.forEach(item2=>{
                    if(item2.getAttribute("data") == lf_selected_item) {
                        if(item2.getAttribute("data-status") == "none") {
                            lf_items_of_services_sub.forEach(item3=>{if(item3.getAttribute("data-status") == "clicked") item3.setAttribute("data-status", "none");});
                            item2.setAttribute("data-status", "clicked");
                            document.getElementById("ax_services").classList.add("lf_active");
                        }else if(item2.getAttribute("data-status") == "clicked"){
                            item2.setAttribute("data-status", "none");
                            document.getElementById("ax_services").classList.remove("lf_active");
                        }
                    }
                });
            }
        });
    });
    document.getElementById("lf_naturalizer").addEventListener("click", ()=>{
        document.getElementById('lf_cats_sub').style.height = "0px";
        for(i=0; i<lf_items_of_services.length; i++)
            lf_items_of_services_sub[i].setAttribute("data-status", "none");
        document.getElementById("ax_services").classList.remove("lf_active");
        for(i=0; i<lf_items_of_services.length; i++)
            if(lf_items_of_services[i].classList[1])
                    lf_items_of_services[i].classList.remove("active");
        var lf_selected_item = item.getAttribute("data");
        lf_items_of_services_sub.forEach(item2=>{
            if(item2.getAttribute("data") == lf_selected_item) {
                if(item2.getAttribute("data-status") == "none") {
                    lf_items_of_services_sub.forEach(item3=>{if(item3.getAttribute("data-status") == "clicked") item3.setAttribute("data-status", "none");});
                    item2.setAttribute("data-status", "clicked");
                    document.getElementById("ax_services").classList.add("lf_active");
                }else if(item2.getAttribute("data-status") == "clicked"){
                    item2.setAttribute("data-status", "none");
                    document.getElementById("ax_services").classList.remove("lf_active");
                }
            }
        });
    });
    var dom;
    document.querySelectorAll('div#lf_cats_sub > div').forEach(item=>{
        item.addEventListener("wheel", ()=>{mobile_course_sub_height(item)}, {passive: true});
        item.addEventListener("touchmove", ()=>{mobile_course_sub_height(item)}, {passive: true});
    });
    function mobile_course_sub_height(item) {
        dom = document.getElementById('lf_cats_sub');
        console.log(item.scrollTop);
        if(item.scrollTop>20) dom.style.height="300px";
    }
    document.querySelector("div#lf_cats_sub p#lf_close svg").addEventListener("click", ()=>{
        document.getElementById('lf_cats_sub').style.height = "0px";
    });
    
}




