@extends('layouts.main')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Input Buku</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
   

        <form role="form" action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">

        @csrf 
        <input name="_method" type="hidden" value="PUT">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif            
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Buku</label>
                    <input type="text" value="{{ $book->kode_buku }}" name="kode_buku" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Buku</label>
                    <input type="text" value="{{ $book->judul_buku }}" name="judul_buku" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Terbit</label>
                    <input type="number" value="{{ $book->tahun_terbit }}" name="tahun_terbit" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Penulis</label>
                    <input type="text" value="{{ $book->penulis }}" name="penulis" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" value="{{ $book->stok }}" name="stok" class="form-control" >
                </div>           


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        </form>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div> -->
@endsection

