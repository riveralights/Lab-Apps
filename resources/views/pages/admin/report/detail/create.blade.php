@extends('layouts.admin.app')
@section('title', 'Aset Yang Dipinjam - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Aset Yang Dipinjam</h3>
            <p class="text-subtitle text-muted">List aset apa saja yang dipinjam saat praktikum</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Berita Acara</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Aset yang dipinjam</h4>
          </div>
          <div class="card-body">

            <!-- Button trigger for primary themes modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#primary">
                Tambah Data
            </button>

            @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                  {{ Session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            
            <div class="table-responsive mt-3">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Nama Aset</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Kondisi Sebelum</th>
                    <th class="text-center">Kondisi Sesudah</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($report_detail as $detail)
                      <tr>
                        <td>{{ $detail->name }}</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">{{ $detail->condition_before }}</td>
                        <td class="text-center">{{ $detail->condition_after }}</td>
                        <td>{{ $detail->description == null ? " - " : $detail->description }}</td>
                        <td class="text-center"><a href="{{ route('detail.destroy', $detail->id) }}" onclick="return confirm('Anda yakin ingin menghapus item ini ?')"><i class="bi bi-x"></i></a></td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="6" class="text-center"> Tidak Ada Data </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
              <div class="alert alert-light-info color-info mt-4">
                <h4 class="mb-3">Catatan</h4>
                  Perlu di ingat! Input semua barang dengan baik dan benar sebelum meng-klik tombol buat laporan 😁👍
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Informasi Praktikum</h4>
            <table class="table">
              <tr>
                <th>Nama</th>
                <td>{{ $report->name }}</td>
              </tr>
              <tr>
                <th>Pelajaran</th>
                <td>{{ $report->lesson }}</td>
              </tr>
              <tr>
                <th>Ruangan</th>
                <td>{{ $report->laboratory->name }}</td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($report->end_date)->format('d F Y') }}</td>
              </tr>
            </table>
          </div>
        </div>
        <a href="{{ route('report.index') }}" class="btn btn-block btn-primary">Buat Laporan Berita Acara</a>
      </div>
    </div>
</div>

<!--primary theme Modal -->
<div class="modal fade text-left" id="primary" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">
                    Tambah Aset Yang Dipinjam
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('detail.store', $report) }}" method="POST">
                  @csrf

                  <div class="form-group">
                    <label for="name" class="mb-2">Nama Aset</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="quantity" class="mb-2">Jumlah Aset</label>
                    <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                    @error('quantity')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="condition_before" class="mb-2">Kondisi Sebelum Dipinjam</label>
                    <select name="condition_before" id="condition_before" class="form-control">
                      <option selected disable>-- Pilih Kondisi ---</option>
                      <option value="baik">Baik</option>
                      <option value="rusak">Rusak</option>
                    </select>
                    @error('condition_before')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="condition_after" class="mb-2">Kondisi Setelah Dipinjam</label>
                    <select name="condition_after" id="condition_after" class="form-control">
                      <option selected disable>-- Pilih Kondisi ---</option>
                      <option value="baik">Baik</option>
                      <option value="rusak">Rusak</option>
                      <option value="hilang">Hilang</option>
                    </select>
                    @error('condition_after')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="description">Keterangan</label>
                    <textarea name="description" id="description" cols="3" class="form-control" placeholder="(Opsional)">{{ old('description') }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection