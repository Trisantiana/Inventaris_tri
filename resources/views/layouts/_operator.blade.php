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
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand fixed-top bg-primary text-white">
		<div class="container text-white">
			<a href="{{ url('/pages') }}" class="navbar-brand text-white"  style="padding-left: -50px;">
				Inventaris App
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
				<i class="fa fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbar">

				<ul class="navbar-nav mr-auto text-white" style="margin-left: 73%; float: right;">
					<li class="nav-item text-white">
						<a href="#" class="text-white" style="text-decoration: none; margin-top: 50px; margin-right:10px; ">Data Peminjam</a>
					</li>

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



	<!-- content -->
	<div class="col-md-12">
		<div class="card" style="max-width: 80%; left: 10%; top: 90px;">
			@include('alert')

			@yield('content')
		</div>
	</div>
	<!-- end content -->

<nav class="navbar navbar-bottom fixed-bottom bg-primary" style="height: 35px;">
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

<script type="text/javascript">
	$(function(){
		$(".table-data").dataTable();
		$(".select2").select2();
	});
</script>