@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-10 col-sm-12 mt-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Form
                </div>
                <div class="card-body">
                    <form action="{{route('keluar.update', $keluar->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Jumlah Keluar</label>
                            <input type="text"
                                   name="jumlah_keluar"
                                   value="{{ old('jumlah_keluar') ? old('jumlah_keluar') : $keluar->jumlah_keluar }}"
                                   class="form-control @error('jumlah_keluar') is-invalid @enderror"/>
                                   @error('jumlah_keluar') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="datetime-local"
                                   name="waktu"
                                   value="{{ old('waktu') ? old('waktu') : $keluar->waktu }}"
                                   class="form-control @error('waktu') is-invalid @enderror"/>
                                   @error('waktu') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Penanggung Jawab</label>
                            <input type="text"
                                   name="penanggung_jawab"
                                   value="{{ old('penanggung_jawab') ? old('penanggung_jawab') : $keluar->penanggung_jawab }}"
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