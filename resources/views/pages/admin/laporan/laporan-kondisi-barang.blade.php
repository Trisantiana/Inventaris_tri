<center>
	<h2>Laporan Kondisi Barang <br>
		Inventaris App SMKN 1 PONOROGO
	</h2>
</center>

<br>
{{ 'Hari/Tanggal : ' .date('l, d F Y, H:i:s')  }}


<table width="100%" border="1" cellspacing="0">

	<tr>

		<td>Nama Barang</td>
		<td>Jenis</td>
		<td>Ruang</td>
		<td>Kondisi</td>
		<td>Jumlah</td>
	</tr>

	@foreach ($peminjaman as $peminjaman)
	<tr>

		<td>{{ $peminjaman->nama }}</td>
		<td>{{ $peminjaman->jenis->nama_jenis }}</td>
		<td>{{ $peminjaman->ruang->nama_ruang }}</td>
		<td>{{ $peminjaman->kondisi }}</td>
		<td>{{ $peminjaman->jumlah }}</td>
	</tr>
	@endforeach

</table>
