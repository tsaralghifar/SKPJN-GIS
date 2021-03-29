@extends('layouts.admin')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Form Pekerjaan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Form Pekerjaan</a></li>
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
            <a class="btn btn-primary btn-sm" title="Create" href="{{ route('pekerjaan.create') }}">
              Create
            </a>  
            <a class="btn btn-primary btn-sm" title="Print" target="blank" href="{{ route('pekerjaan.pdf') }}">
              Print
            </a>    
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pekerjaan</th>
                <th>Jenis Pekerjaan</th>
                <th>Anggaran</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @if($pekerjaan->count() <= 0)
              <tr>
                <td colspan="5" class="text-center">There is no data</td>
              </tr>
              @endif

              @foreach ($pekerjaan as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->proyek->nama_proyek }}</td>
                <td>{{ $data->jenis_pekerjaan }}</td>
                <td>{{ $data->perkiraan_anggaran }}</td>
                <td class="text-center">
                  <a href="{{ route('pekerjaan.edit', $data->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{ route('pekerjaan.destroy', $data->id) }}" method="post" class="d-inline">
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