@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-10 col-sm-12 mt-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Form
                </div>
                <div class="card-body">
                    <form action="{{route('pekerjaan.update', $pekerjaan->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
							<label>Nama Pekerjaan</label>
							<select name="id_site" id="id_site" class="form-control @error('id_site') is-invalid @enderror">
								<option value=""> ** Daftar Proyek ** </option>
							@foreach($site as $lokasi)
								<option value="{{ $lokasi->id }}" @if($pekerjaan->id_site == $lokasi->id) selected @endif>{{ $lokasi->nama_proyek }}</option>
							@endforeach
							</select>
							@error('id_site') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
                        <div class="form-group">
							<label>Jenis Pekerjaan</label>
							<input type="text"
								name="jenis_pekerjaan"
								value="{{ old('jenis_pekerjaan') ? old('jenis_pekerjaan') : $pekerjaan->jenis_pekerjaan }}"
								class="form-control @error('nama_proyek') is-invalid @enderror" />
							@error('jenis_pekerjaan') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
                        <div class="form-group">
							<label>Perkiraan Anggaran</label>
							<input type="number"
								name="perkiraan_anggaran"
								value="{{ old('perkiraan_anggaran') ? old('perkiraan_anggaran') : $pekerjaan->perkiraan_anggaran }}"
								class="form-control @error('perkiraan_anggaran') is-invalid @enderror" />
							@error('perkiraan_anggaran') 
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
</script>
@endsection