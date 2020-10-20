@extends('layouts.innerpage')
@section('title','Poster')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSUTHA</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Poster</h2>
      </div>
    </div>
    <div class="row">
      @if($posters->count() != null)
      @foreach($posters as $poster)
      <div class="col-md-6 col-lg-3 mb-4 poster" data-aos="fade-up" data-aos-delay="">
        <a href="{{url('galeri/poster/'.$poster->gambar)}}" data-fancybox="gallery"><img src="{{url('galeri/poster/'.$poster->gambar)}}" alt="Image" class="img-fluid" style="height:100%; width:100%;"></a>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
@stop
