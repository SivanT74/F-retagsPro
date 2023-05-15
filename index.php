<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recycling and Waste Disposal Sites</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  </head>
  <body>

     <!-- Navbaren -->
    <ul class="nav">
      <li><a href="#">Hem</a></li>
      <li><a href="Miljön.html">Miljön</a></li>
      <li><a href="Omoss.html">Om oss</a></li>
    </ul>

    <div id="header">
      <h1>Hitta närmaste pant och återvinningsstation</h1>
    </div>
    <div id="map"></div>

    <!-- Kartan och lägga  -->
    <script src="Recycling.js"></script>
    <script src="Sites.js"></script>
    <script>
      // kartan
      var map = L.map('map').setView([58.397272132101754, 13.847157517585615], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // bilden för pant stationerna
      var recyclingIcon = L.icon({
        iconUrl: 'pics/Pant.png',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
      });
      
      // lägga till pant stationer på kartan
    for (var i = 0; i < Recycling.length; i++) {
        var site = Recycling[i];
        var marker = L.marker([site.lat, site.lng], {icon: recyclingIcon}).addTo(map);
        marker.bindPopup("<div class='popup-content'><div class='popup-header'>" + site.name + "</div>" + site.content + "<br><a href='milha.php?site_id=" + site.id + "&Name=" + site.name + "&Sort= "  +"' class='popup-button'>Comments</a></div>");

      }


      // Bilden för återvining platser
      var SitesIcon = L.icon({
        iconUrl: 'pics/Waste.png',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
      });

      // lägga till återvining på karten
     for (var i = 0; i < Sites.length; i++) {
        var site = Sites[i];
        var marker = L.marker([site.lat, site.lng], {icon: SitesIcon}).addTo(map);
        marker.bindPopup("<div class='popup-content'><div class='popup-header'>" + site.name + "</div>" + site.content + "<br><a href='milha.php?site_id=" + site.id + "&Name=" + site.name + "&Sort=" + site.textsort + "' class='popup-button'>Comments</a></div>");      
      }
    </script>

  </body>
</html>