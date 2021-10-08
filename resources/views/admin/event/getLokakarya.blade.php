@extends('admin/layouts/master')
@section('title','Lokakarya')
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
      <h3 class="panel-title">Halaman Event Lokakarya</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahlokakarya"  id="btn-tambahlokakarya">
        Tambah Data
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($lokakaryas->count() != 0)
    <table class="table table-hover" id="data_lokakaryas_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
            <th>No</th>
            <th>Nama event</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        @foreach($lokakaryas as $lokakarya)
        <tr>
          <td>{{$lokakaryas->perPage()*($lokakaryas->currentPage()-1)+$i}}</td>
					<?php $i++; ?>
          <td>{{$lokakarya->nama_event}}</td>
					@if($lokakarya->link != null)
          <td>
            <iframe src="{{$lokakarya->link}}" width="100px;" height="100px;" class="img-fluid"></iframe>
          </td>
          @else
          <td>
            <a href="{{url('events/'.$lokakarya->gambar)}}"> <img src="{{url('events/'.$lokakarya->gambar)}}" alt="" style="width:100px; height:100px;"></a>
          </td>
          @endif
            <td>
                <a href="#" class="btn btn-danger hapus-lokakarya" title="Hapus" data-lokakarya_id="{{$lokakarya->id}}"> <i class="lnr lnr-trash"></i> </a>
                <a href="#" class="btn btn-primary edit-lokakarya" title="Edit" data-id="{{$lokakarya->id}}" data-nama_event="{{$lokakarya->nama_event}}" data-gambar="{{$lokakarya->gambar}}" data-link="{{$lokakarya->link}}" data-toggle="modal" data-target="#editlokakarya"> <i class="lnr lnr-pencil"></i> </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
		<div class="">
			{{$lokakaryas->links()}}
		</div>
    @else
    <h3>Belum ada data Lokakarya</h3>
    @endif
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambahlokakarya" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah data</h5>
				<h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeLokakarya')}}" method="post" enctype="multipart/form-data">
				@csrf
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Nama event</span>
            </div>
            <div class="col-md-8">
              <input type="hidden" name="user_id" id="user_id" value="">
              <input type="text" name="nama_event" value="" class="form-control" placeholder="Nama event...">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <span>Gambar </span>
            </div>
            <div class="col-md-8">
              <input type="file" name="gambar" value="" class="form-control">
            </div>
          </div>
					<div class="row form-group">
            <div class="col-md-4">
              <span>Link Video Youtube</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="link" value="" class="form-control">
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

<div class="modal fade" id="editlokakarya" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit data</h5>
				<h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('updateLokakarya')}}" method="post" enctype="multipart/form-data">
				@csrf @method('PATCH')
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Nama event</span>
            </div>
            <div class="col-md-8">
              <input type="hidden" name="lokakarya_id" id="lokakarya_id" value="">
              <input type="text" name="nama_event" value="" class="form-control" id="nama_event">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <span>Gambar </span>
            </div>
            <div class="col-md-8">
              <input type="file" name="gambar" value="" class="form-control" id="gambar">
            </div>
          </div>
					<div class="row form-group">
            <div class="col-md-4">
              <span>Link Video Youtube</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="link" value="" class="form-control" id="link">
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
		$('#btn-tambahlokakarya').click(function(){

		});
		$('#data_lokakaryas_reguler').DataTable();


		$('.edit-lokakarya').click(function(){
			const lokakarya_id = $(this).data('id');
			const nama_event = $(this).data('nama_event');
			const gambar = $(this).data('gambar');
			const link = $(this).data('link');
			console.log(lokakarya_id);


			$('#nama_event').val(nama_event);
			// $('#gambar').val(gambar);
			$('#link').val(link);
			$('#lokakarya_id').val(lokakarya_id);
		});

		$('.hapus-lokakarya').click(function(){
			const lokakarya_id = $(this).data('lokakarya_id');
            swal({
                title: "Hapus?",
                text: "Apa kamu yakin akan menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location = '/dashboard/event/lokakarya/delete/'+lokakarya_id;
                }
            });
			// const hapus = confirm('Yakin ingin menghapus lokakarya ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/lokakarya/delete/'+lokakarya_id;
			// }


		});

	});

</script>
@stop
