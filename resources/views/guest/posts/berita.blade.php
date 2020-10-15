@extends('layouts.innerpage')
@section('title','Berita')
@section('content')


<div class="site-section first-section">
  <div class="container">
    <div class="col-md-12 text-center aos-init aos-animate" data-aos="fade">
      <span class="caption d-block mb-2 font-secondary font-weight-bold">GreenSutha</span>
      <h2 class="site-section-heading text-uppercase text-center font-secondary">{{__('navbar.semua')}}</h2>
    </div>
    <div class="row">
      <div class="col-md-8 blog-content">
        <div class="row mb-5">
          @foreach($posts as $post)
          <div class="col-md-6 col-lg-6 mb-5">
            <div class="media-image">
              <a href="single.html"><img src="{{url('posts/'.$post->gambar)}}" alt="Image" class="img-fluid"></a>
              <div class="media-image-body">
                <h2 class="font-secondary text-uppercase"><a href="{{route('showPostUser',$post->slug)}}">{!!Str::limit($post->judul,50)!!}</a></h2>
                <span class="d-block mb-3">Oleh {{$post->user->name}} &mdash; {{date('d M Y',strtotime($post->created_at))}}</span>
                <p>{!!Str::limit($post->konten,60)!!}</p>
                <p><a href="{{route('showPostUser',$post->slug)}}">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="">
          {{$posts->render()}}
        </div>
      </div>
      <div class="col-md-4 sidebar">
        <div class="sidebar-box">
          <div class="categories">
            <h3 class="text-uppercase">Kategori</h3>
            <li><a href="{{route('getBeritaLingkungan')}}">{{__('navbar.kategori.lingkungan')}}</a></li>
            <li><a href="{{route('getBeritaIslam')}}">{{__('navbar.kategori.islam')}}</a></li>
            <li><a href="{{route('getBeritaSosial')}}">{{__('navbar.kategori.sosial')}}</a></li>
            <li><a href="{{route('getBeritaPendidikan')}}">{{__('navbar.kategori.pendidikan')}}</a></li>
            <li><a href="{{route('getBeritaBudaya')}}">{{__('navbar.kategori.budaya')}}</a></li>
            <li><a href="{{route('getBeritaEkonomi')}}">{{__('navbar.kategori.ekonomi')}}</a></li>
            <li><a href="{{route('getBeritaSains')}}">{{__('navbar.kategori.sains')}}</a></li>
          </div>
        </div>
        <!-- <div class="sidebar-box">
          <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
          <h3 class="text-uppercase">About The Author</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          <p><a href="#" class="btn btn-primary text-white">Read More</a></p>
        </div>

        <div class="sidebar-box">
          <h3 class="text-uppercase">Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div> -->
      </div>
    </div>
  </div>
</div>



@stop
