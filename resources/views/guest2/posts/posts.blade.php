@extends('guest2/layouts/master')
@section('title','Berita')
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
            @if($ktg == null) {{__('navbar.semua')}}
            @elseif($ktg->nama_kategori == 'Lingkungan')
                {{__('navbar.kategori.lingkungan')}}
            @elseif($ktg->nama_kategori == 'Islam')
                {{__('navbar.kategori.islam')}}
            @elseif($ktg->nama_kategori == 'Sosial')
                {{__('navbar.kategori.sosial')}}
            @elseif($ktg->nama_kategori == 'Pendidikan')
                {{__('navbar.kategori.pendidikan')}}
            @elseif($ktg->nama_kategori == 'Budaya')
                {{__('navbar.kategori.budaya')}}
            @elseif($ktg->nama_kategori == 'Ekonomi')
                {{__('navbar.kategori.ekonomi')}}
            @elseif($ktg->nama_kategori == 'Sains')
                {{__('navbar.kategori.sains')}}
            @else
             hasil pencarian untuk {{$keyword}}
            @endif
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="single-blog-meta">
                            <div class="img-box">
                                <img src="{{url('posts/'.$post->gambar)}}" alt="" style="width:100%; height: 339px; object-fit: cover; object-position: center;">
                                <a href="#" class="date">{{date('d M Y',strtotime($post->created_at))}}</a>
                            </div>
                            <div class="text">
                                {{-- <ul class="post-info clearfix">
                                    <li>By <a href="#">Consultpro</a></li>
                                    <li><a href="#">11 Likes</a></li>
                                    <li><a href="#">0 comment</a></li>
                                </ul> --}}
                                <h6 class="title"><a href="{{route('showPostUser',$post->slug)}}">{!!Str::limit($post->judul,150)!!}</a></h6>
                            </div> <!-- /.text -->
                        </div> <!-- /.single-blog-meta -->
                    </div>
                    @endforeach
                </div>

                <div class="theme-pagination">
                    <ul class="clearfix">
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>


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
                            <li class="float-left">{{date('d M Y',strtotime($item->created_at))}}</li>
                            <li class="float-right"><span>02</span> Comment</li>
                        </ul>
                    </div> <!-- /.single-latest-news -->
                    @endforeach
                </div> <!-- /.sidebar-latest-news -->
            </div> <!-- /.theme-sidebar -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->
@endsection
