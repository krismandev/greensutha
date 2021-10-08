@extends('admin/layouts/master')
@section('title','GreenSUTHA Award')
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
      <h3 class="panel-title">Halaman Event GreenSutha Award</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahaward"  id="btn-tambahaward">
        Tambah Data
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($awards->count() != 0)
    <table class="table table-hover" id="data_awards_reguler" style="margin-top: 10px;">
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
        @foreach($awards as $award)
        <tr>
          <td>{{$awards->perPage()*($awards->currentPage()-1)+$i}}</td>
					<?php $i++; ?>
          <td>{{$award->nama_event}}</td>
					@if($award->link != null)
          <td>
            <iframe src="{{$award->link}}" width="100px;" height="100px;" class="img-fluid"></iframe>
          </td>
          @else
          <td>
            <a href="{{url('events/'.$award->gambar)}}"> <img src="{{url('events/'.$award->gambar)}}" alt="" style="width:100px; height:100px;"></a>
          </td>
          @endif
            <td>
                <a href="#" class="btn btn-danger hapus-award" title="Hapus" data-award_id="{{$award->id}}"> <i class="lnr lnr-trash"></i> </a>
                <a href="#" class="btn btn-primary edit-award" title="Edit" data-id="{{$award->id}}" data-nama_event="{{$award->nama_event}}" data-gambar="{{$award->gambar}}" data-link="{{$award->link}}" data-toggle="modal" data-target="#editaward"> <i class="lnr lnr-pencil"></i> </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
		<div class="">
			{{$awards->links()}}
		</div>
    @else
    <h3>Belum ada data event</h3>
    @endif
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambahaward" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah data</h5>
				<h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeAward')}}" method="post" enctype="multipart/form-data">
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

<div class="modal fade" id="editaward" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit data</h5>
				<h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('updateAward')}}" method="post" enctype="multipart/form-data">
				@csrf @method('PATCH')
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Nama event</span>
            </div>
            <div class="col-md-8">
              <input type="hidden" name="award_id" id="award_id" value="">
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
		$('#btn-tambahaward').click(function(){

		});
		$('#data_awards_reguler').DataTable();


		$('.edit-award').click(function(){
			const award_id = $(this).data('id');
			const nama_event = $(this).data('nama_event');
			const gambar = $(this).data('gambar');
			const link = $(this).data('link');
			console.log(award_id);


			$('#nama_event').val(nama_event);
			// $('#gambar').val(gambar);
			$('#link').val(link);
			$('#award_id').val(award_id);
		});

		$('.hapus-award').click(function(){
			const award_id = $(this).data('award_id');
            swal({
                title: "Hapus?",
                text: "Apa kamu yakin akan menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location = '/dashboard/event/award/delete/'+award_id;
                }
            });
			// const hapus = confirm('Yakin ingin menghapus award ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/award/delete/'+award_id;
			// }


		});

	});

</script>
@stop
