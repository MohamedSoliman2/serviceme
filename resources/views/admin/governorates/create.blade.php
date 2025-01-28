@section('title', 'إضافة محافظه')
@section('description', 'إضافة محافظه')
@extends('layout.parentdash')

@push('styles')
    {{-- Add Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    {{-- Add Leaflet Geocoder CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <style>
        .custom-search-control {
            background: white;
            padding: 8px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }

        .search-input {
            width: 250px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-results {
            margin-top: 5px;
            max-height: 200px;
            overflow-y: auto;
        }

        .search-result-item {
            padding: 8px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        .search-result-item:hover {
            background-color: #f5f5f5;
        }
    </style>
@endpush

@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">إضافة محافظه</h4>
                        <div class="">
                            <a href="{{ route('governorates.index') }}" class="btn btn-primary">
                                <span class="uil uil-arrow-left"></span>
                                العوده الى المحافظات
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('governorates.store') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">المحافظه</label>
                                    <input type="text" name="name" id="name" placeholder="اسم المحافظه"
                                        class="form-control">
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">حدد موقع المحافظة على الخريطة</label>
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                </div>

                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">

                                <button type="submit" class="btn btn-primary">إضافة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{-- Add Leaflet JavaScript --}}
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        {{-- Add Leaflet Geocoder JavaScript --}}
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

        <script>
            // Initialize the map
            var map = L.map('map').setView([30.033333, 31.233334], 6); // Centered on Egypt

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Create custom search control
            var searchControl = L.Control.extend({
                options: {
                    position: 'topleft'
                },

                onAdd: function(map) {
                    var container = L.DomUtil.create('div', 'custom-search-control');
                    var input = L.DomUtil.create('input', 'search-input', container);
                    var resultsDiv = L.DomUtil.create('div', 'search-results', container);

                    input.type = 'text';
                    input.placeholder = 'ابحث عن موقع...';

                    L.DomEvent.disableClickPropagation(container);

                    input.addEventListener('input', debounce(function(e) {

                        fetch(
                                `https://nominatim.openstreetmap.org/search?format=json&q=${e.target.value}&countrycodes=eg`
                                )
                            .then(response => response.json())
                            .then(data => {
                                resultsDiv.innerHTML = '';
                                data.forEach(result => {
                                    var item = L.DomUtil.create('div', 'search-result-item',
                                        resultsDiv);
                                    item.innerHTML = result.display_name;
                                    item.addEventListener('click', function() {
                                        var lat = parseFloat(result.lat);
                                        var lon = parseFloat(result.lon);

                                        // Remove existing marker if any
                                        if (marker) {
                                            map.removeLayer(marker);
                                        }

                                        // Add new marker
                                        marker = L.marker([lat, lon]).addTo(map);

                                        // Update hidden inputs
                                        document.getElementById('latitude').value =
                                            lat;
                                        document.getElementById('longitude').value =
                                            lon;

                                        // Center map on location
                                        map.setView([lat, lon], 13);

                                        // Clear results
                                        resultsDiv.innerHTML = '';
                                        input.value = result.display_name;
                                    });
                                });
                            });
                    }, 300));

                    return container;
                }
            });

            // Add the custom search control to the map
            map.addControl(new searchControl());

            // Initialize marker variable
            var marker;

            // Handle map click
            map.on('click', function(e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(e.latlng).addTo(map);
                document.getElementById('latitude').value = e.latlng.lat;
                document.getElementById('longitude').value = e.latlng.lng;
            });

            // Debounce function to limit API calls
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }
        </script>
    @endpush
@endsection
