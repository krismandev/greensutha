@extends('guest2.layouts.master')
@section('title','Survey')
@section('content')

<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Events</span>
        <h2 class="title">
            Survey
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    @foreach($surveys as $survey)
                    <div class="col-md-4">
                        <div class="single-blog-meta">
                            <div class="img-box">
                                @if ($survey->link != null)
                                <iframe src="{{$survey->link}}" width="100%" height="100%"></iframe>
                                @else
                                <img src="{{url('events/'.$survey->gambar)}}" alt="" style="width:100%; height: 339px; object-fit: cover; object-position: center;">
                                @endif
                                {{-- <a href="#" class="date">{{date('d M Y',strtotime($survey->created_at))}}</a> --}}
                            </div>
                            <div class="text">
                                <h6 class="title"><a href="#">{{$survey->nama_event}}</a></h6>
                            </div> <!-- /.text -->
                        </div> <!-- /.single-blog-meta -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- /.row -->
        <div class="">
            {{$surveys->links()}}
        </div>
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->
@endsection
