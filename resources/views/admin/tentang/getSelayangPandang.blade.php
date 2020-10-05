@extends('admin.layouts.master')
@section('title','Selayang Pandang')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif
<div class="panel">
  <div class="panel-heading">
    <h3 class="panel-title">Halaman Selayang Pandang</h3>
  </div>
	@if($selayang_pandang == null)
	<form class="" action="{{route('storeSelayangPandang')}}" method="post">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Selayang Pandang</b></span>
        </div>
        <div class="col-md-9">
          <textarea class="form-control" placeholder="textarea" rows="4" name="selayang_pandang" id="selayang-pandang"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">

          <!-- <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>
           -->
          <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Simpan</button>

        </div>
      </div>
    </div>
  </form>
	@else
  <form class="" action="{{route('storeSelayangPandang')}}" method="post">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Selayang Pandang</b></span>
        </div>
        <div class="col-md-9">
          <textarea class="form-control" placeholder="textarea" rows="4" name="selayang_pandang" id="selayang-pandang">{{$selayang_pandang->selayang_pandang}}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">

          <!-- <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>
           -->
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
            .create( document.querySelector( '#selayang-pandang' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@stop
