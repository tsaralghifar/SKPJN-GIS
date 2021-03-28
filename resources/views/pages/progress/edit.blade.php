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
                    <form action="{{route('progress.update', $progress->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
							<label>Nama Proyek</label>
							<select name="id_proyek" id="id_proyek" class="form-control @error('id_proyek') is-invalid @enderror">
								<option value=""> ** Daftar Proyek ** </option>
							@foreach($site as $lokasi)
								<option value="{{ $lokasi->id }}" @if($progress->id_proyek == $lokasi->id) selected @endif>{{ $lokasi->nama_proyek }}</option>
							@endforeach
							</select>
							@error('id_proyek') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date"
                                   name="tanggal_progress"
                                   value="{{ old('tanggal_progress') ? old('tanggal_progress') : $progress->tanggal_progress }}"
                                   class="form-control @error('tanggal_progress') is-invalid @enderror"/>
                                   @error('tanggal_progress') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Kemajuan</label>
                            <input type="text"
                                   name="kemajuan"
                                   value="{{ old('kemajuan') ? old('kemajuan') : $progress->kemajuan }}"
                                   class="form-control @error('kemajuan') is-invalid @enderror"/>
                                   @error('kemajuan') <div class="text-muted">{{ $message }}</div> @enderror
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