@extends('layouts.innerpage')
@section('title',__('navbar.green_sutha.penataan'))
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('navbar.green_sutha.penataan')}}</h2>
      </div>
    </div>
    @if($penataans->count() != null)
    <div class="row border-responsive">
      @foreach($penataans as $penataan)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-image">
          @if($penataan->link != null)
          <iframe src="{{$penataan->link}}" width="100%" height="100%" class="img-fluid"></iframe>
          @else
          <a href="{{url('green_campus/penataan/'.$penataan->gambar)}}"><img src="{{url('green_campus/penataan/'.$penataan->gambar)}}" alt="Image" class="img-fluid"></a>
          @endif
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase"><a href="#">{{$penataan->deskripsi}}</a></h2>
            <!-- <span class="d-block mb-3">By James &mdash; Jan. 20, 2019</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p> -->
            <p><a href="{{url('green_campus/penataan/'.$penataan->file)}}" class="btn btn-primary">Download</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
@stop
