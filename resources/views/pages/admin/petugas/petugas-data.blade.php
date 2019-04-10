@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data Petugas
		<a href="{{ route('petugas.create') }}" class="pull-right text-white"><i class="fa fa-plus"></i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<thead>
					<tr>
						<td>#</td>
						<td>Nama</td>
						<td>Username</td>
						<td>Level</td>
					</tr>
				</thead>

				<tbody>
					@foreach ($petugas as $key => $petugas)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $petugas->name }}</td>
							<td>{{ $petugas->username }}</td>
							<td>{{ $petugas->level->nama_level }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection