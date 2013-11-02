<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://mbostock.github.com/d3/d3.js"></script>
<style type="text/css">
html,body,#map {
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 0;
}

.crops,.crops svg {
	position: absolute;
}

.crops svg {
	width: 60px;
	height: 20px;
	padding-right: 100px;
	font: 10px sans-serif;
}

.crops circle {
	fill: brown;
	stroke: black;
	stroke-width: 1.5px;
}
</style>
</head>
<body>

<?php
$con = mysqli_connect ( "localhost", "root", "Mahalaxmi$7", "tingri" );
// Check connection
if (mysqli_connect_errno ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

$result = mysqli_query ( $con, "select  distinct date_format(Year, '%Y') as Year from demo_apy ;" );

echo "<select id='Year' name='Year' value='' >";

while ( $row = mysqli_fetch_array ( $result ) ) {
	echo "<option value=\"" . $row ['Year'] . "\">" . $row ['Year'] . "</option>";
}

echo "</select>";

$result = mysqli_query ( $con, "select  distinct Season from demo_apy ;" );

echo "<select id='Season' name='Season' value='' >";

while ( $row = mysqli_fetch_array ( $result ) ) {
	echo "<option value=\"" . $row ['Season'] . "\">" . $row ['Season'] . "</option>";
}

echo "</select>";

$result = mysqli_query ( $con, "select  distinct Crop from demo_apy ;" );

echo "<select id='Crop' name='Crop' value='' >";

while ( $row = mysqli_fetch_array ( $result ) ) {
	echo "<option value=\"" . $row ['Crop'] . "\">" . $row ['Crop'] . "</option>";
}

echo "</select>";

$result = mysqli_query ( $con, "select  distinct State from demo_apy ;" );

echo "<select id='State' name='State' value='' >";

while ( $row = mysqli_fetch_array ( $result ) ) {
	echo "<option value=\"" . $row ['State'] . "\">" . $row ['State'] . "</option>";
}

echo "</select>";

$test = mysqli_close ( $con );

?>

<br>
<div id="map"></div>
    <script type="text/javascript">
        // Load the crop data. When the data comes back, create an overlay.
        d3.json("/demos/gmap_d3_data.php", function(data) {
            // Create the Google Map…
            var geocoder = new google.maps.Geocoder();           
            var overlay = new google.maps.OverlayView();

            // Add the container when the overlay is added to the map.
            overlay.onAdd = function() {
            var layer = d3.select(this.getPanes().overlayLayer).append("div")
                .attr("class", "crops");
            // Draw each marker as a separate SVG element.
            // We could use a single SVG, but what size would it have?
            overlay.draw = function() {
              var projection = this.getProjection(),
                  padding = 10;

              var marker = layer.selectAll("svg")
                  .data(d3.entries(data))
                  .each(transform) // update existing markers
                  .enter().append("svg:svg")
                  .each(transform)
                  .attr("class", "marker");

              // Add a circle.
              marker.append("svg:circle")
                  .attr("r", 4.5)
                  .attr("cx", padding)
                  .attr("cy", padding);

              // Add a label.
              marker.append("svg:text")
                  .attr("x", padding + 7)
                  .attr("y", padding)
                  .attr("dy", ".31em")
                  .text(function(d) { return Object.keys(d.value)[0]; });

              function transform(d) {
                console.log(d);
                console.log(Object.keys(d.value)[0]);
                d = projection.fromLatLngToDivPixel(new google.maps.LatLng(d.value[Object.keys(d.value)[0]]['lat'], d.value[Object.keys(d.value)[0]]['lng']));
                return d3.select(this)
                            .style("left", (d.x - padding) + "px")
                            .style("top", (d.y - padding) + "px");

              }
            };
          };

            geocoder.geocode({'address': 'INDIA'},  function (results, status) {
               if (status === google.maps.GeocoderStatus.OK) {
                   var map = new google.maps.Map(d3.select("#map").node(), {
                                    zoom: 5,
                                    center:  results[0].geometry.location,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                             });

                   // Bind our overlay to the map… 
                   overlay.setMap(map);
               }
            });
        });
    </script>
</body>
</html>

