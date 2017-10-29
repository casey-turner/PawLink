<div id="searchMap"></div>
<script>
	function initMap() {
		var searchMap = new google.maps.Map(document.getElementById('searchMap'), {
			zoom: 18,
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
        <div class="row">
            <div class="searchResults">
				<?php
				for ($i = 1; $i <= $numPages; $i++) { ?>
				    <a href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a>
				<?php
				}
	            foreach ($results as $result) { ?>
					<div class="search-profile">
                        <a href="?controller=profiles&action=profile&profileID=<?php echo $result['profileID']; ?>">
                            <div class="row">
                                <div class="col-3 ">
                                    <div class="search-thumb">
                                        <img src="view/uploads/<?php echo $result['profileImage']; ?>" >
                                        <p><?php echo $result['firstName'].' '.substr($result['lastName'], 0, 1); ?></p>
                                    </div>
                                </div>
                                <div class="col-9 search-result">
                                    <h3><?php echo $result['profileTitle']; ?></h3>
                                    <h4><?php echo $result['suburb']; ?></h4>
                                    <p><?php echo substr($result['profileDescription'],0,250).'...' ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
				<?php
	            }?>
            </div>
        </div>
    </div>
</div>
