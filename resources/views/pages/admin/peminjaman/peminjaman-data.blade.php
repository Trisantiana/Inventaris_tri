@extends('layouts._master')

@section('content')
	<div class="card-header bg-primary text-white">Data Peminjaman
	<a href="{{ route('peminjaman.create') }}"><i class="fa fa-plus text-white pull-right"></i></a>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-data nowrap dt-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Peminjam</th>
						<th>Nama Inventaris</th>
						{{-- <th>Jumlah</th> --}}
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status Peminjaman</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($peminjaman as $key => $peminjaman)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $peminjaman->nama_pegawai }}</td>
							<td>{{ $peminjaman->nama }}</td>
							{{-- <td>{{ $peminjaman->jumlah }}</td> --}}
							<td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
							<td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) }}</td>
							<td>
								@if ($peminjaman->status_peminjaman == 'dibooking')
									<span class="badge badge-danger">{{ $peminjaman->status_peminjaman }}</span>
								@elseif($peminjaman->status_peminjaman == 'sedang dipinjam')
									<span class="badge badge-warning">{{ $peminjaman->status_peminjaman }}</span>
								@else
									<span class="badge badge-success">{{ $peminjaman->status_peminjaman }}</span>
								@endif
							</td>
							<td>
								<a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
								@if ($peminjaman->status_peminjaman == 'dibooking')
									<form action="{{ route('peminjaman.updateBooking', $peminjaman->id) }}" method="post">
										@csrf
										@method('put')
										<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-undo"></i></button>
									</form>
								@elseif ($peminjaman->status_peminjaman == 'sedang dipinjam')
									<form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="post">
										@csrf
										@method('put')
										<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-undo"></i></button>
									</form>
								@else
									<a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection