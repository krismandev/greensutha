@extends('guest2.layouts.master')
@section('title',__('navbar.green_sutha.penataan'))
@section('content')
<div class="service-style-two section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
           {{__('navbar.green_sutha.penataan')}}
        </h2>
    </div>
    <div class="container">
        @if($penataans->count() != null)
        <div class="row">
            @foreach($penataans as $penataan)
            <div class="col-lg-4 col-12">
                <div class="single-block">
                    <div class="img-box">
                        @if($penataan->link != null)
                        <iframe src="{{$penataan->link}}" width="100%" height="100%"></iframe>
                        {{-- <div class="overlay">
                            <a data-fancybox href="{{url('green_campus/penataan/'.$penataan->gambar)}}" class="play-button"><i class="flaticon-unlink"></i></a>
                        </div> <!-- /.overlay --> --}}
                        @else
                        <img src="{{url('green_campus/penataan/'.$penataan->gambar)}}" alt="" style="width: 366px; height:265px; object-fit: cover; object-position: center;">
                        <div class="overlay">
                            <a data-fancybox href="{{url('green_campus/penataan/'.$penataan->gambar)}}" class="play-button"><i class="flaticon-unlink"></i></a>
                        </div> <!-- /.overlay -->
                        @endif
                    </div> <!-- /.img-box -->
                    <div class="text">
                        <a href="{{url('green_campus/penataan/'.$penataan->file)}}"><i class="icon lnr lnr-download"></i></a>
                        <div class="srvc-name">
                            <h5><a href="#">{{$penataan->deskripsi}}</a></h5>
                            {{-- <span>We are Consulting Company</span> --}}
                        </div> <!-- /.srvc-name -->
                        {{-- <p>Vitae laoreet sagittis. In pellentesqueviverra purus. Sed risus est, molestie  hendrerit hendrerit,</p> --}}
                    </div> <!-- /.text -->
                </div> <!-- /.single-block -->
            </div>
            @endforeach
        </div>
        @endif

        <div class="view-all-service clearfix">
            {{$penataans->links()}}
        </div> <!-- /.view-all-service -->
    </div> <!-- /.container -->
</div> <!-- /.service-style-two -->
@endsection
