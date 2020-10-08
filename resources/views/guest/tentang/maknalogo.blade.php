@extends('layouts.innerpage')
@section('title','Makna Logo')
@section('content')
<div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Makna Logo</h2>
      </div>
    </div>
    <center>
        
      <div class="row mb-10">
        <div class="col-md-12 text-center" data-aos="fade">
          <img src="{{url('gambar/'.$makna_logo->gambar_makna)}}" class="text-center" style="width: 300px;">
        </div>
      </div>
      <div class="row content">
        <div class="col-md-12 text-center" data-aos="fade">
          <p class="text-center">{!!$makna_logo->deskripsi!!}</p >
        </div>
      </div>
    </center>
  </div>
</div>
@endsection
