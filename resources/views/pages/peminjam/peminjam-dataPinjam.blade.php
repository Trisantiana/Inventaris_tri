@extends('layouts._peminjam')

@section('content')
	<div class="card-header bg-primary text-white">Data Peminjaman</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Barang</th>
						<th>Nama Peminjam</th>
						<th>Jumlah</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status Peminjaman</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($peminjam as $key =>  $peminjam)
						<tr>
							<td> {{ $key+1 }} </td>
							<td> {{ $peminjam->nama }} </td>
							<td> {{ $peminjam->nama_pegawai }} </td>
							<td> {{ $peminjam->jumlah }} </td>
							<td> {{ date('d-m-Y', strtotime($peminjam->tanggal_pinjam)) }} </td>
							<td> {{ date('d-m-Y', strtotime($peminjam->tanggal_kembali)) }} </td>
							<td>
								@if ($peminjam->status_peminjaman == 'dibooking')
									<span class="badge badge-danger">{{ $peminjam->status_peminjaman}}</span>
								@elseif($peminjam->status_peminjaman == 'sedang dipinjam')
									<span class="badge badge-warning">{{ $peminjam->status_peminjaman}}</span>
								@else
									<span class="badge badge-success">{{ $peminjam->status_peminjaman}}</span>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection