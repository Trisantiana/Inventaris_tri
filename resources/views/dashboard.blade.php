@extends('layouts._master')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card" style="width: 50%;">
			<div class="card-header bg-primary text-white"> <a href="{{ route('inventaris.index') }}" class="text-white" style="text-decoration: none;">Data Inventaris</a>
			</div>
			<div class="card-body bg-primary text-white">
				<i class="fa fa-lg fa-list" style="size: 100px;"></i>
				<span class="badge badge-light" style="margin-left: 20px;">{{ $inventaris }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card" style="width: 50%;">
			<div class="card-header bg-secondary text-white"> <a href="{{ route('jenis.index') }}" class="text-white" style="text-decoration: none;">Data Jenis</a>
			</div>
			<div class="card-body bg-secondary text-white">
				<i class="fa fa-lg fa-bookmark" style="size: 100px;"></i>
				<span class="badge badge-light" style="margin-left: 20px;">{{ $jenis }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card" style="width: 50%;">
			<div class="card-header bg-warning text-white"> <a href="{{ route('ruang.index') }}" class="text-white" style="text-decoration: none;">Data Ruang</a>
			</div>
			<div class="card-body bg-warning text-white">
				<i class="fa fa-lg fa-bookmark" style="size: 100px;"></i>
				<span class="badge badge-light" style="margin-left: 20px;">{{ $ruang }}</span>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card" style="width: 50%;">
			<div class="card-header bg-success text-white"> <a href="{{ route('peminjaman.index') }}" class="text-white" style="text-decoration: none;">Data Peminjaman</a>
			</div>
			<div class="card-body bg-success text-white">
				<i class="fa fa-lg fa-users" style="size: 100px;"></i>
				<span class="badge badge-light" style="margin-left: 20px;">{{ $peminjaman }}</span>
			</div>
		</div>
	</div>
</div>
@endsection