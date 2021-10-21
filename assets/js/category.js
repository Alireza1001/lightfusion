for(i=0; i<categoryOrganizer.length; i++) {
    if(categoryOrganizer[i][4][1] == page_slug) {
        var lf_service_taps_content = '';
        lf_service_taps_content += '<p data="'+categoryOrganizer[i][4][0]+'" class="ax_item" id="'+categoryOrganizer[i][4][0]+'-tap">';
        lf_service_taps_content += '<span>'+categoryOrganizer[i][4][0]+'</span>';
        lf_service_taps_content += categoryOrganizer[i][4][2];
        lf_service_taps_content += '</p>';
        document.getElementById("ax_tabs_inside_cover").innerHTML += lf_service_taps_content;
    }
}




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
lf_home_slider(document.querySelector("div#ax_tabs_inside_cover > p"));





function lf_home_slider(item) {
    let help_text_per = 1;
    let scolldown_per = 1;
    for(i=0; i<categoryOrganizer.length; i++) {
        if(page_slug == categoryOrganizer[i][4][1]) {
            document.getElementById("ax_services").classList.remove("lf_active");
            ax_services_sub.innerHTML = '';
            ax_services_item.innerHTML = "";
            if(categoryOrganizer[i][0].length == 0) {
                ax_services_item.innerHTML = '<p></p><p class="lf_soon">COMING SOON!</p><p></p>';
                document.getElementById("ax_services").classList.remove("lf_active");
            }else{
                ax_services_item.innerHTML += '<p class="lf_help">*Click on courses to check the '+categoryOrganizer[i][4][1]+' lessons</p>';
                var lf_available_course, lf_available_course_link;
                for(k=0; k<(categoryOrganizer[i][2].length); k++){
                    lf_available_course = "";
                    if(categoryOrganizer[i][0][k][0] == "{block}") lf_available_course = "lf_course_block";
                    var ax_services_sub_data = '';
                    ax_services_sub_data += '<div data-status="none" data="'+categoryOrganizer[i][0][k][0]+'"><ul>';
                    for(j=2; j<categoryOrganizer[i][0][k].length; j++) {
                        ax_services_sub_data += '<li><a href="'+categoryOrganizer[i][0][k][j]+'">'+categoryOrganizer[i][0][k][++j]+'</a></li>';
                    }
                    ax_services_sub_data += '</ul>';
                    if(j>=14) {
                        scolldown_per=0;
                        ax_services_sub_data += '<div class="lf_scrolldown1"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5.88 4.12L13.76 12l-7.88 7.88L8 22l10-10L8 2z"></path></svg></div>';
                    }
                    ax_services_sub_data += '</div>';
                    ax_services_sub.innerHTML += ax_services_sub_data;
                    lf_available_course_link = "";
                    if(categoryOrganizer[i][0][k][0] != "{block}") lf_available_course_link = 'href="'+categoryOrganizer[i][0][k][1]+'"';
                    ax_services_item.innerHTML += 
                    '<div class="ax_item '+lf_available_course+'" data="'+categoryOrganizer[i][0][k][0]+'">'+
                        '<a '+lf_available_course_link+'>'+
                            categoryOrganizer[i][1][k]+
                            '<h2 class="ax_title">'+categoryOrganizer[i][2][k]+'</br><span>'+categoryOrganizer[i][4][1]+'</span></h2>'+
                            '<p class="lf_item_help">View course page</p>'+
                        '</a>'+
                    '</div>';
                }
            }
        }
    }
}

