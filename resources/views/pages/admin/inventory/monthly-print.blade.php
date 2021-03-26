<!DOCTYPE html>
<html>
<head>
	<title>Rekap Data Laporan Aset</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

		<center>
			<h4>Rekap Data Laporan Aset</h4>
		</center>
		<br/>
		<div class="table-responsive">
      <table class='table table-bordered'>
			<thead>
				<tr>
					<th class="align-middle text-center">No</th>
					<th class="align-middle text-center">Nama Barang</th>
					<th class="align-middle text-center">Merk Barang</th>
					<th class="align-middle text-center">Serial Number</th>
					<th class="align-middle text-center">Kategori Barang</th>
					<th class="align-middle text-center">Tanggal Pembelian</th>
					<th class="align-middle text-center">Tanggal Pemakaian</th>
					<th class="align-middle text-center">Kondisi</th>
					<th class="align-middle text-center">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($inventories as $inventory)
				<tr>
					<td class="align-middle text-center">{{ $loop->iteration }}</td>
					<td class="align-middle text-center">{{$inventory->name}}</td>
					<td class="align-middle text-center">{{$inventory->brand}}</td>
					<td class="align-middle text-center">{{$inventory->serial_number}}</td>
					<td class="align-middle text-center">{{$inventory->category->name}}</td>
					<td class="align-middle">{{ \Carbon\Carbon::parse($inventory->buy_date)->isoFormat('dddd, D MMMM Y') }}</td>
					<td class="align-middle">{{ \Carbon\Carbon::parse($inventory->unboxing_date)->isoFormat('dddd, D MMMM Y') }}</td>
					<td class="align-middle text-center">{{$inventory->condition}}</td>
					<td class="align-middle text-center">{{$inventory->description}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
    </div>

</body>
</html>