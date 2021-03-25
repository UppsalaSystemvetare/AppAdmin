function initMap() {
  const locationInput = document.querySelector("#locationCoords");
  let edit = false;
  if (locationInput.value) edit = true;

  let initcoords = { lat: 59.859372246046, lng: 17.6188528646033 };

  if (edit) {
    coordsObject = JSON.parse(locationInput.value);
    initcoords = {
      lat: coordsObject.lat,
      lng: coordsObject.lng,
    };
  }
  // Initialize map
  const map = new google.maps.Map(document.querySelector("#map"), {
    zoom: 14,
    center: initcoords,
  });

  // Initialize markers array
  let markers = [];

  if (edit) {
    markers.push(
      new google.maps.Marker({
        position: initcoords,
        map,
      })
    );
  }

  // Search box
  const input = document.querySelector("#pac-input");
  const searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias SeachBox results towards current map's viewport
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => marker.setMap(null));
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      // Create a marker for each place
      markers.push(
        new google.maps.Marker({
          map,
          title: place.name,
          position: place.geometry.location,
        })
      );

      // Extract coords and store in input
      const coords = place.geometry.location;
      const lat = coords.lat();
      const lng = coords.lng();
      const coordsObject = { lat, lng };

      locationInput.value = JSON.stringify(coordsObject);
      //console.log(locationInput.value);

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });

  // click listener
  map.addListener("click", (mapsMouseEvent) => {
    // Get lat lng from click
    const coords = mapsMouseEvent.latLng;
    const lat = coords.lat();
    const lng = coords.lng();
    const coordsObject = { lat, lng };
    // Add marker
    let marker = new google.maps.Marker({
      map,
      position: coords,
      title: "Marker Title",
    });
    markers.forEach((marker) => marker.setMap(null));
    markers = [];
    markers.push(marker);

    // Store coords in hidden location input
    locationInput.value = JSON.stringify(coordsObject);
    console.log(locationInput.value);
  });
}
