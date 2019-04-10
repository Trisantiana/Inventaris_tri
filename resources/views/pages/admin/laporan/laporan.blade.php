@extends('layouts._master')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan Stok</div>
			<div class="card-body">
				<p>Note: Laporan Stok Jumlah Barang</p><br>
				<button type="button" class="btn btn-primary" onclick="popup('{{ route('laporan.stok') }}')" ><i class="fa fa-eye"></i> Lihat Data</button>
				<button type="button" class="btn btn-primary" onclick="popup('{{ route('laporan.stok.print') }}')" ><i class="fa fa-print"></i> Cetak</button>
				{{-- <a href="{{ route('laporan.stok') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Data</a>
				<a href="{{ route('laporan.stok.print') }}" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a> --}}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan Peminjaman</div>
			<div class="card-body">
				<p>Note: Laporan Barang Yang Dipinjam</p>
				<button type="button" class="btn btn-sm btn-primary"  onclick="popup('{{ route('laporan.peminjaman') }}')" ><i class="fa fa-eye"></i> Lihat Data</button>
				<button type="button" class="btn btn-sm btn-primary"  onclick="popup('{{ route('laporan.peminjaman.print') }}')" ><i class="fa fa-print"></i> Cetak</button> <br>
				<button type="button" class="btn btn-sm btn-primary"  onclick="popup('{{ route('laporan.semuaPeminjaman') }}')" ><i class="fa fa-eye"></i> Semua Data</button>
				{{-- <a href="{{ route('laporan.peminjaman') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Data</a>
				<a href="{{ route('laporan.peminjaman.print') }}" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a> --}}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan Barang</div>
			<div class="card-body">
				<p>Note: Laporan Barang Yang Kondisinya Baik</p>
				<button type="button" class="btn btn-primary"  onclick="popup('{{ route('laporan.peminjaman.kondisi') }}')" ><i class="fa fa-eye"></i> Lihat Data</button>
				{{-- <button type="button" class="btn btn-primary"  onclick="popup('{{ route('laporan.peminjaman.kondisi.print') }}')" ><i class="fa fa-eye"></i> Lihat Data</button> --}}
				{{-- <a href="{{ route('laporan.peminjaman.kondisi') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Data</a>
				<a href="{{ route('laporan.peminjaman.print') }}" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a> --}}
			</div>
		</div>
	</div>



	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan peminjaman</div>
			<div class="card-body">
				<p>Note: Laporan Peminjaman hari ini</p>
				<button type="button" class="btn btn-primary" onclick="popup('{{ route('laporan.tanggal') }}')"><i class="fa fa-eye"></i> Lihat Data </button>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan peminjam</div>
			<div class="card-body">
				<p>Note: Laporan Peminjaman yang kembali hari ini</p>
				<button type="button" class="btn btn-primary" onclick="popup('{{ route('laporan.tanggalKembali') }}')"><i class="fa fa-eye"></i> Lihat Data </button>
			</div>
		</div>
	</div>

	{{-- <div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">Laporan Barang Sering Dipinjam</div>
			<div class="card-body">
				<p>Note: Laporan Barang Yang Sering Dipinjam</p>
				<button type="button" class="btn btn-primary" onclick="popup('{{ route('laporan.barangSeringDipinjam') }}')"><i class="fa fa-eye"></i> Lihat Data </button>
			</div>
		</div>
	</div> --}}
</div>

@endsection