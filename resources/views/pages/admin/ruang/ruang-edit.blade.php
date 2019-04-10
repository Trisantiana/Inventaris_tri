@extends('layouts._master')

@section('content')
<div class="card-header bg-primary text-white">Form Edit Ruang</div>
<div class="card-body">
	<a href="{{ route('ruang.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i></a>
	<form action="{{ route('ruang.update', $ruang->id) }}" method="post">
		@csrf
		@method('put')
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Nama Ruang</label>
				<input type="text" name="nama_ruang" class="form-control" value="{{ $ruang->nama_ruang }}" >
			</div>

			<div class="form-group col-md-6">
				<label for="">kode Ruang</label>
				<input type="text" name="kode_ruang" class="form-control" value="{{ $ruang->kode_ruang }}" >
			</div>

			<div class="form-group col-md-12">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="{{ $ruang->keterangan }}">
			</div>

			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-refresh "></i></button>
			</div>
		</div>
	</form>
</div>
@endsection