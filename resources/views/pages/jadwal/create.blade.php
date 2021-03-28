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
                    <form action="{{route('jadwal.store')}}" method="POST">
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
							<label>Nama Proyek</label>
							<select name="proyek_name" id="proyek_name" class="form-control @error('proyek_name') is-invalid @enderror">
								<option value=""> ** Daftar Proyek ** </option>
							@foreach($site as $lokasi)
								<option value="{{ $lokasi->id }}">{{ $lokasi->nama_proyek }}</option>
							@endforeach
							</select>
							@error('proyek_name') 
								<div class="text-danger">{{ $message }}</div> 
							@enderror
						</div>
                        <div class="form-group">
                            <label>Jadwal Pengerjaan</label>
                            <input type="date"
                                   name="jadwal_pengerjaan"
                                   value="{{ old('jadwal_pengerjaan') }}"
                                   class="form-control @error('jadwal_pengerjaan') is-invalid @enderror"/>
                                   @error('jadwal_pengerjaan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jadwal Estimasi</label>
                            <input type="date"
                                   name="jadwal_estimasi"
                                   value="{{ old('jadwal_estimasi') }}"
                                   class="form-control @error('jadwal_estimasi') is-invalid @enderror"/>
                                   @error('jadwal_estimasi') <div class="text-muted">{{ $message }}</div> @enderror
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