


// var citymap = { 
//     vancouver: {
//       center: {lat: 52.52, lng: 13.41},
//       population: 1000000
//       }
//   };
//   var zoom;
//   var cityCircle;
  
//   function initMap() {
//     // The location of Uluru
//     var uluru = {lat: 52.52, lng: 13.41};
//     zoom={zoom: 2, center: uluru};
//     // The map, centered at Uluru
//     map_generate(uluru,citymap,zoom);
//     // $('#mapscale').val(7);
//   }
  
//   function map_generate(uluru,citymap,zoom){
//     var map = new google.maps.Map(
//       document.getElementById('map'), zoom);
//       // The marker, positioned at Uluru
//       // var marker = new google.maps.Marker({position: uluru, map: map});
//       for (var city in citymap) {
//         // Add the circle for this city to the map.
//         cityCircle = new google.maps.Circle({
//             strokeColor: '#7e65f3',
//             strokeOpacity: 0.8,
//             strokeWeight: 2,
//             fillColor: '#7e65f3',
//             fillOpacity: 0.35,
//             map: map,
//             center: citymap[city].center,
//             radius: Math.sqrt(citymap[city].population) * 100
//         });
//       }   
//    }
// $(document).ready(function(){
//   window.onload=function(){
//     alert();
//     setTimeout(() => {
//       alert('ok');
//     }, 3000);
//   }
 function city_position(){
  // alert();
    setTimeout(() => {
            alert('ok');
    }, 3000);
 }
 window.onload=city_position;
// });
// function sleep(ms) {
//   return new Promise(resolve => setTimeout(resolve, ms));
// }
   function initMap() {
    // The location of Uluru
    var uluru = {lat: 52.52, lng: 13.41};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 6, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
  }
