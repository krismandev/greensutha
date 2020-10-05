@extends('layouts.innerpage')
@section('title','Selayang Pandang')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Selayang Pandang</h2>
      </div>
    </div>
    <div class="row content">
      <p class="text-center">{!!$selayang_pandang->selayang_pandang!!}</p >
    </div>
  </div>
</div>
@endsection
