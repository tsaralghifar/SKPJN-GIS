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
                    <form action="{{route('penghambat.update', $penghambat->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Kejadian</label>
                            <input type="text"
                                   name="jenis_kejadian"
                                   value="{{ old('jenis_kejadian') ? old('jenis_kejadian') : $penghambat->jenis_kejadian }}"
                                   class="form-control @error('jenis_kejadian') is-invalid @enderror"/>
                                   @error('jenis_kejadian') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Akibat</label>
                            <input type="text"
                                   name="akibat"
                                   value="{{ old('akibat') ? old('akibat') : $penghambat->akibat }}"
                                   class="form-control @error('akibat') is-invalid @enderror"/>
                                   @error('akibat') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="datetime-local"
                                   name="jam"
                                   value="{{ old('jam') ? old('jam') : $penghambat->jam }}"
                                   class="form-control @error('jam') is-invalid @enderror"/>
                                   @error('jam') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Penanggung Jawab</label>
                            <input type="text"
                                   name="penanggung_jawab"
                                   value="{{ old('penanggung_jawab') ? old('penanggung_jawab') : $penghambat->penanggung_jawab }}"
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