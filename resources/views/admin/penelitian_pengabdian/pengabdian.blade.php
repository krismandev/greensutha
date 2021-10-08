@extends('admin.layouts.master')
@section('title')
    Pengabdian
@endsection
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@endsection
@section('content')
@if(session('success'))

<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{session('success')}}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<div class="panel">
    <div class="panel-heading">
      <div class="col-md-6">
        <h3 class="panel-title">Halaman Pengabdian</h3>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#myModal">
            Tambah
        </a>
      </div>
    </div>
    <div class="panel-body" style="margin-top: 10px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($pengabdians->count() != null)
                    @foreach ($pengabdians as $pengabdian)

                    <tr>
                        <td>{{$pengabdian->deskripsi}}</td>
                        <td>
                            <a href="{{url('pengabdian/'.$pengabdian->gambar)}}">
                                <img src="{{url('pengabdian/'.$pengabdian->gambar)}}" alt="{{$pengabdian->deskripsi}}" style="max-width: 150px;">
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger hapus-pengabdian" data-pengabdian_id="{{$pengabdian->id}}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


{{-- MODAL ADD pengabdian --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postPengabdian')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Deskripsi..." name="deskripsi" value="{{old('deskripsi')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Gambar / Poster</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info waves-effect">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('linkfooter')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(".hapus-pengabdian").click(function (e) {
        const pengabdian_id = $(this).data("pengabdian_id");

        swal({
            title: "Yakin?",
            text: "Mau menghapus pengabdian ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/dashboard/pengabdian/delete/"+pengabdian_id;
            }
        });
    });
</script>
@endsection
