<div>
    @push('styles')

        <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>
        <script data-navigate-once
                src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>
        <style>
            #map {
                height: 300px; /* Set a fixed height */
                width: 100%;
                border-radius: 15px; /* Rounded corners */
                border: 1px solid #657ced; /* A modern blue border */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Subtle shadow */
                background-color: #ffffff; /* Light grey background before the map loads */
                position: relative;
                overflow: hidden; /* Hide any overflowing content */
                margin-top: 15px;
            }

            /* Optional: Add a loading indicator */
            #map::before {
                content: 'درحال آماده سازی نقشه...';
                color: #6f5bf1;
                font-size: 12px;
                font-family: 'tahoma', sans-serif;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            #map.ready::before {
                display: none; /* Hide the loading indicator once the map is ready */
            }
        </style>
    @endpush

    <script data-navigate-track>
        function initMap() {
            const neshanMap = new L.Map("map", {
                key: "{{ config('neshan.Api-web_key') }}",
                maptype: "osm-bright",
                poi: true,
                traffic: true,
                center: [30.6662659463233, 51.58115386962891],
                zoom: 14,
            });

            // Add a marker to the map
            let marker = L.marker([35.699756, 51.338076]).addTo(neshanMap);

            // Listen for map clicks
            neshanMap.on('click', function (e) {

                const {lat, lng} = e.latlng;

                marker.setLatLng([lat, lng]);

                @this.
                set('latitude', lat);
                @this.
                set('longitude', lng);
                ;
            });
        }
    </script>

    <script>


        document.addEventListener('livewire:navigated', (event) => {

            initMap();

        })
        document.addEventListener('DOMContentLoaded', initMap);


        document.addEventListener('livewire:navigated', () => {
            initMap();
        }, {once: true})

    </script>


    @if(Auth::user()->hasBuilding())

        has building

    @else

        @include('livewire.app.services.building.inc.building-register')

    @endif

</div>
