<?php

function loadMap($street,$postalcode,$city){
$data = array(
  'street'     => $street,
  'postalcode' => $postalcode,
  'city'       => $city,
  'country'    => 'FRANCE',
  'format'     => 'json',
);


$url = 'https://nominatim.openstreetmap.org/?' . http_build_query($data);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'yoga.bh92@gmail.com');
$geopos = curl_exec($ch);
curl_close($ch);

$json_data = json_decode($geopos,true);


if (isset($json_data[0]['lon']))
 {
    $LON = $json_data[0]['lon'];
    $LAT = $json_data[0]['lat'];
}
else{
    $LON='non trouvé';
    $LAT='non trouvé';
}
    


$tabAdress = array(
  'longitude'     => $LON,
  'latitude' => $LAT,
)
;
return $tabAdress;

}

/*

 
$html= '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <style type="text/css">
            #map{ /* la carte DOIT avoir une hauteur sinon elle n"apparaît pas 
                height:400px;
            }
        </style>
        <title>Carte</title>
    </head>
    <body>
        <div id="map">
        <!-- Ici s"affichera la carte -->
    </div>

        <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
            var lat = '.$LON.';
            var lon = '.$LAT.';
            var macarte = null;
            // Nous ajoutons un marqueur
            // Fonction d"initialisation de la carte
            function initMap() {
                // Créer l"objet "macarte" et l"insèrer dans l"élément HTML qui a l"ID "map"
                macarte = L.map("map").setView([lat, lon], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer("https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png", {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: "données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>",
                    minZoom: 10,
                    maxZoom: 40
                }).addTo(macarte);

                var marker = L.marker([lat, lon]).addTo(macarte);
            }
            window.onload = function(){
        // Fonction d"initialisation qui s"exécute lorsque le DOM est chargé
        initMap(); 
            };

      

        </script>
    </body>
</html>'; 
*/







?>


