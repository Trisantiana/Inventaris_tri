@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data Pegawai
	<a href="{{ route('pegawai.create') }}" ><i class="fa fa-plus text-white pull-right"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama pegawai</th>
						<th>NIP</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pegawai as $key => $pegawai)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $pegawai->nama_pegawai }}</td>
							<td>{{ $pegawai->nip }}</td>
							<td>{{ $pegawai->alamat }}</td>
							<td>
								<a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
								<form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="post">
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