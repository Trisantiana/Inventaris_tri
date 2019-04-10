@extends('layouts._master')

@section('content')
<div class="card-header bg-primary text-white">Form Edit Jenis</div>
<div class="card-body">
	<a href="{{ route('jenis.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i></a>
	<form action="{{ route('jenis.update', $jenis->id) }}" method="post">
		@csrf
		@method('put')
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Nama Jenis</label>
				<input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}" >
			</div>

			<div class="form-group col-md-6">
				<label for="">Kode Jenis</label>
				<input type="text" name="kode_jenis" class="form-control" value="{{ $jenis->kode_jenis }}" >
			</div>

			<div class="form-group col-md-12">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="{{ $jenis->keterangan }}">
			</div>

			<div class="form-group col-md-6">

				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i></button>

			</div>
		</div>
	</form>

</div>
@endsection