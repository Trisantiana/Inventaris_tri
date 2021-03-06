@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Ruang</div>
	<div class="card-body">
		<form action="{{ route('ruang.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nama Ruang</label>
					<input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">kode Ruang</label>
					<input type="text" name="kode_ruang" class="form-control" placeholder="kode Ruang" required="">
				</div>

				<div class="form-group col-md-12">
					<label for="">Keterangan</label>
					<textarea name="keterangan" id="" cols="30" rows="3" class="form-control" placeholder="Keterangan"></textarea>
				</div>

				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
					<button type="reset" class="btn btn-warning"><i class="fa fa-repeat"></i></button>
				</div>
			</div>
		</form>
	</div>
@endsection