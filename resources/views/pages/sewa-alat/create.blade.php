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
                    <form action="{{route('sewa-alat.store')}}" method="POST">
                        @csrf
                        {{-- @if ($idEdit)
                            wire:submit.prevent="updateLocation"
                        @else
                            wire:submit.prevent="saveLocation"
                        @endif --}}
                    
                        <div class="form-group">
                            <label>Jenis Alat</label>
                            <input type="text"
                                   name="jenis_alat"
                                   value="{{ old('jenis_alat') }}"
                                   class="form-control @error('jenis_alat') is-invalid @enderror"/>
                                   @error('jenis_alat') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Sewa</label>
                            <input type="date"
                                   name="tanggal_sewa"
                                   value="{{ old('tanggal_sewa') }}"
                                   class="form-control @error('tanggal_sewa') is-invalid @enderror"/>
                                   @error('tanggal_sewa') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <input type="text"
                                   name="keperluan"
                                   value="{{ old('keperluan') }}"
                                   class="form-control @error('keperluan') is-invalid @enderror"/>
                                   @error('keperluan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Biaya Sewa</label>
                            <input type="number"
                                   name="biaya_sewa"
                                   value="{{ old('biaya_sewa') }}"
                                   class="form-control @error('biaya_sewa') is-invalid @enderror"/>
                                   @error('biaya_sewa') <div class="text-muted">{{ $message }}</div> @enderror
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