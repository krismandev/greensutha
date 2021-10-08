@extends('guest2.layouts.master')
@section('title',__('navbar.green_sutha.air'))
@section('content')
<div class="service-style-two section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
           {{__('navbar.green_sutha.air')}}
        </h2>
    </div>
    <div class="container">
        @if($airs->count() != null)
        <div class="row">
            @foreach($airs as $air)
            <div class="col-lg-4 col-12">
                <div class="single-block">
                    <div class="img-box">
                        @if($air->link != null)
                        <iframe src="{{$air->link}}" width="100%" height="100%"></iframe>
                        {{-- <div class="overlay">
                            <a data-fancybox href="{{url('green_campus/air/'.$air->gambar)}}" class="play-button"><i class="flaticon-unlink"></i></a>
                        </div> <!-- /.overlay --> --}}
                        @else
                        <img src="{{url('green_campus/air/'.$air->gambar)}}" alt="" style="width: 366px; height:265px; object-fit: cover; object-position: center;">
                        <div class="overlay">
                            <a data-fancybox href="{{url('green_campus/air/'.$air->gambar)}}" class="play-button"><i class="flaticon-unlink"></i></a>
                        </div> <!-- /.overlay -->
                        @endif
                    </div> <!-- /.img-box -->
                    <div class="text">
                        <div class="">
                            <h5><a href="#">{{$air->deskripsi}}</a></h5>
                            {{-- <span>We are Consulting Company</span> --}}
                        </div> <!-- /.srvc-name -->
                        <a href="{{url('green_campus/air/'.$air->file)}}" class="theme-button-one">Download</a>

                        {{-- <p>Vitae laoreet sagittis. In pellentesqueviverra purus. Sed risus est, molestie  hendrerit hendrerit,</p> --}}
                    </div> <!-- /.text -->
                </div> <!-- /.single-block -->
            </div>
            @endforeach
        </div>
        @endif

        <div class="view-all-service clearfix">
            {{$airs->links()}}
        </div> <!-- /.view-all-service -->
    </div> <!-- /.container -->
</div> <!-- /.service-style-two -->
@endsection
