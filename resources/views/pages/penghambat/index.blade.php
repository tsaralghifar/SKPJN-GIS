@extends('layouts.admin')
@section('content')

<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Penghambat</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Penghambat</a></li>
					<li class="breadcrumb-item active">List</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List</h3>

          <div class="text-right">
            <a class="btn btn-primary btn-sm" title="Create" href="{{ route('penghambat.create') }}">
              Create
            </a>  
            <a class="btn btn-primary btn-sm" title="Print" target="blank" href="{{ route('penghambat.pdf') }}">
              Print
            </a>     
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kejadian</th>
                <th scope="col">Akibat</th>
                <th scope="col">Jam</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @if($penghambat->count() <= 0)
              <tr>
                <td colspan="5" class="text-center">There is no data</td>
              </tr>
              @endif

              @foreach ($penghambat as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$data->jenis_kejadian}}</td>
                <td>{{$data->akibat}}</td>
                <td>{{$data->jam}}</td>
                <td>{{$data->penanggung_jawab}}</td>
                <td class="text-center">
                  <a href="{{ route('penghambat.edit', $data->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{ route('penghambat.destroy', $data->id) }}" method="post" class="d-inline">
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
        </div>
      </div>
    </div>
  </div>
</div>

    
@endsection