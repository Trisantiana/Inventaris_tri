@extends('layouts._master')

@section('content')
<div class="card-header bg-primary text-white">Form Edit Inventaris</div>
<div class="card-body">
	<a href="{{ route('inventaris.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i></a>
	<form action="{{ route('inventaris.update', $inventaris->id) }}" method="post">
		@csrf
		@method('put')
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="">Nama inventaris</label>
				<input type="text" name="nama" class="form-control" value="{{ $inventaris->nama }}"  required="">
			</div>

			<div class="form-group col-md-6">
				<label for="">Kode inventaris</label>
				<input type="text" name="kode_inventaris" class="form-control" value="{{ $inventaris->kode_inventaris }}"  required="">
			</div>

			<div class="form-group col-md-6">
				<label for="">Kondisi</label>
				<input type="text" name="kondisi" class="form-control" value="{{ $inventaris->kondisi }}"  required="">
			</div>

			<div class="form-group col-md-6">
				<label for="">Jumlah</label>
				<input type="text" name="jumlah" class="form-control" value="{{ $inventaris->jumlah }}"  required="">
			</div>

			<div class="form-group col-md-6">
				<label for="">Jenis</label>
				<select name="id_jenis" class="form-control select2" id="">
					@foreach ($jenis as $jenis)
					@if ($jenis->id == $inventaris->id_jenis)
						<option value="{{ $jenis->id }}" selected="">{{ $jenis->nama_jenis }}</option>
					@else
					<option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
					@endif

					@endforeach
				</select>
			</div>

			<div class="form-group col-md-6">
				<label for="">Ruang</label>
				<select name="id_ruang" class="form-control select2" id="">
					@foreach ($ruang as $ruang)
					@if ($ruang->id == $inventaris->id_ruang)
						<option value="{{ $ruang->id }}" selected="">{{ $ruang->nama_ruang }}</option>
					@else
					<option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
					@endif
					@endforeach
				</select>
			</div>

			<div class="form-group col-md-12">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="{{ $inventaris->keterangan }}">
			</div>

			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i></button>

			</div>
		</div>
	</form>
</div>
@endsection