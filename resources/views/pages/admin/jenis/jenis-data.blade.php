@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data Jenis
	<a href="{{ route('jenis.create') }}"><i class="fa fa-plus pull-right text-white"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Jenis</th>
						<th>Kode Jenis</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($jenis as $key => $jenis)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $jenis->nama_jenis }}</td>
							<td>{{ $jenis->kode_jenis }}</td>
							<td>{{ $jenis->keterangan }}</td>
							<td>
								<a href="{{ route('jenis.edit', $jenis->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
								<form action="{{ route('jenis.destroy', $jenis->id) }}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection