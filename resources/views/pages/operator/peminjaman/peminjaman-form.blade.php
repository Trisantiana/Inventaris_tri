@extends('layouts._operator')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Peminjam</div>
	<div class="card-body">
		<form action="{{ route('operator.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Nama Inventaris</label>
					<select name="id_inventaris" class="form-control select2" id="">
						<option value="">Cari Barang ....</option>
						@foreach ($inventaris as $inventaris)
							<option value="{{ $inventaris->id }}"> {{ $inventaris->nama }} </option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-md-12">
					<label for="">Nama Peminjam</label>
					<select name="id_pegawai" class="form-control select2" id="">
						<option value="">Cari Nama Peminjam ....</option>
						@foreach ($pegawai as $pegawai)
							<option value="{{ $pegawai->id }}"> {{ $pegawai->nama_pegawai }} </option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="">Jumlah</label>
					<input type="number" class="form-control" placeholder="Jumlah" name="jumlah">
				</div>

				<div class="form-group col-md-6">
					<label for="">Tanggal Kembali</label>
					<input type="date" name="tanggal_kembali" class="form-control">
				</div>

				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-primary">Pinjam</button>
				</div>
			</div>
		</form>
	</div>
@endsection