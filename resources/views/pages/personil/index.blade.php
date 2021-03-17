@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
            <a href="{{route('personil.create')}}" class="btn btn-success">Create</a>
            <table class="table table-bordered mt-4">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Personil</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Lokasi Personil</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                    @foreach ($personil as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>{{$data->personel}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->lokasi_personil}}</td>
                    <td>
                        
                                <a href="{{ route('personil.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            
                                <form action="{{ route('personil.destroy', $data->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
    </main>
@endsection