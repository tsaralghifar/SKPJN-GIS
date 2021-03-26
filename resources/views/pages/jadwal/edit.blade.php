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
                    <form action="{{route('jadwal.update', $jadwal->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Nama Proyek</label>
                            <input type="text"
                                   name="proyek_name"
                                   value="{{ old('proyek_name') ? old('proyek_name') : $jadwal->proyek_name }}"
                                   class="form-control @error('proyek_name') is-invalid @enderror"/>
                                   @error('proyek_name') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jadwal Pengerjaan</label>
                            <input type="date"
                                   name="jadwal_pengerjaan"
                                   value="{{ old('jadwal_pengerjaan') ? old('jadwal_pengerjaan') : $jadwal->jadwal_pengerjaan }}"
                                   class="form-control @error('jadwal_pengerjaan') is-invalid @enderror"/>
                                   @error('jadwal_pengerjaan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jadwal Estimasi</label>
                            <input type="date"
                                   name="jadwal_estimasi"
                                   value="{{ old('jadwal_estimasi') ? old('jadwal_estimasi') : $jadwal->jadwal_estimasi }}"
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