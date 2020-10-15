@extends('admin/layouts/master')
@section('title','Environment & Sustainability')
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
      <h3 class="panel-title">Halaman Event Environment & Sustainability</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahenvironment"  id="btn-tambahenvironment">
        Tambah Data
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($environments->count() != 0)
    <table class="table table-hover" id="data_environments_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama event</th>
          <th>Gambar</th>
					<th>Aksi</th>
        </tr>
      </thead>
      <tbody>

				@foreach($environments as $environment)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$environment->nama_event}}</td>
					@if($environment->link != null)
          <td>
            <iframe src="{{$environment->link}}" width="100px;" height="100px;" class="img-fluid"></iframe>
          </td>
          @else
          <td>
            <a href="{{url('events/'.$environment->gambar)}}"> <img src="{{url('events/'.$environment->gambar)}}" alt="" style="width:100px; height:100px;"></a>
          </td>
          @endif
					<td> <a href="#" class="btn btn-danger hapus-environment" title="Hapus" data-environment_id="{{$environment->id}}"> <i class="lnr lnr-trash"></i> </a> </td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada data Environment & Sustainability</h3>
    @endif
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambahenvironment" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah data</h5>
				<h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeEnvironment')}}" method="post" enctype="multipart/form-data">
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
@stop
@section('linkfooter')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(document).ready(function() {
		$('#btn-tambahenvironment').click(function(){

		});
		$('#data_environments_reguler').DataTable();

		$('.hapus-environment').click(function(){
			const environment_id = $(this).data('environment_id');
      swal({
        title: "Hapus?",
        text: "Apa kamu yakin akan menghapus data ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '/dashboard/event/environment&sustainability/delete/'+environment_id;
        }
      });


		});

	});

</script>
@stop
