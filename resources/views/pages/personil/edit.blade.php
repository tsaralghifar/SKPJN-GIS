@extends('layouts.admin')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Personel</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Personel</a></li>
					<li class="breadcrumb-item active">Edit</li>
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
					<form action="{{ route('personil.update', $personil->id) }}" method="POST">
						@csrf
						@method('PUT')
						{{-- @if ($idEdit)
								wire:submit.prevent="updateLocation"
						@else
								wire:submit.prevent="saveLocation"
						@endif --}}
						<div class="form-group">
							<label>Lokasi</label>
							<select name="id_site" id="id_site" class="form-control @error('id_site') is-invalid @enderror">
								<option value=""> ** Daftar Proyek ** </option>
							@foreach($site as $lokasi)
								<option value="{{ $lokasi->id }}" @if($personil->id_site == $lokasi->id) selected @endif>{{ $lokasi->nama_proyek }} | {{ $lokasi->koordinat }}</option>
							@endforeach
							</select>
							@error('id_site') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
						<input type="hidden" name="site" id="site" value="{{ $personil->lokasi->koordinat }}">
						<div class="form-group">
							<label>Personil</label>
							<input type="text"
								name="personel"
								value="{{ old('personel') ? old('personel') : $personil->personel }}"
								class="form-control @error('personel') is-invalid @enderror" />
							@error('personel') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="text"
								name="jumlah"
								value="{{ old('jumlah') ? old('jumlah') : $personil->jumlah }}"
								class="form-control @error('jumlah') is-invalid @enderror" />
							@error('jumlah') 
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
		$(document).ready(function() {
			$('#id_site').select2({
				theme: 'bootstrap4',
				width: '100%'
			});
		});

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
    center: [{{ $personil->lokasi->koordinat }}],
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
    var curLocation = [{{ $personil->lokasi->koordinat }}];
    map.attributionControl.setPrefix(false);

    var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    });

    var marker = new L.marker(curLocation,{
        draggable : 'true',
        icon : greenIcon
    });
    map.addLayer(marker);

		$("#id_site").on('change', function() {

			var siteId = $('#id_site option:selected').text();

			let getId = siteId.split(' | ');

			$('#site').val(getId[1]);
			
			$(".leaflet-marker-icon").remove();
			$(".leaflet-popup").remove();

			var defLocation = [-3.207609123297818, 115.34027049906199];
			var curLocation;

			var coordinate = $("#site").val();
			var stringCoordinate = coordinate.split(',');

			if (coordinate) { 
				curLocation = [stringCoordinate[0], stringCoordinate[1]];
			} else {
				curLocation = defLocation;
			}

			var marker = new L.marker(curLocation, {
				draggable : false,
				icon: greenIcon
			});

			if (curLocation !== defLocation) map.addLayer(marker);
		});

    // get coordinat onclick
    // var posisi = document.querySelector("[name=lokasi_personil]");
    // map.on("click",function(event){
    //     var lat = event.latlng.lat;
    //     var lng = event.latlng.lng;

    //     if (!marker)
    //     {
    //         marker = L.marker(event.latlng).addTo(map);
    //     }else{
    //         marker.setLatLng(event.latlng);
    //     }

    //     posisi.value = lat + "," + lng;
    // });
    
</script>
@endsection