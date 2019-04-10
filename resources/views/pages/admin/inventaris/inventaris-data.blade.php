@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data inventaris
	<a href="{{ route('inventaris.create') }}"><i class="fa fa-plus pull-right text-white"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data nowrap dt-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama inventaris</th>
						<th>Kode inventaris</th>
						<th>Jumlah</th>
						<th>Jenis</th>
						<th>Ruang</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($inventaris as $key => $inventaris)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $inventaris->nama }}</td>
							<td>{{ $inventaris->kode_inventaris }}</td>
							<td>{{ $inventaris->jumlah }}</td>
							<td>{{ $inventaris->jenis->nama_jenis }}</td>
							<td>{{ $inventaris->ruang->nama_ruang }}</td>
							<td>{{ $inventaris->keterangan }}</td>
							<td>
								<a href="{{ route('inventaris.show', $inventaris->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
								<a href="{{ route('inventaris.edit', $inventaris->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
								<form action="{{ route('inventaris.destroy', $inventaris->id) }}" method="post">
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