@extends('layouts._operator')
@section('content')
<div class="card-header bg-primary text-white">Data Peminjaman
	<a href="{{ route('operator.create') }}" class="text-white pull-right"><i class="fa fa-plus"></i></a>
</div>
<div class="card-body">
	<div class="table-responsive">
		<table class="table table-striped table-data nowrap dt-responsive">
			<thead>
				<tr>
					<td>#</td>
					<td>Nama Barang</td>
					<td>Nama Peminjam</td>
					{{-- <td>Jumlah</td> --}}
					<td>Tanggal Pinjam</td>
					<td>Tanggal Kembali</td>
					<td>Status Peminjaman</td>
					<td>Action</td>

				</tr>
			</thead>
			<tbody>
				@foreach ($peminjam as $key => $peminjam)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $peminjam->nama }}</td>
					<td>{{ $peminjam->nama_pegawai }}</td>
					{{-- <td>{{ $peminjam->jumlah }}</td> --}}
					<td>{{ date('d-m-Y', strtotime($peminjam->tanggal_pinjam)) }}</td>
					<td>{{ date('d-m-Y', strtotime($peminjam->tanggal_kembali)) }}</td>
					<td>
						@if ($peminjam->status_peminjaman == 'dibooking')
							<span class="badge badge-danger">{{ $peminjam->status_peminjaman }}</span>

						@elseif($peminjam->status_peminjaman == 'sedang dipinjam')
							<span class="badge badge-warning">{{ $peminjam->status_peminjaman }}</span>

						@else
						<span class="badge badge-success">{{ $peminjam->status_peminjaman }}</span>
						@endif
					</td>
					<td>
						<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
						@if ($peminjam->status_peminjaman == 'dibooking')
							<form action="{{ route('operator.updateBooking', $peminjam->id) }}" method="post">
								@csrf
								@method('put')
								<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-undo"></i></button>
							</form>
						@elseif ($peminjam->status_peminjaman == 'sedang dipinjam')
							<form action="{{ route('operator.update', $peminjam->id) }}" method="post">
								@csrf
								@method('put')
								<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-undo"></i></button>
							</form>
						@else
							<button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection