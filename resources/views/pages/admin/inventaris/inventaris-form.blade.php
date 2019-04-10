@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Inventaris</div>
	<div class="card-body">
		<form action="{{ route('inventaris.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">Nama inventaris</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama inventaris" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Kode inventaris</label>
					<input type="text" name="kode_inventaris" class="form-control" placeholder="Kode inventaris" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Kondisi</label>
					<input type="text" name="kondisi" class="form-control" placeholder="Kondisi" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Jumlah</label>
					<input type="text" name="jumlah" class="form-control" placeholder="Jumlah" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Jenis</label>
					<select name="id_jenis" class="form-control select2" id="">
						<option value="">-- Pilih Jenis --</option>
						@foreach ($jenis as $jenis)
							<option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="">Ruang</label>
					<select name="id_ruang" class="form-control select2" id="">
						<option value="">-- Pilih Ruang --</option>
						@foreach ($ruang as $ruang)
							<option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
						@endforeach
					</select>
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