<script type="text/javascript" src="assets/geojson/pend-jaktim.js"></script>
<script type="text/javascript" src="assets/geojson/pend-jakbar.js"></script>
<script type="text/javascript" src="assets/geojson/pend-jakpus.js"></script>
<script type="text/javascript" src="assets/geojson/pend-jakut.js"></script>
<script type="text/javascript" src="assets/geojson/pend-jaksel.js"></script>

<script>
    const Jakpus = 'JAKARTA PUSAT';
    const Jakbar = 'JAKARTA BARAT';
    const Jaktim = 'JAKARTA TIMUR';
    const Jakut = 'JAKARTA UTARA';
    const Jaksel = 'JAKARTA SELATAN';

    let showJakpus = true;
    let showJaktim = true;
    let showJakbar = true;
    let showJaksel = true;
    let showJakut = true;
    let showAll = true;


    function setPopupContent(feature, layer) {
        if (feature.properties && feature.properties.NAMOBJ) {
            layer.bindPopup(feature.properties.NAMOBJ);
        }
    }

    function setCircleMarker(feature, latlng) {
        var circleMarkerOptions = {
            radius: 5,
            fillColor: "#ff7800",
            color: "#000",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        };
        if (feature.properties.WADMKK == "JAKARTA UTARA") {
            circleMarkerOptions.fillColor = "#ff7800";
        } else if (feature.properties.WADMKK == "JAKARTA BARAT") {
            circleMarkerOptions.fillColor = "#0d00ff";
        } else if (feature.properties.WADMKK == "JAKARTA TIMUR") {
            circleMarkerOptions.fillColor = "#15ff00";
        } else if (feature.properties.WADMKK == "JAKARTA PUSAT") {
            circleMarkerOptions.fillColor = "#ff1900";
        } else {
            circleMarkerOptions.fillColor = "#ff00d9";
        }
        return L.circleMarker(latlng, circleMarkerOptions);
    }

    function filterShowHideJakpus(feature, layer) {
        return showJakbar;
    }

    function filterShowHideJakbar(feature, layer) {
        return showJakbar;
    }

    function filterShowHideJaktim(feature, layer) {
        return showJaktim;
    }

    function filterShowHideJaksel(feature, layer) {
        return showJaksel;
    }

    function filterShowHideJakut(feature, layer) {
        return showJakut;
    }

    function filterShowAll(feature, layer) {
        return showAll;
    }

    const map = L.map('map', {
        center: [-6.169918926996979, 106.83128184593068],
        zoom: 12
    });

    const tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
    tileLayer.addTo(map);

    function startVievMap(leaflet, maps, markerName = '') {
        if (markerName == 'jakpus') {
            leaflet.geoJSON(dataJakpus, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakpus
            }).addTo(maps);
        } else if (markerName == 'jaktim') {
            leaflet.geoJSON(dataJaktim, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJaktim
            }).addTo(maps);
        } else if (markerName == 'jakbar') {
            leaflet.geoJSON(dataJakbar, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakbar
            }).addTo(maps);
        } else if (markerName == 'jaksel') {
            leaflet.geoJSON(dataJaksel, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJaksel
            }).addTo(maps);
        } else if (markerName == 'jakut') {
            leaflet.geoJSON(dataJakut, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakut
            }).addTo(maps);
        } else {
            leaflet.geoJSON(dataJakpus, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakpus
            }).addTo(maps);

            leaflet.geoJSON(dataJaktim, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJaktim
            }).addTo(maps);

            leaflet.geoJSON(dataJakbar, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakbar
            }).addTo(maps);

            leaflet.geoJSON(dataJakut, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJakut
            }).addTo(maps);

            leaflet.geoJSON(dataJaksel, {
                pointToLayer: setCircleMarker,
                onEachFeature: setPopupContent,
                filter: filterShowHideJaksel
            }).addTo(maps);
        }
    }

    startVievMap(L, map);

    const checkboxJakpus = document.getElementById('jakpus');
    const checkboxJaktim = document.getElementById('jaktim');
    const checkboxJakut = document.getElementById('jakut');
    const checkboxJaksel = document.getElementById('jaksel');
    const checkboxJakbar = document.getElementById('jakbar');
    const checkboxAll = document.getElementById('all');

    checkboxJakbar.addEventListener('change', function(e) {
        showJakbar = e.target.checked;

        if (showJakbar) {
            map.stop();
            startVievMap(L, map, 'jakbar');
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker && layer.feature?.properties.WADMKK == Jakbar) {
                    checkboxAll.checked = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    checkboxJakpus.addEventListener('change', function(e) {
        showJakpus = e.target.checked;

        if (showJakpus) {
            map.stop();
            startVievMap(L, map, 'jakpus');
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker && layer.feature?.properties.WADMKK ==
                    Jakpus) {
                    checkboxAll.checked = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    checkboxJaktim.addEventListener('change', function(e) {
        showJaktim = e.target.checked;

        if (showJaktim) {
            map.stop();
            startVievMap(L, map, 'jaktim');
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker && layer.feature?.properties.WADMKK ==
                    Jaktim) {
                    checkboxAll.checked = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    checkboxJaksel.addEventListener('change', function(e) {
        showJaksel = e.target.checked;

        if (showJaksel) {
            map.stop();
            startVievMap(L, map, 'jaksel');
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker && layer.feature?.properties.WADMKK ==
                    Jaksel) {
                    checkboxAll.checked = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    checkboxJakut.addEventListener('change', function(e) {
        showJakut = e.target.checked;

        if (showJakut) {
            map.stop();
            startVievMap(L, map, 'jakut');
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker && layer.feature?.properties.WADMKK ==
                    Jakut) {
                    checkboxAll.checked = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    checkboxAll.addEventListener('change', function(e) {
        showAll = e.target.checked;

        if (showAll) {
            checkboxJakpus.checked = true;
            checkboxJaktim.checked = true;
            checkboxJakut.checked = true;
            checkboxJaksel.checked = true;
            checkboxJakbar.checked = true;
            showJakpus = true;
            showJaktim = true;
            showJakbar = true;
            showJaksel = true;
            showJakut = true;
            map.stop();
            startVievMap(L, map);
        } else {
            map.eachLayer(function(layer) {
                if (layer instanceof L.CircleMarker) {
                    checkboxJakpus.checked = false;
                    checkboxJaktim.checked = false;
                    checkboxJakut.checked = false;
                    checkboxJaksel.checked = false;
                    checkboxJakbar.checked = false;
                    showJakpus = false;
                    showJaktim = false;
                    showJakbar = false;
                    showJaksel = false;
                    showJakut = false;
                    map.removeLayer(layer);
                }
            });
        }
    });

    const schoolSearchInput = document.getElementById('schoolSearch');
    const searchResults = document.getElementById('searchResults');
    let isSearching = false; // Flag to check if a search is in progress

    schoolSearchInput.addEventListener('input', function() {
        const searchTerm = schoolSearchInput.value.toUpperCase();
        const matchingSchools = [];

        // Iterate through each layer on the map
        map.eachLayer(function(layer) {
            if (layer instanceof L.CircleMarker && layer.feature?.properties.NAMOBJ) {
                const schoolName = layer.feature.properties.NAMOBJ.toUpperCase();
                // Check if the school name contains the search term
                if (schoolName.includes(searchTerm)) {
                    matchingSchools.push(schoolName);
                }
            }
        });

        // Display matching schools in autocomplete dropdown
        displayAutocompleteResults(matchingSchools);

        // Set the flag based on whether there are matching results
        isSearching = matchingSchools.length > 0;
    });

    function displayAutocompleteResults(results) {
        if (isSearching) {
            searchResults.innerHTML = '';
            results.forEach(function(result) {
                const li = document.createElement('li');
                li.textContent = result;
                li.addEventListener('click', function() {
                    schoolSearchInput.value = result;
                    searchResults.innerHTML = ''; // Clear autocomplete results
                });
                searchResults.appendChild(li);
            });
            searchResults.style.display = 'block'; // Show the dropdown
        } else {
            // Hide the dropdown if there are no matching results
            searchResults.style.display = 'none';
        }
    }

    // Close the dropdown when clicking outside the input and results
    document.addEventListener('click', function(event) {
        if (!event.target.closest('#schoolSearch') && !event.target.closest('#searchResults')) {
            searchResults.style.display = 'none';
        }
    });

    function searchSchool() {
        const searchTerm = document.getElementById('schoolSearch').value.toUpperCase();

        let isMatchFound = false;

        // Iterate through each layer on the map
        if (searchTerm == '') {
            alert('Input Kosong! Masukkan nama sekolah');
        } else {
            map.eachLayer(function(layer) {
                checkboxJakpus.checked = false;
                checkboxJaktim.checked = false;
                checkboxJakut.checked = false;
                checkboxJaksel.checked = false;
                checkboxJakbar.checked = false;
                if (layer instanceof L.CircleMarker && layer.feature?.properties.NAMOBJ) {
                    const schoolName = layer.feature.properties.NAMOBJ.toUpperCase();
                    // Check if the school name contains the search term
                    if (schoolName.includes(searchTerm)) {
                        // Show the marker if the school name matches the search term
                        layer.setStyle({
                            opacity: 1,
                            fillOpacity: 0.8
                        });
                        isMatchFound = true;
                    } else {
                        // Hide the marker if the school name does not match the search term
                        layer.setStyle({
                            opacity: 0,
                            fillOpacity: 0
                        });
                    }
                }
            });
            if (!isMatchFound) {
                alert('Sekolah tidak ditemukan.');
            }
        }
    }
</script>