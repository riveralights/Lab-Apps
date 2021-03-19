@extends('layouts.admin.single-layouts')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Detail Laporan Aset</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th width="15%">Nama Aset</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->name }}</td>
                </tr>
                <tr>
                  <th width="15%">Merk</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->brand }}</td>
                </tr>
                <tr>
                  <th width="15%">Serial Number</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->serial_number }}</td>
                </tr>
                <tr>
                  <th width="15%">Kategori Barang</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->category->name }}</td>
                </tr>
                <tr>
                  <th width="15%">Tanggal Pembelian</th>
                  <td width="1%">:</td>
                  <td>{{ \Carbon\Carbon::parse($inventory->buy_date)->isoformat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                  <th width="15%">Tanggal Pemakaian</th>
                  <td width="1%">:</td>
                  <td>{{ \Carbon\Carbon::parse($inventory->unboxing_date)->isoformat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                  <th width="15%">Kondisi</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->condition }}</td>
                </tr>
                <tr>
                  <th width="15%">Keterangan</th>
                  <td width="1%">:</td>
                  <td>{{ $inventory->description }}</td>
                </tr>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection