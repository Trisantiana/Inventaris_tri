@extends('layouts._master')

@section('content')
<div class="card-header bg-primary text-white">
	<a href="{{ route('inventaris.index') }}" class="text-white"><i class="fa fa-arrow-left"></i></a> 
	<center><h4>Data Inventaris</h4></center> 
</div>

<div class="card-body">
	<div class="table-responsive">

		<table class="table table-striped table-data">
				<tr>
					<th>Nama</th>
					<td>:</td>
					<td>{{ $inventaris->nama }}</td>
				</tr>

				<tr>
					<th>Kode Inventaris</th>
					<td>:</td>
					<td>{{ $inventaris->kode_inventaris }}</td>
				</tr>

				<tr>
					<th>Jumlah</th>
					<td>:</td>
					<td>{{ $inventaris->jumlah }}</td>
				</tr>

				<tr>
					<th>Jenis</th>
					<td>:</td>
					<td>{{ $inventaris->jenis->nama_jenis }}</td>
				</tr>

				<tr>
					<th>Ruang</th>
					<td>:</td>
					<td>{{ $inventaris->ruang->nama_ruang }}</td>
				</tr>

				<tr>
					<th>Nama Petugas</th>
					<td>:</td>
					<td>{{ $inventaris->petugas->name }}</td>
				</tr>

				<tr>
					<th>Kondisi</th>
					<td>:</td>
					<td>{{ $inventaris->kondisi }}</td>
				</tr>

				<tr>
					<th>Keterangan</th>
					<td>:</td>
					<td>{{ $inventaris->keterangan }}</td>
				</tr>

				<tr>
					<th>Tanggal Register</th>
					<td>:</td>
					<td>{{ date('d-m-Y', strtotime($inventaris->tanggal_register)) }}</td>
				</tr>
		</table>
	</div>
</div>

@endsection