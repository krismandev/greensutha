@extends('guest2.layouts.master')
@section('title',__('navbar.tentang_green_sutha.tim'))
@section('content')
<div class="our-blog center-text-blog section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">{{__('navbar.tentang_green_sutha.tim')}}</h2>
        </div> <!-- /.theme-title-one -->

        <div class="row">
            @foreach ($tims as $tim)
            <div class="col-lg-4 col-12" style="margin-top: 30px;">
                <div class="single-blog-meta">
                    <div class="img-box">
                        <img src="{{$tim->getAvatar()}}" alt="" style="width:380px; height:339px; object-fit: cover; object-position: center;">
                        {{-- <a href="#" class="date">25 May 2018</a> --}}
                    </div>
                    <div class="text" style="margin-top: 0px !important;">
                        <ul class="post-info clearfix">
                            <li><a href="#">{{$tim->posisi}}</a></li>
                            {{-- <li><a href="#">11 Likes</a></li>
                            <li><a href="#">0 comment</a></li> --}}
                        </ul>
                        <h6 class="title"><a href="#">{{$tim->user->name}}</a></h6>
                        {{-- <p>Our approach is collaborative and adaptive. want clients to be immersed in the project and creative process. Through activities like </p> --}}
                    </div> <!-- /.text -->
                </div> <!-- /.single-blog-meta -->
            </div>
            @endforeach
        </div>


    </div> <!-- /.container -->
</div> <!-- /.our-blog -->

@endsection
