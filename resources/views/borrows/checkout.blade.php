@extends('layouts.main')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengajuan Pinjam</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <table class="table" role="table">
                <thead>
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis Buku</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->attributes->kode_buku }}</td>
                            <td>{{ $cart->attributes->judul_buku }}</td>
                            <td>{{ $cart->attributes->penulis }}</td>
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

      <div class="card">
          <div class="card-header">

          </div>

          <div class="card-body">
            <form role="form" action="{{ route('borrows.store') }}" method="POST" enctype="multipart/form-data">

            

            <input type="hidden" name="id" value="{{ Auth::guard('member')->user()->id }}">

                @csrf 
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif      
                    
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="start_date" class="col-sm-2 col-form-label">Tanggal Peminjaman & Pengembalian</label>
                        <div class="col-sm-10">

                            <div class="input-daterange input-group" id="date-range">
                                <input type="text"
                                    class="form-control m-2" name="start_date" placeholder="Tanggal Pinjam" autocomplete="off" required> 
                                <input
                                    type="text" class="form-control m-2" name="end_date" placeholder="Tanggal Kembali" autocomplete="off" required>
                            </div>
                            
                        </div>
                    </div>
                </div>
        
                    
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div> -->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
	$(document).ready(function() {

		var today = new Date();
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

		jQuery("#date-range").datepicker({
	        toggleActive: !0,
	        format: 'yyyy/mm/dd',
	        clearBtn: true,
	        todayHighlight: true,
	        startDate: date,
	        // maxDate: moment()
		})
	
	});	
</script>
@endpush