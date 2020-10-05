@extends('admin/layouts/master')
@section('title','Kontak')
@section('content')
@if(session('success'))

<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif
@if($kontak == null)
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <i class="fa fa-check-circle"></i> Silahkan isi data kontak
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
    <h3 class="panel-title">Halaman Kontak</h3>
  </div>
  @if($kontak == null)
  <form class="" action="{{route('storeKontak')}}" method="post">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Nama</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="nama..." name="nama" value="{{old('nama')}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Alamat</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="alamat..." name="alamat" value="{{old('alamat')}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Hp</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="hp..." name="hp" value="{{old('hp')}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Email</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="email..." name="email" value="{{old('email')}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
          <button type="submit" name="button" class="btn btn-primary" style="margin-top: 20px;">Simpan</button>
        </div>
      </div>
    </div>
  </form>
  @else
  <form class="" action="{{route('storeKontak')}}" method="post">
    @csrf
    <div class="panel-body">
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Nama</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="nama..." name="nama" value="{{$kontak->nama}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Alamat</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="alamat..." name="alamat" value="{{$kontak->alamat}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Hp</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="hp..." name="hp" value="{{$kontak->hp}}">
        </div>
      </div>
      <div class="row mt-3" style="margin-top: 20px;">
        <div class="col-md-3">
          <span><b>Email</b></span>
        </div>
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="email..." name="email" value="{{$kontak->email}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
          <button type="submit" name="button" class="btn btn-primary" style="margin-top: 20px;">Update</button>
        </div>
      </div>
    </div>
  </form>
  @endif
</div>
@stop
@section('linkfooter')
@stop
