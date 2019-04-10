@extends('layouts._peminjam')

@section('content')
    @if (Session::has('cart'))
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @foreach ($inventaris as $inventaris)
                        <li class="list-group-item">
                            <span class="badge badge-success"> {{ $inventaris['qty'] }} </span>
                            <strong>{{ $inventaris['dataInven']['nama'] }}</strong>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Total Peminjaman : {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</p>
                <hr>
                <a href="{{ route('proses-pinjam') }} " class="btn btn-primary">Pinjam</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('peminjam.dataPinjam') }}" class="btn btn-sm btn-primary"><i class="fa fa-list"></i>Lihat Data Peminjaman</a>
                Tidak Ada Barang Yang Dipinjam!
            </div>
        </div>
    @endif
@endsection