@extends('guest2/layouts/master')
@section('title',$post->judul)
@section('content')
<div class="news-classic news-details section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="single-classic-news">
                    <div class="title clearfix">
                        <div class="date">{{date('d M Y',strtotime($post->created_at))}}</div>
                        <h3>{{$post->judul}}</h3>
                    </div> <!-- /.title -->
                    <div class="image-box"><img src="{{url('posts/'.$post->gambar)}}" alt=""></div>
                    {{-- <ul class="post-tag-meta clearfix">
                        <li>by <a href="#">blendpixels</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">11 comments</a></li>
                    </ul> <!-- /.post-tag-meta --> --}}
                    <p>{!!$post->konten!!}</p>
                </div> <!-- /.single-classic-news -->
                @if($post->link != null)
                    <div class="container">
                    <iframe src="{{$post->link}}" class="img-fluid"></iframe>
                    </div>
                @endif
            </div> <!-- /.col- -->


            <!-- ===================== Theme Sidebar ====================== -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 theme-sidebar">
                <div class="sidebar-search sidebar-spacing">
                    <h5 class="sidebar-title">Search</h5>
                    <form action="{{route('searchPostsUser')}}" method="GET">
                        <input type="text" placeholder="Cari..." name="search">
                        <button type="submit"><i class="flaticon-search"></i></button>
                    </form>
                </div> <!-- /.sidebar-search -->

                <div class="sidebar-categories sidebar-spacing">
                    <h5 class="sidebar-title">Kategori</h5>
                    <ul>
                        <li><a href="#">{{__('navbar.kategori.lingkungan')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.islam')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.sosial')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.pendidikan')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.budaya')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.ekonomi')}}</a></li>
                        <li><a href="#">{{__('navbar.kategori.sains')}}</a></li>
                    </ul>
                </div> <!-- /.sidebar-categories -->

                <div class="sidebar-latest-news sidebar-spacing">
                    <h5 class="sidebar-title">Berita Lainnya</h5>
                    @foreach($other_posts as $item)
                    <div class="single-latest-news">
                        <a href="blog-details.html" class="news-title">{!!Str::limit($item->judul,100)!!}</a>
                        <div class="img-box">
                            <img src="{{url('posts/'.$item->gambar)}}" alt="">
                            <div class="overlay">
                                <a href="blog-details.html">Read More</a>
                            </div> <!-- /.overlay -->
                        </div> <!-- /.img-box -->
                        <ul class="clearfix">
                            <li class="float-left">{{date('d M Y',strtotime($item->created))}}</li>
                            <li class="float-right"><span>02</span> Comment</li>
                        </ul>
                    </div> <!-- /.single-latest-news -->
                    @endforeach
                </div> <!-- /.sidebar-latest-news -->
            </div> <!-- /.theme-sidebar -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
@endsection
