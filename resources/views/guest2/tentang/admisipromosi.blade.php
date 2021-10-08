@extends('guest2.layouts.master')
@section('title','Admisi Promosi')
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
            Admisi Promoi
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    <img src="{{url('gambar/'.$admisipromosi->gambar)}}" alt="" style="width:100%; height: 100%;">
                </div>
                <div class="row">
                    <p>
                        {!!$admisipromosi->deskripsi!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
