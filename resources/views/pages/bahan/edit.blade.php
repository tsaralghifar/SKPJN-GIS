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
                    <form action="{{route('bahan.update', $bahan->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Material</label>
                            <input type="text"
                                   name="material"
                                   value="{{ old('material') ? old('material') : $bahan->material }}"
                                   class="form-control @error('material') is-invalid @enderror"/>
                                   @error('material') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text"
                                   name="satuan"
                                   value="{{ old('satuan') ? old('satuan') : $bahan->satuan }}"
                                   class="form-control @error('satuan') is-invalid @enderror"/>
                                   @error('satuan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="text"
                                   name="volume"
                                   value="{{ old('volume') ? old('volume') : $bahan->volume }}"
                                   class="form-control @error('volume') is-invalid @enderror"/>
                                   @error('volume') <div class="text-muted">{{ $message }}</div> @enderror
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