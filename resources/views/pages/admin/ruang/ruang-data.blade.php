@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data Ruang
	<a href="{{ route('ruang.create') }}" ><i class="fa fa-plus text-white pull-right"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Ruang</th>
						<th>Kode Ruang</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($ruang as $key => $ruang)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $ruang->nama_ruang }}</td>
							<td>{{ $ruang->kode_ruang }}</td>
							<td>{{ $ruang->keterangan }}</td>
							<td>
								<a href="{{ route('ruang.edit', $ruang->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
								<form action="{{ route('ruang.destroy', $ruang->id) }}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini?')" ><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection