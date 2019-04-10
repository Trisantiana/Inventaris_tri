<center>
    <h2>Laporan Peminjaman <br>
        Inventaris App SMKN 1 PONOROGO
    </h2>
</center>


{{ 'Hari/Tanggal : ' .date('l, d F Y, H:i:s')  }}
<br>

<table width="100%" border="1" cellspacing="0">

    <tr>
        <td>Nama Peminjam</td>
        <td>Nama Barang</td>
        <td>Jumlah</td>
        <td>Tanggal Pinjam</td>
        <td>Tanggal Kembali</td>
        <td>Status Peminjaman</td>
    </tr>

    @foreach ($peminjaman as $peminjaman)
    <tr>
        <td>{{ $peminjaman->nama_pegawai }}</td>
        <td>{{ $peminjaman->nama }}</td>
        <td>{{ $peminjaman->jumlah }}</td>
        <td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
        <td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) }}</td>
        <td>{{ $peminjaman->status_peminjaman }}</td>
    </tr>
    @endforeach

</table>
