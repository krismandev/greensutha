@extends('layouts.innerpage')
@section('title','Kerja sama')
@section('content')

<div class="site-section block-14 nav-direction-white">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <h2 class="site-section-heading text-center text-uppercase">Mitra GreenSutha</h2>
      </div>
    </div>
    <div class="nonloop-block-14 owl-carousel">
      @foreach($mitras as $mitra)
      <div class="d-block block-testimony mx-auto text-center">
        <div class="mb-4">
          <img src="{{url('tentang/mitra/'.$mitra->gambar)}}" alt="Image" class="img-fluid rounded-circle w-25 mx-auto" style="width:100%; height:100%;">
        </div>
        <div>
          <h2 class="h5 mb-4">{{$mitra->nama_mitra}}</h2>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@stop
