@extends('admin.layouts.master')
@section('title','Video Banner')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif
<div class="panel">
  <div class="panel-heading">
    <h3 class="panel-title">Halaman Video Banner</h3>
  </div>
	@if($video_banner != null)
  <form class="" action="{{route('storeVideoBanner')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Link Video</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control input" name="link_video" value="{{$video_banner->link_video}}">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">

          <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>

        </div>
      </div>
    </div>
  </form>
	@else
  <form class="" action="{{route('storeVideoBanner')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Link Video</b></span>
        </div>
        <div class="col-md-9">
          <div class="col-sm-6">
            <input type="text" class="form-control input" name="link_video" value="" placeholder="masukkan link video youtube">

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">

          <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Simpan</button>

        </div>
      </div>
    </div>
  </form>
	@endif
</div>
@stop
@section('linkfooter')
<script>
ClassicEditor
            .create( document.querySelector( '#deskripsi' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@stop
