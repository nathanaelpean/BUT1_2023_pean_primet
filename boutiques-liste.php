<div class="form-compact">
    <form action="/boutiques" method="get">
        <div class="box">
            <legend>Recherchez une boutique</legend>
            <input type="text" name="q" required>
            <button class="search"></button>
        </div>
    </form>
</div>
<div class="flex">
    <div class="data-list">
    <?php
    $boutiques = req("SELECT * FROM boutiques");
    $adresses = req("SELECT * FROM adresses");
    foreach($boutiques as $boutique){ 
        $adresse = $adresses[$boutique["adresse_id"]];
    ?>
        <a class="boutique" href="?id=<?= $boutique["boutique_id"] ?>">
            <h2><?= $boutique["nom"] ?></h2>
            <p><?= $adresse["numero_rue"].",".$adresse["nom_adresse"]."<br>".$adresse["code_postal"]." ".$adresse["ville"]." ".$adresse["pays"] ?></p>
        </a>
    <?php } ?>
    </div>
    <div id="map"></div>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibmF0aGFuYWVscGVhbiIsImEiOiJjbGkxb3VjdGcwYXl5M2ZvN3kydWE3dmk4In0.f7RHCpf4wcGPhRMGJqXH2g'; // Remplacez YOUR_MAPBOX_ACCESS_TOKEN par votre jeton d'accès Mapbox

    // Initialisation de la carte
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11', // Style de la carte (vous pouvez choisir un autre style)
      center: [1.87, 46.60],
      zoom: 12
    });
    fetch('/cdn/js/loc.geojson')
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error(error);
    });
    // Chargement des points à partir d'un fichier JavaScript
    map.on('load', function() {
      // Charger les points depuis un fichier JavaScript
      var points = [
        {
          name: 'Point 1',
          longitude: 2.35,
          latitude: 48.85
        },
        {
          name: 'Point 2',
          longitude: 2.37,
          latitude: 48.86
        },
        {
          name: 'Point 3',
          longitude: 2.36,
          latitude: 48.87
        }
        // Ajoutez d'autres points selon vos besoins
      ];

      // Parcourir les points et les ajouter à la carte
      points.forEach(function(point) {
        var el = document.createElement('div');
        el.className = 'marker';

        new mapboxgl.Marker(el)
          .setLngLat([point.longitude, point.latitude])
          .setPopup(new mapboxgl.Popup().setHTML('<h3>' + point.name + '</h3>'))
          .addTo(map);
      });
    });
  </script>
</div>