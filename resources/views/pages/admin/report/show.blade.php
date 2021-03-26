@extends('layouts.admin.single-layouts')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Detail Berita Acara</h4>
            <a href="{{ route('report.personalprint', $report) }}" class="btn btn-info d-flex align-items-center"><i class="bi bi-printer-fill me-2"></i> Print PDF</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th width="15%">Nama Laboran</th>
                  <td width="1%">:</td>
                  <td>{{ $report->name }}</td>
                </tr>
                <tr>
                  <th width="15%">Pelajaran</th>
                  <td width="1%">:</td>
                  <td>{{ $report->lesson }}</td>
                </tr>
                <tr>
                  <th width="15%">Ruangan</th>
                  <td width="1%">:</td>
                  <td>{{ $report->laboratory->name }}</td>
                </tr>
                <tr>
                  <th width="15%">Tanggal</th>
                  <td width="1%">:</td>
                  <td>{{ \Carbon\Carbon::parse($report->end_date)->isoformat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                  <th width="15%">Waktu</th>
                  <td width="1%">:</td>
                  <td>{{ \Carbon\Carbon::parse($report->starting_date)->format('H.i') }} - {{ \Carbon\Carbon::parse($report->end_date)->format('H.i') }} WIB</td>
                </tr>
                <tr>
                  <th width="15%">Keterangan</th>
                  <td width="1%">:</td>
                  <td>{{ $report->description }}</td>
                </tr>
              </table>
            </div>

            <h5 class="pt-3">Aset yang dipinjam</h5>
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr class="text-center">
                  <th rowspan="2" class="align-middle">No</th>
                  <th rowspan="2" class="align-middle">Nama Alat</th>
                  <th rowspan="2" class="align-middle">Jumlah</th>
                  <th colspan="2">Kondisi</th>
                  <th rowspan="2" class="align-middle">Keterangan</th>
                </tr>
                <tr class="text-center">
                  <th>Sebelum</th>
                  <th>Sesudah</th>
                </tr>
                @forelse ($report->report_details as $detail)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $detail->name }}</td>
                      <td class="text-center">{{ $detail->quantity }}</td>
                      <td class="text-center">{{ $detail->condition_before }}</td>
                      <td class="text-center">{{ $detail->condition_before }}</td>
                      <td class="text-center">{{ $detail->description }}</td>
                    </tr>
                @empty
                    <tr>
                      <td colspan="6" class="text-muted text-center">Belum ada data barang yang dipinjam</td>
                    </tr>
                @endforelse
              </table>
            </div>
        </div>
    </div>
</div>
@endsection