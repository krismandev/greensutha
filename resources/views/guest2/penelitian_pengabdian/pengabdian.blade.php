@extends('guest2.layouts.master')
@section('title','Pengabdian')
@section('content')

<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        {{-- <span class="caption d-block mb-2 font-secondary font-weight-bold">Events</span> --}}
        <h2 class="title">
            Pengabdian
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    @foreach($pengabdians as $pengabdian)
                    <div class="col-md-4">
                        <div class="single-blog-meta">
                            <div class="img-box">

                                <a href="{{url('gambar/'.$pengabdian->gambar)}}">
                                    <img src="{{url('gambar/'.$pengabdian->gambar)}}" alt="" style="width:100%; height: 339px; object-fit: cover; object-position: center;">
                                </a>
                                {{-- <a href="#" class="date">{{date('d M Y',strtotime($pengabdian->created_at))}}</a> --}}
                            </div>
                            <div class="text">
                                <h6 class="title"><a href="#">{{$pengabdian->deskripsi}}</a></h6>
                            </div> <!-- /.text -->
                        </div> <!-- /.single-blog-meta -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- /.row -->
        <div class="">
            {{$pengabdians->links()}}
        </div>
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->
@endsection
