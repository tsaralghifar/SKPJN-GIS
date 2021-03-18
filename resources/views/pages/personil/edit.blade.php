@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-white">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    GIS MAP
                </div>
                <div class="card-body">
                    <div id="map" style="width: 100%; height: 75vh;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Form
                </div>
                <div class="card-body">
                    <form action="{{route('personil.update', $personil->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text"
                                   id="lokasi_personil"
                                   name="lokasi_personil"
                                   value="{{ old('lokasi_personil') ? old('lokasi_personil') : $personil->lokasi_personil }}"
                                   class="form-control @error('lokasi_personil') is-invalid @enderror"/>
                                   @error('lokasi_personil') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Personil</label>
                            <input type="text"
                                   name="personel"
                                   value="{{ old('personel') ? old('personel') : $personil->personel }}"
                                   class="form-control @error('personel') is-invalid @enderror"/>
                                   @error('personel') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text"
                                   name="jumlah"
                                   value="{{ old('jumlah') ? old('jumlah') : $personil->jumlah }}"
                                   class="form-control @error('jumlah') is-invalid @enderror"/>
                                   @error('jumlah') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark text-white btn-block">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

    var map = L.map('map', {
    center: [{{$personil->lokasi_personil}}],
    zoom: 9,
    layers: [peta1]
    });

    var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4
    };

    L.control.layers(baseMaps).addTo(map);

    //   L.marker([-3.017003314867774, 115.07659871338554]).addTo(map);
    // get coordinat
    var curLocation = [{{$personil->lokasi_personil}}];
    map.attributionControl.setPrefix(false);

    var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    var marker = new L.marker(curLocation,{
        draggable : 'true',
        icon : greenIcon
    });
    map.addLayer(marker);
    // get drag coordinat
    marker.on('dragend',function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true',
        }).bindPopup(position).update();
        $("#lokasi_personil").val(position.lat + "," + position.lng).keyup();
    })
    // get coordinat onclick
    var posisi = document.querySelector("[name=lokasi_personil]");
    map.on("click",function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;

        if (!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        }else{
            marker.setLatLng(event.latlng);
        }

        posisi.value = lat + "," + lng;
    });
    
</script>
@endsection