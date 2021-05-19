<!DOCTYPE html>
<html>
<head>
	<title>Rekap Data Berita Acara Praktikum</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<img src="https://iili.io/BwCBhG.jpg" alt="" style="margin-top: -30px" width="100%">
		<center>
			<h4>Rekap Berita Acara Praktikum</h4>
		</center>
		<br/>
		<p><b>Periode</b> : {{ \Carbon\Carbon::parse($start_date)->isoFormat('D MMMM Y') }} - {{ \Carbon\Carbon::parse($end_date)->isoFormat('D MMMM Y') }}</p>

		<div class="table-responsive">
      <table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Pelajaran</th>
					<th>Ruangan</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reports as $report)
				<tr>
					<td class="align-middle text-center">{{ $loop->iteration }}</td>
					<td class="align-middle">{{$report->name}}</td>
					<td class="align-middle">{{$report->lesson}}</td>
					<td>{{$report->laboratory->name}}</td>
					<td>{{ \Carbon\Carbon::parse($report->starting_date)->isoFormat('dddd, D MMMM Y') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
    </div>

</body>
</html>