@extends('dashboard.layouts.main')

@section('container')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @foreach ($transactions as $transaction)
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
                <p>{{ $title }}</p>
                {{-- @php
                    $year = explode("-" , $transaction->date)
                @endphp --}}
                <h3>{{ $transaction->year }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="/dashboard/reports/sales/detail/{{ $transaction->year }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @endsection