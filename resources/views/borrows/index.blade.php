@extends('layouts.main')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Books</h1>
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
          <h3 class="card-title">Peminjaman</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

          
          
            <table class = "table table-bordered" id = "users-table">
          
            <thead>
                <tr>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Buku</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->user->name }}</td>
                    <td>{{ $borrow->tgl_pinjam }}</td>
                    <td>{{ $borrow->tgl_kembali }}</td>
                    <td> 
                        <?php 
                            $details = App\Borrow::showBooks($borrow->id);

                            foreach ($details as $detail) :
                            
                        ?>
                            {{ $detail->book->judul_buku }} <br>

                        <?php
                            endforeach;
                        ?>
                    </td>
                    <td>{{ $borrow->status }}</td>
                </tr>  
                @endforeach
                
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div> 
@endsection

@push('scripts')

@endpush