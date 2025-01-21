<?php
// Sample latitude and longitude (you can replace these with values from your database)
$latitude = "17.4038524";   // Example: Latitude of New York City
$longitude = "78.3828333"; // Example: Longitude of New York City
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map Location with Leaflet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        /* Set the height and width of the map container */
        #map {
            height: 500px;
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<h3 class="text-center">Location Map</h3>
<div id="map"></div>

<!-- Leaflet.js Map Script -->
<script>
    // Initialize the map centered at the latitude and longitude from PHP
    var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 14);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Add a marker at the specified location
    L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map)
        .bindPopup("Location: <?php echo $latitude; ?>, <?php echo $longitude; ?>")
        .openPopup();
</script>

</body>
</html>
