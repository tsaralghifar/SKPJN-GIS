@extends('layouts.admin')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Site Proyek</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Site Proyek</a></li>
					<li class="breadcrumb-item active">Create</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					GIS MAP
				</div>
				<div class="card-body">
					<div id="map" style="width: 100%; height: 75vh;"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					Form
				</div>
				<div class="card-body">
					<form action="{{ route('site.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label>Koordinat Proyek</label>
							<input type="text"
								id="koordinat"
								name="koordinat"
								value="{{ old('koordinat') }}"
								class="form-control @error('koordinat') is-invalid @enderror" readonly />
							@error('koordinat') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
						<div class="form-group">
							<label>Nama Proyek</label>
							<input type="text"
								name="nama_proyek"
								value="{{ old('nama_proyek') }}"
								class="form-control @error('nama_proyek') is-invalid @enderror" />
							@error('nama_proyek') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
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
@endsection

@section('javascript-section')
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
    center: [-3.207609123297818, 115.34027049906199],
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
    var curLocation = [-3.017003314867774, 115.07659871338554];
    map.attributionControl.setPrefix(false);

    var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    var marker = new L.marker(curLocation, {
        draggable : 'true',
        icon: greenIcon
    });
    map.addLayer(marker);
    // get drag coordinat
    marker.on('dragend',function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true',
        }).bindPopup(position).update();
        $("#koordinat").val(position.lat + "," + position.lng).keyup();
    })
    // get coordinat onclick
    var posisi = document.querySelector("[name=koordinat]");
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