document.getElementById("lf_weblog_country_filter").addEventListener("input", ()=>{lf_blog_filter(1);});
document.getElementById("lf_weblog_type_filter").addEventListener("input", ()=>{lf_blog_filter(1);});
document.getElementById("lf_weblog_country_filter2").addEventListener("input", ()=>{lf_blog_filter(0);});
document.getElementById("lf_weblog_type_filter2").addEventListener("input", ()=>{lf_blog_filter(0);});
if(window.location.hash) {
    var thehash = window.location.hash;
    thehash = thehash.slice(1);
    lf_blog_filter(thehash);
}
function lf_blog_filter(dom) {
    var res1, res2;
    if(dom==1) {
        var current_filter1 = document.getElementById("lf_weblog_country_filter").value;
        var current_filter2 = document.getElementById("lf_weblog_type_filter").value;
    }else if(dom==0){
        var current_filter1 = document.getElementById("lf_weblog_country_filter2").value;
        var current_filter2 = document.getElementById("lf_weblog_type_filter2").value;
    }

    document.querySelectorAll("section#lf_blog_items .lf_items .lf_item").forEach(item=>{
        if(dom==1 || dom==0) {
            res1 = item.classList.contains(current_filter1);
            if(current_filter1=="") res1 = true;
            res2 = item.classList.contains(current_filter2);
            if(current_filter2=="") res2 = true;
        }else{
            res1 = true;
            res2 = item.classList.contains(dom);
            console.log(res2);
        }
        if(res1 && res2) item.style.display = "block";
        else item.style.display = "none";
        
    });
}