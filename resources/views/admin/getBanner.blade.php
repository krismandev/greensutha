@extends('admin/layouts/master')
@section('title','Banner')
@section('header')

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
      <h3 class="panel-title">Halaman Banner</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahbanner"
         id="btn-tambahbanner">
        Tambah Banner
      </a>
    </div>
  </div>
  <hr>
  <div class="panel-body" style="margin-top: 10px;">
    @if($banners->count() != 0)
      @foreach($banners as $banner)
      <div class="col-md-4">
        <!-- PANEL NO PADDING -->
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Panel No Padding</h3>
            <div class="right">
              <button type="button" class="btn-remove" data-banner_id="{{$banner->id}}" title="Hapus"><i class="lnr lnr-trash"></i></button>
            </div>
          </div>
          <div class="panel-body no-padding bg-primary text-center">
            <!-- <div class="padding-top-30 padding-bottom-30">
              <i class="fa fa-thumbs-o-up fa-5x"></i>
              <h3>No Content Padding</h3>
            </div> -->
            <img src="{{url('banner/'.$banner->gambar)}}" style="max-width:100%"; alt="">
          </div>
        </div>
        <!-- END PANEL NO PADDING -->
      </div>
      @endforeach
    @else
    <h3>Belum ada data banner</h3>
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahbanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeBanner')}}" method="post" enctype="multipart/form-data">
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {

		$('.btn-remove').click(function(){
			const banner_id = $(this).data('banner_id');

      swal({
        title: "Hapus?",
        text: "Apa kamu yakin akan menghapus banner ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = '../dashboard/banner/delete/'+banner_id;
        }
      });
			// const hapus = confirm('Yakin ingin menghapus gambar ini?');
      //
			// if (hapus) {
			// 	window.location = '../dashboard/banner/delete/'+banner_id;
			// }


		});


	});

</script>
@stop
