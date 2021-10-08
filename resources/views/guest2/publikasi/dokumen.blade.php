@extends('guest2.layouts.master')
@section('title','Dokumen')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@stop
@section('content')
<div class="our-blog blog-inner-page section-spacing">
    <div class="theme-title-one text-center">
        <h2 class="title">
            Dokumen
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-12">
                <table class="table table-striped" id="data_dokumens_reguler">
                    <thead>
                      <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Download</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($dokumens != null)
                        @foreach($dokumens as $dokumen)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dokumen->judul}}</td>
                            <td>
                                <a href="{{url('pubikasi/'.$dokumen->file)}}">PDF</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>

                <div class="theme-pagination">
                    <ul class="clearfix">
                        {{$dokumens->links()}}
                    </ul>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-portfolio -->

@endsection
@section('linkfooter')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#data_dokumens_reguler").DataTable();
    });
</script>
@endsection
