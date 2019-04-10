@extends('layouts._peminjam')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card-body">
            <form action="{{ route('proses-pinjam') }}" method="post">
                @csrf

                <p>Daftar Waktu Pengembalian</p> <br>


                <div class="row">
                    <p class=" col-md-6"> 1 Hari : {{ $satu = date('Y-m-d', strtotime("+1 day")) }}</p>
                    <p class=" col-md-6"> 2 Hari : {{ $dua = date('Y-m-d', strtotime("+2 day"))}}</p>
                    <p class="col-md-6"> 3 Hari : {{ $tiga = date('Y-m-d', strtotime("+3 day"))}}</p>
                    <p class="col-md-6"> 4 Hari : {{ $empat = date('Y-m-d', strtotime("+4 day"))}}</p>
                    <p class="col-md-6"> 5 Hari : {{ $lima = date('Y-m-d', strtotime("+5 day"))}}</p>
                    <p class="col-md-6"> 6 Hari : {{ $enam  = date('Y-m-d', strtotime("+6 day"))}}</p>
                    <p class="col-md-6"> 7 Hari : {{ $tujuh  = date('Y-m-d', strtotime("+7 day")) }}</p>

                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="Tanggal Kembali">Tanggal Kembali</label>
                            {{-- <input type="date" class="form-control" name="tanggal_kembali"> --}}
                            <select name="tanggal_pinjam" class="form-control" id="">
                                <option value="{{ $satu }}">1 Hari</option>
                                <option value="{{ $dua }}">2 Hari</option>
                            </select>
                        </div>
                    </div>

                    @foreach ($pegawai as $pegawai)
                    @if ($pegawai->nama_pegawai == auth()->user()->name)
                    <input type="hidden" name="id_pegawai" value="{{ $pegawai->id }}">

                    @endif
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Pinjam</button>
            </form>
        </div>
    </div>
</div>

@endsection