

// weather
// var xhttp_weather = new XMLHttpRequest;
// xhttp_weather.open("GET", "https://api.openweathermap.org/data/2.5/weather?q=tehran,Iran&appid=106476cdfacfe10a1857dc55be5dd220&units=metric", true);
// xhttp_weather.send();


// var lf_selected_country;
// document.querySelectorAll(".ax_tabs .ax_item").forEach(item=>{
//     item.addEventListener("click", ()=>{
//         lf_selected_country=item.getAttribute("data-country");

//     });
// });


// var res, date, day, hour, min, mon, selected_timezone, timezone_e_h, timezone_e_m;

// xhttp_weather.onreadystatechange = function() {
//   if (this.readyState == 4 && this.status == 200) {
//     lf_display_date();
//   }
// };

// function lf_display_date() {
//     res = JSON.parse(xhttp_weather.responseText);
//     date = new Date();
//     day = date.getUTCDate();
//     hour = date.getUTCHours();
//     min = date.getUTCMinutes();
//     mon = date.getUTCMonth();
//     switch(mon) {
//         case 1:
//             mon="Jan";
//             break;
//         case 2:
//             mon="Feb";
//             break;
//         case 3:
//             mon="Mar";
//             break;
//         case 4:
//             mon="Apr";
//             break;
//         case 5:
//             mon="May";
//             break;
//         case 6:
//             mon="Jun";
//             break;
//         case 7:
//             mon="Jul";
//             break;
//         case 8:
//             mon="Aug";
//             break;
//         case 9:
//             mon="Sept";
//             break;
//         case 10:
//             mon="Oct";
//             break;
//         case 11:
//             mon="Nov";
//             break;
//         case 12:
//             mon="Dec";
//             break;
//         default:
//             mon="undefined"
//             break;
//     }
//     document.getElementById("lf_the_date").innerHTML = hour+":"+min+", "+mon+" "+day;
// }