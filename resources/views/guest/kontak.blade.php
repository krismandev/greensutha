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
              <label class="font-weight-bold" for="fullname">Nama </label>
              <input type="text" id="fullname" class="form-control" placeholder="Masukkan nama..." name="nama">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Masukkan email..." name="email">
            </div>
          </div>


          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="phone">Phone</label>
              <input type="text" id="phone" class="form-control" placeholder="Masukkan no. Telepon/Hp..." name="hp">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="message">Message</label>
              <textarea name="pesan" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Send Message" class="btn btn-primary text-white px-4 py-2">
            </div>
          </div>


        </form>
      </div>

      <div class="col-lg-4">
        <div class="p-4 mb-3 bg-white">
          <h3 class="h5 text-black mb-3">{{$kontak->nama}}</h3>
          <p class="mb-0 font-weight-bold">Alamat</p>
          <p class="mb-4">{{$kontak->alamat}}</p>

          <p class="mb-0 font-weight-bold">Hp</p>
          <p class="mb-4"><a href="#">{{$kontak->hp}}</a></p>

          <p class="mb-0 font-weight-bold">Email</p>
          <p class="mb-0"><a href="#">{{$kontak->email}}</a></p>

        </div>


      </div>
    </div>
  </div>
</div>
@if(session('success'))
<script>
  $(document).ready(function() {
    swal({
    title: "OK",
    text: "Berhasil mengirim pesan",
    icon: "success",
    });

});
</script>
@endif
@stop
