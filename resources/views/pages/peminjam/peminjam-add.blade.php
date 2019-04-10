@extends('layouts._peminjam')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Peminjaman</div>
	<div class="card-body">
		<form action="{{ route('peminjam.store') }}" method="post">
			@csrf
			<div class="form-row">
				
					<input type="hidden" name="id_inventaris" value="{{ $inventaris->id }}">
				
				<div class="form-group col-md-6">
					<label for="">Jumlah</label>
					<input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Tanggal Kembali</label>
					<input type="date" class="form-control" name="tanggal_kembali" required="" >
				</div>

				{{-- <select name="id_pegawai" id=""> --}}
					@foreach ($pegawai as $pegawai)
						@if ($pegawai->nama_pegawai == auth()->user()->username)
							<input type="hidden" name="id_pegawai" value="{{ $pegawai->id }}" selected="">
						@endif
					@endforeach
				{{-- </select> --}}

				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary">Pinjam</button>
				</div>
			</div>
		</form>
	</div>
@endsection