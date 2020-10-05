@extends('layouts.innerpage')
@section('title','Tim kami')
@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12" data-aos="fade">
        <h2 class="site-section-heading text-center text-uppercase">Tim Green Sutha</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach($tims as $tim)
      <div class="col-md-4 text-center mb-5" data-aos="fade-up" data-aos-delay="100">
        <img src="{{$tim->getAvatar()}}" alt="Image" class="img-fluid rounded w-50 mb-4" style="width:100%; height:180px;">
        <h2 class="h5 text-uppercase">{{$tim->user->name}}</h2>
        <span class="d-block mb-4">{{$tim->posisi}}</span>
        <p class="lead">{{$tim->deskripsi}}</p>
        <p>
          <a href="{{$tim->yt}}" class="p-3"><span class="icon-youtube"></span></a>
          <a href="{{$tim->fb}}" class="p-3"><span class="icon-facebook"></span></a>
          <a href="{{$tim->twitter}}" class="p-3"><span class="icon-twitter"></span></a>
          <a href="{{$tim->ig}}" class="p-3"><span class="icon-instagram"></span></a>
          <a href="{{$tim->li}}" class="p-3"><span class="icon-linkedin"></span></a>
        </p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@stop
