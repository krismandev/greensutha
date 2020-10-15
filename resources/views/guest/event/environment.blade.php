@extends('layouts.innerpage')
@section('title','Environment & Sustainability')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Events || {{__('navbar.event.environment')}}</h2>
      </div>
    </div>
    @if($environments->count() != null)
    <div class="row border-responsive">
      @foreach($environments as $environment)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-image">
          @if($environment->link != null)
          <iframe src="{{$environment->link}}" width="100%" height="100%" class="img-fluid"></iframe>
          @else
          <a href="{{url('events/'.$environment->gambar)}}" data-fancybox="gallery"><img src="{{url('events/'.$environment->gambar)}}" alt="Image" class="img-fluid"></a>
          @endif
          <!-- <a href="{{url('events/'.$environment->gambar)}}" data-fancybox="gallery"><img src="{{url('events/'.$environment->gambar)}}" alt="Image" class="img-fluid"></a> -->
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase"><a href="#">{{$environment->nama_event}}</a></h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="">
      {{$environments->render()}}
    </div>
    @endif
  </div>
</div>
@stop
