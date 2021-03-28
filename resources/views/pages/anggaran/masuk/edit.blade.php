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
                    <form action="{{route('anggaran-masuk.update', $masuk->id)}}" method="POST">
                        @method('PUT')
                        @csrf
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
								<option value="{{ $lokasi->id }}" @if($masuk->id_site == $lokasi->id) selected @endif>{{ $lokasi->nama_proyek }}</option>
							@endforeach
							</select>
							@error('id_site') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
                    
                        <div class="form-group">
                            <label>Jumlah Masuk</label>
                            <input type="text"
                                   name="jumlah_masuk"
                                   value="{{ old('jumlah_masuk') ? old('jumlah_masuk') : $masuk->jumlah_masuk }}"
                                   class="form-control @error('jumlah_masuk') is-invalid @enderror"/>
                                   @error('jumlah_masuk') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="datetime-local"
                                   name="waktu"
                                   value="{{ old('waktu') ? old('waktu') : date('Y-m-d h:i', strtotime($masuk->waktu)) }}"
                                   class="form-control @error('waktu') is-invalid @enderror"/>
                                   @error('waktu') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Penanggung Jawab</label>
                            <input type="text"
                                   name="penanggung_jawab"
                                   value="{{ old('penanggung_jawab') ? old('penanggung_jawab') : $masuk->penanggung_jawab }}"
                                   class="form-control @error('penanggung_jawab') is-invalid @enderror"/>
                                   @error('penanggung_jawab') <div class="text-muted">{{ $message }}</div> @enderror
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