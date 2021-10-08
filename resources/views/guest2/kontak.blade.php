@extends('guest2.layouts.master')
@section('title',__('navbar.kontak'))
@section('header')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
<div class="contact-us-page section-spacing">
    <div class="container">
        <div class="title">
            <h2>{{__('navbar.kami_akan_membantu')}}</h2>
            {{-- <p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed base portals after potentialities.</p> --}}
        </div>
        <div class="address">
            <ul class="clearfix">
                @if($kontak != null)
                <li>
                    <i class="flaticon-map"></i>
                    <p>{{$kontak->alamat}}<br> </p>
                </li>
                <li>
                    <i class="flaticon-clock"></i>
                    <p>Mon - Fri 8.00 - 17.00 <br></p>
                </li>
                <li>
                    <i class="flaticon-phone-call"></i>
                    <p>{{$kontak->hp}} <br></p>
                </li>
                <li>
                    <i class="flaticon-email"></i>
                    <p>{{$kontak->email}}</p>
                </li>
                @endif
            </ul>
        </div>
        <form action="{{route('storePesan')}}" method="POST" class="theme-form-one form-validation" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12"><input type="text" placeholder="{{__('kontak.tulis_nama')}}" name="nama"></div>
                <div class="col-lg-4 col-sm-6 col-12"><input type="email" placeholder="{{__('kontak.tulis_email')}}" name="email"></div>
                <div class="col-lg-4 col-sm-6 col-12"><input type="text" placeholder="{{__('kontak.tulis_hp')}}" name="hp"></div>
                <div class="col-12"><textarea placeholder="{{__('kontak.tulis_pesan')}}" name="pesan"></textarea></div>
                <div class="col-12"><button class="theme-button-one" style="submit">{{__('kontak.kirim')}}</button></div>
            </div>
        </form>
    </div> <!-- /.container -->
    <!--Contact Form Validation Markup -->
    <!-- Contact alert -->
    <div class="alert-wrapper" id="alert-success">
        <div id="success">
            <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="wrapper">
                   <p>Your message was sent successfully.</p>
             </div>
        </div>
    </div> <!-- End of .alert_wrapper -->
    <div class="alert-wrapper" id="alert-error">
        <div id="error">
               <button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
               <div class="wrapper">
                   <p>Sorry!Something Went Wrong.</p>
            </div>
        </div>
    </div> <!-- End of .alert_wrapper -->
</div> <!-- /.contact-us-page -->
@if(session('success'))
    <h1>OKEEEEEEEEEEEEEEEEEEEEEEE</h1>
    <script>
        $(document).ready(function () {
            alert("Oke")
        });
    </script>
@endif
@endsection
