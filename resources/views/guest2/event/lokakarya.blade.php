@extends('guest2.layouts.master')
@section('title','Lokakarya')
@section('content')

<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Events</span>
        <h2 class="title">
            Lokakarya
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    @foreach($lokakaryas as $lokakarya)
                    <div class="col-md-4">
                        <div class="single-blog-meta">
                            <div class="img-box">
                                @if ($lokakarya->link != null)
                                <iframe src="{{$lokakarya->link}}" width="100%" height="100%"></iframe>
                                @else
                                <img src="{{url('events/'.$lokakarya->gambar)}}" alt="" style="width:100%; height: 339px; object-fit: cover; object-position: center;">
                                @endif
                                {{-- <a href="#" class="date">{{date('d M Y',strtotime($lokakarya->created_at))}}</a> --}}
                            </div>
                            <div class="text">
                                <h6 class="title"><a href="#">{{$lokakarya->nama_event}}</a></h6>
                            </div> <!-- /.text -->
                        </div> <!-- /.single-blog-meta -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- /.row -->
        <div class="">
            {{$lokakaryas->links()}}
        </div>
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->
@endsection
