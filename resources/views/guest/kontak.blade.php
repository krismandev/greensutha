@extends('layouts.innerpage')
@section('title','Kontak')
@section('content')
<div class="site-section first-section" data-aos="fade">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">
        <form action="{{route('storePesan')}}" class="p-5 bg-white" method="post">
          @csrf
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="fullname">{{__('kontak.nama')}} </label>
              <input type="text" id="fullname" class="form-control" placeholder="{{__('kontak.tulis_nama')}}" name="nama">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="email">{{__('kontak.email')}}</label>
              <input type="email" id="email" class="form-control" placeholder="{{__('kontak.tulis_email')}}" name="email">
            </div>
          </div>


          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="phone">{{__('kontak.hp')}}</label>
              <input type="text" id="phone" class="form-control" placeholder="{{__('kontak.tulis_hp')}}" name="hp">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="message">{{__('kontak.pesan')}}</label>
              <textarea name="pesan" id="message" cols="30" rows="5" class="form-control" placeholder="{{__('kontak.tulis_pesan')}}"></textarea>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="{{__('kontak.kirim')}}" class="btn btn-primary text-white px-4 py-2">
            </div>
          </div>


        </form>
      </div>

      <div class="col-lg-4">
        <div class="p-4 mb-3 bg-white">
          <h3 class="h5 text-black mb-3">{{$kontak->nama}}</h3>
          <p class="mb-0 font-weight-bold">{{__('kontak.alamat')}}</p>
          <p class="mb-4">{{$kontak->alamat}}</p>

          <p class="mb-0 font-weight-bold">{{__('kontak.hp')}}</p>
          <p class="mb-4"><a href="#">{{$kontak->hp}}</a></p>

          <p class="mb-0 font-weight-bold">{{__('kontak.email')}}</p>
          <p class="mb-0"><a href="#">{{$kontak->email}}</a></p>

        </div>


      </div>
    </div>
  </div>
</div>



@stop
