@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Form Tambah Petugas</div>
	<div class="card-body">
		<form action="{{ route('petugas.store') }}" method="post">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="">Nama</label>
					<input type="text" name="name" class="form-control" placeholder="Nama " required="">
				</div>

				<div class="form-group col-md-6" >
					<label for="">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username" required="">
				</div>

				<div class="form-group col-md-6">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required="">
				</div>

				<div class="form-group col-md-12">
					<select name="id_level" class="form-control" id="">
						<option value="">-- Pilih Level --</option>
						@foreach ($level as $level)
							<option value="{{ $level->id }}">{{ $level->nama_level }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>

				</div>
			</div>
		</form>
	</div>
@endsection