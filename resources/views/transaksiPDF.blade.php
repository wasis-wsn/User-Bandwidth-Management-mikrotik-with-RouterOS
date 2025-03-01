<!DOCTYPE html>
<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>
	<style type="text/css">
		.table{
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
		}
		.table, th,td{
			border: 1px solid #999;
			padding: 8px 20px;
		}
	</style>
	<h4 align="center">Laporan Penjualan voucher</h4>
	<div class="form-group">
	<table class="table">
		<thead>
			<tr>
				<th style="width: 5%">No.</th>
				<th style="width: 7%">Username</th>
				<th style="width: 12%">Paket</th>
				<th style="width: 10%">Durasi</th>
				<th style="width: 14%">Harga</th>
				<th style="width: 10%">Waktu</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($PDFTransaksi as $no => $item)
				@if($item->User->username == auth()->user()->username)
			<tr>
				<td> {{ $no + 1 }} </td>                      
                <td> {{ $item->username }} </td>
                <td> {{ $item->profile}} </td>
                <td> {{ $item->limit }} </td>
                <td> Rp {{ number_format($item->price, 0, ',' , '.') }}</td>
                <td> {{ Carbon\Carbon::parse($item->created_at)->format("d/m/Y") }} </td>
			</tr>
				@endif
			@endforeach
		</tbody>
	</table>
		<br>
			<b>Total Penjualan : Rp {{ number_format($totalPrice, 0, ',' , '.') }}</b>
	</div>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>