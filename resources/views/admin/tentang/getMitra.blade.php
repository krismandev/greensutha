@extends('admin/layouts/master')
@section('title','Mitra')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@stop
@section('content')
@if(session('success'))

<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="panel">
  <div class="panel-heading">
    <div class="col-md-6">
      <h3 class="panel-title">Halaman Mitra</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahmitra"
         id="btn-tambahmitra">
        Tambah Mitra
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($mitras->count() != 0)
    <table class="table table-hover" id="data_mitras_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gambar</th>
					<th>Aksi</th>

        </tr>
      </thead>
      <tbody>
				@foreach($mitras as $mitra)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$mitra->nama_mitra}}</td>
          <td> <a href="{{url('tentang/mitra/'.$mitra->gambar)}}"> <img src="{{url('tentang/mitra/'.$mitra->gambar)}}" alt="" style="width:100px; height:100px;"></a></td>
					<td> <a href="#" class="btn btn-danger hapus-mitra" title="Hapus"  data-mitra_id="{{$mitra->id}}"> <i class="lnr lnr-trash"></i> </a> </td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada data mitra</h3>
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahmitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeMitra')}}" method="post" enctype="multipart/form-data">
				@csrf
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Nama mitra</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="nama_mitra" value="" class="form-control" placeholder="Nama mitra..." autocomplete="off">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <span>Gambar</span>
            </div>
            <div class="col-md-8">
              <input type="file" name="gambar" value="" class="form-control">
            </div>
          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
			</form>

    </div>
  </div>
</div>
@stop
@section('linkfooter')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {

		$('#data_mitras_reguler').DataTable();

		$('.hapus-mitra').click(function(){
			const mitra_id = $(this).data('mitra_id');

      swal({
        title: "Hapus?",
        text: "Apa kamu yakin akan menghapus mitra ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '/dashboard/tentang/kerjasama/delete/'+mitra_id;
        }
      });
			// const hapus = confirm('Yakin ingin menghapus gambar ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/mitra/delete/'+mitra_id;
			// }


		});


	});

</script>
@stop
