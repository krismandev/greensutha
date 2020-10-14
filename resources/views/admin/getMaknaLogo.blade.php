@extends('admin.layouts.master')
@section('title','Makna Logo')
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
    <h3 class="panel-title">Halaman Makna Logo</h3>
  </div>
	@if($makna_logo != null)
  <form class="" action="{{route('storeMaknaLogo')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Gambar Logo</b></span>
        </div>
        <div class="col-md-9">
          <div class="col-sm-6">
            <input type="file" class="form-control input" name="gambar_makna" value="{{$makna_logo->gambar_makna}}">

          </div>
          <div class="col-md-6">
            <img src="{{url('gambar/'.$makna_logo->gambar_makna)}}" alt="" class="img-fluid" style="width:200px; height:200px;">
          </div>
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Deskripsi</b></span>
        </div>
        <div class="col-md-9">
          <textarea class="form-control" placeholder="textarea" rows="10" name="deskripsi" id="deskripsi">{{$makna_logo->deskripsi}} </textarea>
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
  <form class="" action="{{route('storeMaknaLogo')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Gambar Logo</b></span>
        </div>
        <div class="col-md-9">
          <div class="col-sm-6">
            <input type="file" class="form-control input" name="gambar_makna" value="">

          </div>
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Deskripsi</b></span>
        </div>
        <div class="col-md-9">
          <textarea class="form-control" placeholder="textarea" rows="4" name="deskripsi" id="deskripsi"> </textarea>
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
