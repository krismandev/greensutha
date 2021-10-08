@extends('guest2.layouts.master')
@section('title','Profil Kampus')
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h1 class="title">
            Profil Kampus
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <p>
                    {!!$profil->konten!!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
