@extends('layouts.innerpage')
@section('title','Energi & Perubahan Iklim')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Energi & Perubahan Iklim</h2>
      </div>
    </div>
    @if($energis->count() != null)
    <div class="row border-responsive">
      @foreach($energis as $energi)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-image">
          @if($energi->link != null)
          <iframe src="{{$energi->link}}" width="100%" height="100%" class="img-fluid"></iframe>
          @else
          <a href="{{url('green_campus/energi/'.$energi->gambar)}}"><img src="{{url('green_campus/energi/'.$energi->gambar)}}" alt="Image" class="img-fluid"></a>
          @endif
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase"><a href="#">{{$energi->deskripsi}}</a></h2>
            <!-- <span class="d-block mb-3">By James &mdash; Jan. 20, 2019</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p> -->
            <p><a href="{{url('green_campus/energi/'.$energi->file)}}" class="btn btn-primary">Download</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
<!-- <div class="site-section ">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Products &amp; Services</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Share Before You Download</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 block-13 nav-direction-white">
        <div class="">
          @foreach($energis as $energi)
          <div class="media-image">
            <img src="/frontend/images/img_1.jpg" alt="Image" class="img-fluid">
            <div class="media-image-body">
              <p class="font-secondary text-uppercase">{{$energi->deskripsi}}</p>
              <p><a href="#" class="btn btn-primary text-white px-4">Learn More</a></p>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div> -->
@stop
