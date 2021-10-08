@extends('guest2.layouts.master')
@section('title',__('navbar.publikasi_isi.buku'))
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
            {{__('navbar.publikasi_isi.buku')}}
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <div class="row">
                    @foreach($bukus as $buku)
                    <div class="col-md-4">
                        <div class="single-blog-meta">
                            <div class="img-box">
                                <img src="{{url('publikasi/'.$buku->gambar)}}" alt="" style="width:100%; height: 339px; object-fit: cover; object-position: center;">
                                <a href="{{url('publikasi/'.$buku->file)}}" class="date">Download</a>
                            </div>
                            <div class="text">
                                {{-- <ul class="buku-info clearfix">
                                    <li>By <a href="#">Consultpro</a></li>
                                    <li><a href="#">11 Likes</a></li>
                                    <li><a href="#">0 comment</a></li>
                                </ul> --}}
                                <h6 class="title show-detail" data-toggle="modal" data-target="#show-detail"
                                data-judul="{{$buku->judul}}"
                                data-deskripsi="{{$buku->deskripsi}}"><a href="#">{!!Str::limit($buku->judul,150)!!}</a></h6>
                            </div> <!-- /.text -->
                        </div> <!-- /.single-blog-meta -->
                    </div>
                    @endforeach
                </div>

                <div class="theme-pagination">
                    <ul class="clearfix">
                        {{$bukus->links()}}
                    </ul>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->


<!-- Scrollable modal -->
<!-- Modal -->
<div class="modal fade" id="show-detail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>
              Judul
          </h3>
          <p id="judul"></p>
          <h3 style="margin-top:20px;">
              Deskripsi
          </h3>
          <p id="deskripsi"></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('linkfooter')
<script>
    $(document).ready(function () {
        $(".show-detail").click(function (e) {
            e.preventDefault();
            const judul = $(this).data("judul");
            const deskripsi = $(this).data("deskripsi");

            $("#judul").html(judul);
            $("#deskripsi").html(deskripsi);
        });
    });
</script>
@endsection
