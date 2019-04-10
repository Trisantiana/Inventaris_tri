@extends('layouts._operator')


@section('content')
	<div class="card-header bg-primary text-white">
	<a href="{{ route('peminjaman.index') }}" class="text-white"><i class="fa fa-arrow-left"></i></a>
	Data Peminjaman</div>

	<div class="card-body">
	{{-- <a href="{{ route('peminjaman.print') }}" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a> --}}
		<div class="table-responsive">
			<table class="table table-striped table-data">
				<tr>
					<th>Nama Peminjam</th>
					<td>:</td>
					<td>{{ strtoupper($peminjaman->nama_pegawai) }}</td>
				</tr>

				<tr>
					<th>Nama Inventaris</th>
					<td>:</td>
					<td>{{ $peminjaman->nama }}</td>
				</tr>

				<tr>
					<th>Tanggal Pinjam</th>
					<td>:</td>
					<td>{{ $peminjaman->tanggal_pinjam }}</td>
				</tr>

				<tr>
					<th>Tanggal Kembali</th>
					<td>:</td>
					<td>{{ $peminjaman->tanggal_kembali }}</td>
				</tr>

				<tr>
					<th>Jumlah</th>
					<td>:</td>
					<td>{{ $peminjaman->jumlah }}</td>
				</tr>

				<tr>
					<th>Status Peminjaman</th>
					<td>:</td>
					<td>{{ $peminjaman->status_peminjaman }}</td>
				</tr>

			</table>
		</div>
	</div>

@endsection