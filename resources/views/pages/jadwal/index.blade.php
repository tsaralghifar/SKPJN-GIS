@extends('layouts.admin')
@section('content')

<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Jadwal Pengerjaan Proyek</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Jadwal Pengerjaan Proyek</a></li>
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
            <a class="btn btn-primary btn-sm" title="Create" href="{{ route('jadwal.create')}}">
              Create
            </a>
            <a class="btn btn-primary btn-sm" target="_blank" title="Print" href="{{ route('jadwal.pdf') }}">
              Print
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Proyek</th>
                <th scope="col">Jadwal Pengerjaan</th>
                <th scope="col">Jadwal Estimasi</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @if($jadwal->count() <= 0)
              <tr>
                <td colspan="5" class="text-center">There is no data</td>
              </tr>
              @endif

              @foreach ($jadwal as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->proyek->nama_proyek }}</td>
                <td>{{ $data->jadwal_pengerjaan }}</td>
                <td>{{ $data->jadwal_estimasi }}</td>
                <td class="text-center">
                  <a href="{{ route('jadwal.edit', $data->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{ route('jadwal.destroy', $data->id) }}" method="post" class="d-inline">
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