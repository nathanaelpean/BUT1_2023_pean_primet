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

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibmF0aGFuYWVscGVhbiIsImEiOiJjbGkxb3VjdGcwYXl5M2ZvN3kydWE3dmk4In0.f7RHCpf4wcGPhRMGJqXH2g';
        const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });

        let data = [
            <?php foreach($adresses as $adresse){ ?>
                {
                    id:"<?= $adresse["adress_id"] ?>",
                    ville:"<?= $adresse["ville"] ?>",
                    pays:"<?= $adresse["pays"] ?>"
                }
            <?php } ?>
        ]

        data.forEach(point =>{

        });
        mapboxClient.geocoding
        .forwardGeocode({
        query: 'Wellington, New Zealand',
        autocomplete: false,
        limit: 1
        })
        .send()
        .then((response) => {
        if (
        !response ||
        !response.body ||
        !response.body.features ||
        !response.body.features.length
        ) {
        console.error('Invalid response:');
        console.error(response);
        return;
        }

        const feature = response.body.features[0];
        
        const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: feature.center,
        zoom: 10
        });
        
        // Create a marker and add it to the map.
        new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
        });
    </script>

    <!-- <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibmF0aGFuYWVscGVhbiIsImEiOiJjbGkxb3VjdGcwYXl5M2ZvN3kydWE3dmk4In0.f7RHCpf4wcGPhRMGJqXH2g'; // Remplacez YOUR_MAPBOX_ACCESS_TOKEN par votre jeton d'accès Mapbox

        // Initialisation de la carte
        var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [1.87, 46.60],
        zoom: 4.3
        });
        // fetch('/cdn/js/loc.geojson')
        // .then(response => response.json())
        // .then(data => {
        //     console.log(data);
        // })
        // .catch(error => {
        //     console.error(error);
        // });
        // Chargement des points à partir d'un fichier JavaScript
        map.on('load', function() {
        let points = [
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
            points.forEach(function(point) {
                var el = document.createElement('div');
                el.className = 'marker';

                new mapboxgl.Marker(el)
                .setLngLat([point.longitude, point.latitude])
                .setPopup(new mapboxgl.Popup().setHTML('<h3>' + point.name + '</h3>'))
                .addTo(map);
            });
        });
    </script> -->
</div>