@extends('guest2.layouts.master')
@section('title','Green Sutha')
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Green SUTHA</span>
        <h2 class="title">
            {{__('index.selayang_pandang')}}
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <p>
                    {!!$selayang_pandang->selayang_pandang!!}
                </p>
            </div>
        </div>
    </div>
</div>
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
            {{__('navbar.tentang_green_sutha.makna_logo')}}
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    <img src="{{url('gambar/'.$makna_logo->gambar_makna)}}" alt="" style="width:100%; height: 100%;">
                </div>
                <p>
                    {!!$makna_logo->deskripsi!!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
