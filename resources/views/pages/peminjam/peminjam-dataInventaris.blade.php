@extends('layouts._peminjam')

@section('content')

<div class="row">

	<div class="col-md-12">
		<div class="card-header bg-primary text-white">
			Data Inventaris
		</div>
		<div class="card-body">
			<table class="table table-striped table-data">
				<tr>
					<th>#</th>
					<th>Nama Inventaris</th>
					<th>Jenis</th>
					<th>Ruang</th>
					<th>#</th>

				</tr>
				@foreach ($dataInven as $key => $dataInven)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $dataInven->nama }}</td>
					<td>{{ $dataInven->jenis->nama_jenis }}</td>
					<td>{{ $dataInven->ruang->nama_ruang }}</td>
					<td>
						{{-- <a href="#" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
						<a href="{{ route('peminjam.create', $dataInven->id) }}" class="btn btn-sm btn-primary">Pinjam</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	@endforeach
</div>

@endsection