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
            <h3 class="card-title">Form {{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="/dashboard/transactions/{{ $transaction->id }}">
            @method('put')
            @csrf
            <input class="form-control" name="user_id" value="{{ $transaction->user_id }}" hidden required>
            <div class="card-body">
              <div class="form-group">
                <label>Kode Transaksi</label>
                <input type="text" class="form-control" placeholder="Kode Transaksi" name="code" value="{{ $transaction->code }}" readonly required>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" placeholder="Tanggal" name="date" value="{{ $transaction->date }}" readonly required>
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Barang</label>
                <select class="form-control" name="item_id" id="item" onChange="update()" required>
                  @foreach ($items as $item)
                      @if (old('item_id', $transaction->item_id) == $item->id)
                          <option value="{{ $item->id }}" selected>{{ $item->name }} - {{ $item->price }}</option>
                      @else
                          <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->price }}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" placeholder="Harga" id="price">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" value="{{ $transaction->jumlah }}" onkeyup="mult(this.value)">
              </div>
              <div class="form-group">
                <label>Total Transaksi</label>
                <input type="number" class="form-control" placeholder="Total Transaksi" name="total"  value="{{ $transaction->total }}" id="total" required>
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

<script>
  function mult(value) {
    var x;
    var price = document.getElementById('price').value;

    x = price * value;

    document.getElementById('total').value = x;
  }
</script>

<script>
  function update() {
    var select = document.getElementById('item');
    var option = select.options[select.selectedIndex].text;
    const myArray = option.split(" ");

    document.getElementById('price').value = myArray[3];
  }

  update();
</script>

@endsection