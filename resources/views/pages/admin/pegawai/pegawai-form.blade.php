@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Pegawai</div>
	<div class="card-body">
		<form action="{{ route('pegawai.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nama pegawai</label>
					<input type="text" name="nama_pegawai" class="form-control" placeholder="Nama pegawai" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">NIP</label>
					<input type="text" name="nip" class="form-control" placeholder="NIP" required="">
				</div>

				<div class="form-group col-md-12">
					<label for="">Alamat</label>
					<textarea name="alamat" id="" cols="30" rows="3" class="form-control" placeholder="Alamat"></textarea>
				</div>

				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
					<button type="reset" class="btn btn-warning"><i class="fa fa-repeat"></i></button>
				</div>
			</div>
		</form>
	</div>
@endsection