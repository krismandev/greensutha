@extends('admin/layouts/master')
@section('title','Penataan & Infrastruktur')
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
      <h3 class="panel-title">Halaman Dokumen. Topik: Penataan & Infrastruktur</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahpenataan"
         id="btn-tambahpenataan">
        Tambah Data
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($penataans->count() != 0)
    <table class="table table-hover" id="data_penataans_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Deskripsi</th>
          <th>Gambar/Video</th>
          <td>Aksi</td>

        </tr>
      </thead>
      <tbody>
				@foreach($penataans as $penataan)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$penataan->deskripsi}}</td>
          @if($penataan->link != null)
          <td>
            <iframe src="{{$penataan->link}}" width="100px;" height="100px;" class="img-fluid"></iframe>
          </td>
          @else
          <td>
            <a href="{{url('green_campus/penataan/'.$penataan->gambar)}}"> <img src="{{url('green_campus/penataan/'.$penataan->gambar)}}" alt="" style="width:100px; height:100px;"></a>
          </td>
          @endif
					<td>
            <a href="{{url('green_campus/penataan/'.$penataan->file)}}" class="btn btn-primary" title="Download"> <i class="lnr lnr-download"></i> </a>
            <a href="#" class="btn btn-danger hapus-penataan" title="Hapus"  data-penataan_id="{{$penataan->id}}"> <i class="lnr lnr-trash"></i> </a>
          </td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada dokumen</h3>
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahpenataan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan upload dokumen yang berkaitan dengan judul</h5> <br>
        <h5 class="modal-title" id="exampleModalScrollableTitle">*Silahkan pilih salah satu ingin upload gambar atau video</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storePenataan')}}" method="post" enctype="multipart/form-data">
				@csrf
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Deskripsi</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="deskripsi" value="" class="form-control" placeholder="Tulis deskripsi" autocomplete="off">
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
          <div class="row form-group">
            <div class="col-md-4">
              <span>Link Video Youtube</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="link" value="" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <span>Dokumen/file</span>
            </div>
            <div class="col-md-8">
              <input type="file" name="file" value="" class="form-control">
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

		$('#data_penataans_reguler').DataTable();

		$('.hapus-penataan').click(function(){
			const penataan_id = $(this).data('penataan_id');

      swal({
        title: "Hapus?",
        text: "Apa kamu yakin akan menghapus data ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '/dashboard/green-campus/penataan&infrastruktur/delete/'+penataan_id;
        }
      });
			// const hapus = confirm('Yakin ingin menghapus gambar ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/penataan/delete/'+penataan_id;
			// }


		});


	});

</script>
@stop
