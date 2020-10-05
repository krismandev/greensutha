@extends('layouts.innerpage')
@section('title','Air')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Air</h2>
      </div>
    </div>
    @if($airs->count() != null)
    <div class="row border-responsive">
      @foreach($airs as $air)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-image">
          @if($air->link != null)
          <iframe src="{{$air->link}}" width="100%" height="100%" class="img-fluid"></iframe>
          @else
          <a href="{{url('green_campus/air/'.$air->gambar)}}"><img src="{{url('green_campus/air/'.$air->gambar)}}" alt="Image" class="img-fluid"></a>
          @endif
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase"><a href="#">{{$air->deskripsi}}</a></h2>
            <!-- <span class="d-block mb-3">By James &mdash; Jan. 20, 2019</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p> -->
            <p><a href="{{url('green_campus/air/'.$air->file)}}" class="btn btn-primary">Download</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
@stop
