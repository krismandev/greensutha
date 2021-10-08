@extends('guest2.layouts.master')
@section('title',__('navbar.gallery_isi.poster'))
@section('content')
<div class="our-portfolio portfolio-four-column section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
           {{__('navbar.gallery_isi.poster')}}
        </h2>
    </div>
    <div class="container" style="margin-top:20px;">
        @if ($posters != null)
        <div class="row">
            @foreach ($posters as $poster)
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="single-block">
                    <img src="{{url('galeri/poster/'.$poster->gambar)}}" alt="" style="width:283px; height: 235px; object-fit: cover; object-position: center;">
                    <div class="overlay">
                        <div>
                            <a href="{{url('galeri/poster/'.$poster->gambar)}}" data-fancybox="gallery" data-caption="Caption for single image" class="fancybox"></a>
                        </div>
                    </div> <!-- /.overlay -->
                </div> <!-- /.single-block -->
            </div> <!-- /.col- -->
            @endforeach
        </div> <!-- /.row -->
        @endif
    </div> <!-- /.container -->

    <div class="theme-pagination text-center">
        <ul class="clearfix">
            {{$posters->links()}}
        </ul>
    </div>
</div>
@stop
