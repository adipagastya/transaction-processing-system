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
      <!-- left column -->
      <div class="col-lg-8">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ubah {{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/items/{{ $item->id }}">
            
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" class="form-control" placeholder="Kode Barang" name="code" value="{{ old('code', $item->code) }}" required>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang" name="name" value="{{ old('name', $item->name) }}" required>
              </div>
              <div class="form-group">
                <label>Tipe</label>
                <input type="text" class="form-control" placeholder="Tipe" name="type" value="{{ old('type', $item->type) }}" required>
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" placeholder="Stok" name="stock" value="{{ old('stock', $item->stock) }}" required>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" placeholder="Harga" name="price" value="{{ old('price', $item->price) }}" required>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!--/.col (left) -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection