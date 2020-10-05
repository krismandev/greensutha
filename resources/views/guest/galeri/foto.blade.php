@extends('layouts.innerpage')
@section('title','Foto - foto')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Photo Gallery</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Company's Photo Gallery</h2>
      </div>
    </div>
    <div class="row">
      @foreach($fotos as $foto)
      <div class="col-md-6 col-lg-3 mb-4 gambar-gallery" data-aos="fade-up" data-aos-delay="">
        <a href="{{url('galeri/foto/'.$foto->gambar)}}" data-fancybox="gallery"><img src="{{url('galeri/foto/'.$foto->gambar)}}" alt="Image" class="img-fluid" style="height:100%; width:100%;"></a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@stop
