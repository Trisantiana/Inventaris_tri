<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventaris App</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css') }}">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- datatable css -->
	<link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap4.min.css') }}">
	<!-- select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">

	{{-- <style type="text/css">
		html, body{
			background-color: #ccc;
		}
	</style> --}}


</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand fixed-top bg-primary text-white">
		<div class="container text-white">
			<a href="{{ url('pages') }}" class="navbar-brand text-white"  style="margin-left: -15px;">
				Inventaris App
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label = "Toggle Navigation">
				<i class="fa fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbar">

				<ul class="navbar-nav mr-auto text-white" style="margin-left: 88%;">

					<li class="nav-item dropdown text-white">
						<a href="#" id="navbarDropdown" class="nav-link dropdown-toggle text-white" role="button" data-toggle="dropdown">
							<i class="fa fa-user"></i>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" >
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fa fa-sign-out"></i>
							Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
							@csrf
						</form>
					</div>
				</li>

			</ul>
		</div>
	</div>
</div>

</nav>
<!-- end navbar -->

<!-- sidebar -->
<div class="row">
	<div class="card position-fixed" style="width: 18%; left: 0px; top: -17px;">
		<div class="card-header bg-primary text-white">Menu <i class="fa fa-cogs pull-right"></i></div>
		<div class="card-body" style="background-color: #424242ff; color: #fff;">
			<ul class="list-group list-group-flush">

				@if (auth()->user()->id_level == 1)
				<li class="list-group">
					<a href="{{ route('dashboard') }}" class="list-group-item " style="background-color: #424242ff; color: #fff;"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="list-group">
					<a href="{{ route('jenis.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Jenis
						<span class="badge badge-light pull-right">{{ $jenis = DB::table('jenis')->count('id') }}</span>
					</a>
				</li>
				<li class="list-group">
					<a href="{{ route('ruang.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Ruang
						<span class="badge badge-light pull-right">{{ $ruang = DB::table('ruang')->count('id') }}</span>
					</a>

			</li>
			<li class="list-group">
				<a href="{{ route('pegawai.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-users"></i> Pegawai
					<span class="badge badge-light pull-right">{{ $pegawai = DB::table('pegawai')->count('id') }}</span>
				</a>

			</li>
			<li class="list-group">
				<a href="{{ route('petugas.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-users"></i> Petugas
					<span class="badge badge-light pull-right">{{ $petugas = DB::table('petugas')->count('id') }}</span>
				</a>
			</li>
			<li class="list-group">
				<a href="{{ route('inventaris.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-list"></i> Inventaris
				<span class="badge badge-light pull-right">{{ $inventaris = DB::table('inventaris')->count('id') }}</span>
				</a>
			</li>
			<li class="list-group">
				<a href="{{ route('peminjaman.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-list"></i> Peminjaman
				<span class="badge badge-light pull-right">{{ $peminjaman = DB::table('v_peminjam')->count('id') }}</span>
				</a>
			</li>
			<li class="list-group">
				<a href="{{ route('laporan.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-book"></i> Laporan</a>
			</li>
			@elseif(auth()->user()->id_level == 2)
			<li class="list-group">
				<a href="{{ route('operator.create') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Tambah Peminjam</a>
			</li>
			<li class="list-group">
				<a href="{{ route('operator.index') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Data Peminjam
				<span class="badge badge-light pull-right">{{ $peminjaman = DB::table('peminjaman')->count('id') }}</span>
				</a>
			</li>
			@else
			<li class="list-group">
				<a href="{{ route('peminjam.dataInven') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Data Inventaris
				<span class="badge badge-light pull-right">{{ $inventaris = DB::table('inventaris')->count('id') }}</span>
				</a>
			</li>
			<li class="list-group">
				<a href="{{ route('peminjam.dataPinjam') }}" class="list-group-item" style="background-color: #424242ff; color: #fff;"> <i class="fa fa-bookmark"></i> Data Peminjam
				<span class="badge badge-light pull-right">{{ $peminjaman = DB::table('peminjaman')->count('id') }}</span>
				</a>
			</li>
			@endif
			<li class="list-group-item" style="background-color: #424242ff; color: #fff; height: 100vh; "></li>
		</ul>
	</div>
	</div>
</div>
<!-- end sidebar -->

<!-- content -->
<div class="col-md-12">
	<div class="card" style="max-width: 70%; left: 23%; top: 90px;">
		@include('alert')

		@yield('content')
	</div>
</div>
<!-- end content -->


<nav class="navbar navbar-bottom fixed-bottom bg-dark" style="height: 20px;">
	<p style="color: #fff; margin-left: 18%; margin-top: 15px;"> Copyright &copy;2019 <a href="#" style=" text-decoration: none; color: #ccc;">Tri Santiana Dewi</a></p>
</nav>


</body>
</html>

<!-- jquery js -->
<script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.slim.min.js') }}"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap-4.0.0/dist/js/bootstrap.min.js') }}"></script>
<!-- datatable js -->
<script type="text/javascript" src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- select2 js -->
<script type="text/javascript" src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<!-- popup js -->
<script type="text/javascript" src="{{ asset('plugins/popup/jquery.popupwindow.js') }}"></script>


<script type="text/javascript">
	$(function(){
		$(".table-data").dataTable();
		$(".select2").select2();
	});

	function popup($page){
		$.popupWindow($page,{
			width : 600,
			height :  500,
			center : 'parent',
			});
	}
</script>