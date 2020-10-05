@extends('layouts.innerpage')
@section('title','Events')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Events</h2>
      </div>
    </div>
    @if($events->count() != null)
    <div class="row border-responsive">
      @foreach($events as $event)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="media-image">
          <a href="{{url('events/'.$event->gambar)}}" data-fancybox="gallery"><img src="{{url('events/'.$event->gambar)}}" alt="Image" class="img-fluid"></a>
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase"><a href="#">{{$event->nama_event}}</a></h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
@stop
