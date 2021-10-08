@extends('admin.layouts.master')
@section('title')
    Jurnal
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
<div class="panel">
    <div class="panel-heading">
      <div class="col-md-6">
        <h3 class="panel-title">Halaman Data Jurnal</h3>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#myModal">
          Tambah Jurnal
        </a>
      </div>
    </div>
    <div class="panel-body" style="margin-top: 10px;">
        <table class="table table-striped" id="data_jurnals_reguler">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($jurnals->count() != null)
                    @foreach ($jurnals as $jurnal)

                    <tr>
                        <td>{{$jurnal->judul}}</td>
                        <td>{!!Str::limit($jurnal->deskripsi,150)!!}</td>
                        <td>
                            <a href="{{url('publikasi/'.$jurnal->gambar)}}">
                                <img src="{{url('publikasi/'.$jurnal->gambar)}}" alt="{{$jurnal->nama_jurnal}}" style="max-width: 150px;">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('editJurnal',$jurnal->id)}}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <button class="btn btn-danger hapus-jurnal" data-jurnal_id="{{$jurnal->id}}">Hapus</button>
                            <a href="{{url('publikasi/'.$jurnal->file)}}" target="_blank">
                                <button class="btn btn-info">Download</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


{{-- MODAL ADD jurnal --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postJurnal')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Judul</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Tulis judul disini..." name="judul" value="{{old('judul')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Desripsi</label>
                            <div class="col-md-12">
                                <textarea class="form-control ckeditor" name="deskripsi" value="{{old('deskripsi')}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">File jurnal</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="file">
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
    $(".hapus-jurnal").click(function (e) {
        const jurnal_id = $(this).data("jurnal_id");

        swal({
            title: "Yakin?",
            text: "Mau menghapus jurnal ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/publikasi/jurnal/delete/"+jurnal_id;
            }
        });
    });
    $('#data_jurnals_reguler').DataTable();
</script>
@endsection
