@extends('layouts._master')

@section('content')
<div class="card-header bg-primary text-white">Form Edit pegawai</div>
<div class="card-body">
	<a href="{{ route('pegawai.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i></a>
	<form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
		@csrf
		@method('put')
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Nama pegawai</label>
				<input type="text" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}" >
			</div>

			<div class="form-group col-md-6">
				<label for="">NIP</label>
				<input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" readonly="" >
			</div>

			<div class="form-group col-md-12">
				<label for="">Alamat</label>
				<input type="text" name="alamat" class="form-control" value="{{ $pegawai->alamat }}">
			</div>

			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i></button>
			</div>
		</div>
	</form>
</div>
@endsection