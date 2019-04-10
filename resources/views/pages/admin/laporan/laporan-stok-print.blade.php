<center>
	<h2>Laporan Stok <br>
		Inventaris App SMKN 1 PONOROGO
	</h2>
</center>

<br>

	{{ 'Hari/Tanggal : ' .date('l, d F Y, H:i:s')  }}
<br>
<center>
	<table width="100%" border="1" cellspacing="0">

		<tr>
			<td>Nama Barang</td>
			<td>Kode Barang</td>
			<td>Jumlah</td>
		</tr>

		@foreach ($inventaris as $inventaris)
		<tr>
			<td>{{ $inventaris->nama }}</td>
			<td>{{ $inventaris->kode_inventaris }}</td>
			<td>{{ $inventaris->jumlah }}</td>
		</tr>
		@endforeach

	</table>
</center>

<script>
	window.print();
</script>