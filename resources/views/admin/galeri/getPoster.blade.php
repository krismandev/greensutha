@extends('admin/layouts/master')
@section('title','Poster')
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
      <h3 class="panel-title">Halaman Foto</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahposter"
         id="btn-tambahposter">
        Tambah Poster
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($posters->count() != 0)
    <table class="table table-hover" id="data_posters_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
					<th>Aksi</th>

        </tr>
      </thead>
      <tbody>
				@foreach($posters as $poster)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td> <a href="{{url('galeri/poster/'.$poster->gambar)}}"> <img src="{{url('galeri/poster/'.$poster->gambar)}}" alt="" style="width:100px; height:100px;"></a></td>
					<td> <a href="#" class="btn btn-danger hapus-poster" title="Hapus"  data-poster-id="{{$poster->id}}"> <i class="lnr lnr-trash"></i> </a> </td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada data poster</h3>
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahposter" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storePoster')}}" method="post" enctype="multipart/form-data">
				@csrf
	      <div class="modal-body">
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

		$('#data_posters_reguler').DataTable();

		$('.hapus-poster').click(function(){
			const poster-id = $(this).data('poster-id');

      swal({
        title: "Hapus?",
        text: "Apa kamu yakin akan menghapus poster ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '../dashboard/poster/delete/'+poster-id;
        }
      });
			// const hapus = confirm('Yakin ingin menghapus gambar ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/poster/delete/'+poster-id;
			// }


		});


	});

</script>
@stop
