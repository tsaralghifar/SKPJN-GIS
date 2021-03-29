@extends('layouts.admin')
@section('content')

<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Info Sewa Alat</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Info Sewa Alat</a></li>
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
            <a class="btn btn-primary btn-sm" title="Create" href="{{ route('sewa-alat.create') }}">
              Create
            </a>
            <a class="btn btn-primary btn-sm" target="_blank" title="Print" href="{{ route('sewa-alat.pdf') }}">
              Print
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Alat</th>
                <th>Tanggal Sewa</th>
                <th>Keperluan</th>
                <th>Biaya Sewa</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @if($sewa->count() <= 0)
              <tr>
                <td colspan="6" class="text-center">There is no data</td>
              </tr>
              @endif

              @foreach ($sewa as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$data->jenis_alat}}</td>
                <td>{{$data->tanggal_sewa}}</td>
                <td>{{$data->keperluan}}</td>
                <td>@rupiah($data->biaya_sewa)</td>
                <td class="text-center">
                  <a href="{{ route('sewa-alat.edit', $data->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{ route('sewa-alat.destroy', $data->id) }}" method="post" class="d-inline">
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