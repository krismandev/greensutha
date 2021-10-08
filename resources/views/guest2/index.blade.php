@extends('guest2.layouts.master')
@section('title','Gren Sutha')
@section('content')

<div class="about-compnay section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">{{__('index.selayang_pandang')}} <br> GreenSUTHA</h2>
        </div> <!-- /.theme-title-one -->
        <div class="row">
            <div class="col-lg-12 col-12 wow fadeInLeft  animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div class="text-wrapper">
                    <p>{!!$selayang_pandang->selayang_pandang!!}</p>
                    <a href="{{route('getTentangGreensuthaUser')}}" class="theme-button-one">View More Info</a>
                </div> <!-- /.text-wrapper -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>

<div class="about-compnay section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">{{__('index.selayang_pandang')}} <br> Admisi Promosi</h2>
        </div> <!-- /.theme-title-one -->
        <div class="row">
            <div class="col-lg-12 col-12 wow fadeInLeft  animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div class="text-wrapper">
                    <p>{!!Str::limit($admisipromosi->deskripsi,1000)!!}</p>
                    <a href="{{route('getAdmisiPromosiUser')}}" class="theme-button-one">{{__('index.baca_selengkapnya')}}</a>
                </div> <!-- /.text-wrapper -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>

<div class="our-blog center-text-blog section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">Berita Terbaru</h2>
        </div> <!-- /.theme-title-one -->
        <div class="latest-news-slider">
            @foreach($posts as $post)
            <div class="item">
                <div class="single-blog-meta">
                    <div class="img-box">
                        <img src="{{url('posts/'.$post->gambar)}}" style="width:380px; height:339px; object-fit: cover; object-position: center;" alt="">
                        <a href="#" class="date">{{date('d M Y',strtotime($post->created_at))}}</a>
                    </div>
                    <div class="text">
                        {{-- <ul class="post-info clearfix">
                            <li>By <a href="#">Consultpro</a></li>
                            <li><a href="#">11 Likes</a></li>
                            <li><a href="#">0 comment</a></li>
                        </ul> --}}
                        <h6 class="title"><a href="blog-details.html">{!!Str::limit($post->judul,100)!!}</a></h6>
                        <p>{!!Str::limit($post->konten,300)!!}</p>
                    </div> <!-- /.text -->
                </div> <!-- /.single-blog-meta -->
            </div> <!-- /.item -->
            @endforeach
        </div> <!-- /.latest-news-slider -->
    </div> <!-- /.container -->
</div> <!-- /.our-blog -->

<div class="our-blog section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">Latest News &amp; Updates</h2>
        </div> <!-- /.theme-title-one -->
        <div class="latest-news-slider">
            @foreach ($events as $event)
            <div class="item">
                <div class="single-blog-meta">
                    <div class="img-box">
                        <a href="{{url('events/'.$event->gambar)}}">
                            <img src="{{url('events/'.$event->gambar)}}" alt="">
                        </a>
                    </div>
                    <div class="text">
                        <h6 class="title"><a href="#">{{$event->nama_event}}</a></h6>
                    </div> <!-- /.text -->
                </div> <!-- /.single-blog-meta -->
            </div> <!-- /.item -->
            @endforeach
        </div> <!-- /.latest-news-slider -->
    </div> <!-- /.container -->
</div> <!-- /.our-blog -->


<div class="latest-project section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">{{__('index.foto')}}</h2>
        </div> <!-- /.theme-title-one -->
        <div class="row">
            @foreach($fotos as $foto)
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="single-block">
                    <a href="{{url('galeri/foto/'.$foto->gambar)}}">
                        <img src="{{url('galeri/foto/'.$foto->gambar)}}" alt="" style="width: 291px; height:253px; object-fit: cover; object-position: center;">
                    </a>
                </div> <!-- /.single-block -->
            </div> <!-- /.col- -->
            @endforeach
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.latest-project -->
<div class="latest-project section-spacing">
    <div class="container">
        <div class="theme-title-one text-center">
            <h2 class="title">{{__('index.poster')}}</h2>
        </div> <!-- /.theme-title-one -->
        <div class="row">
            @foreach($posters as $poster)
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="single-block">
                    <a href="{{url('galeri/poster/'.$poster->gambar)}}">
                        <img src="{{url('galeri/poster/'.$poster->gambar)}}" alt="" style="width: 291px; height:253px; object-fit: cover; object-position: center;">
                    </a>
                </div> <!-- /.single-block -->
            </div> <!-- /.col- -->
            @endforeach
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.latest-project -->
@endsection
