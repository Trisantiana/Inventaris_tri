@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Jenis</div>
	<div class="card-body">
		<form action="{{ route('jenis.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nama Jenis</label>
					<input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Kode Jenis</label>
					<input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis" required="">
				</div>

				<div class="form-group col-md-12">
					<label for="">Keterangan</label>
					<textarea name="keterangan" class="form-control" id="" cols="30" rows="3" placeholder="Keterangan" required=""></textarea>
				</div>

				<div class="form-group col-md-6">
					
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
					<button type="reset" class="btn btn-warning"><i class="fa fa-repeat"></i></button>
				</div>
			</div>
		</form>
	</div>
@endsection