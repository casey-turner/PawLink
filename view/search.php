<div id="searchMap"></div>
<script>
	function initMap() {
		var searchMap = new google.maps.Map(document.getElementById('searchMap'), {
			zoom: 12,
			center: {lat: -27.4698, lng: 153.0251},
		});

		var bounds  = new google.maps.LatLngBounds();
		var infoWin = new google.maps.InfoWindow();

		var searchResults = [
			// Tutor markers
			<?php
            foreach ($results as $result) { ?>
				{
					lat: <?php echo $result['latitude'] ?>,
					lng: <?php echo $result['longitude'] ?>,
					info: '<p><strong>dsgdfgf</strong></p>'+
					'<p></p>'+
					'<p><a href="/tutors/profile//">View profile</a></p>'
				},
			<?php
            }?>
		]

        var markers = searchResults.map(function(location, i) {

			var marker = new google.maps.Marker({
				position: location,
			});

			google.maps.event.addListener(marker, 'click', function(evt) {
				infoWin.setContent(location.info);
				infoWin.open(searchMap, marker);
			});

			var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
			bounds.extend(loc);

			return marker;
		});

		// Add a marker clusterer to manage the markers.
		var markerCluster = new MarkerClusterer(searchMap, markers,
			{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

		searchMap.initialZoom = true;
		searchMap.fitBounds(bounds);
		searchMap.panToBounds(bounds);
	}
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSsYbifNcYXGACnsjxO8OQtp5h9s9KCfU&callback=initMap"></script>
<div class="wrapper memberPage">
    <div class="container centre-content">
        <h1>Brisbane Dog Walkers</h1>
        <div class="row">
            <div class="searchResults">
                <script type="text/javascript">
                    /*jQuery(document).ready(function($) {
                        searchWalkers();
                    });*/
                </script>
            </div>
        </div>
    </div>
</div>
