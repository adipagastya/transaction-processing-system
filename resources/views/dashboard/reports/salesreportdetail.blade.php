@extends('dashboard.layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $title }}</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
            </div>
        @endif

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel data <?= strtolower($title)  ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $transaction->code }}</td>
                  <td>{{ $transaction->date }}</td>
                  <td> 
                    @foreach ($items as $item)
                    {{ $transaction->item_id == $item->id ? $item->name : ''}}
                    @endforeach
                  </td>
                  <td>{{ $transaction->jumlah }}</td>
                  <td>Rp {{ number_format($transaction->total, 2) }}</td>
                </tr>
                @endforeach
                <tr>
                  <th>Total Penjualan </th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>Rp {{ number_format($total, 2) }}</th>
                </tr>
              </tbody>
              {{-- <tfoot>
                <tr>
                  <th colspan="5">Total Penjualan </th>
                  <th>Rp {{ number_format($total, 2) }}</th>
                </tr>
              </tfoot> --}}
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection