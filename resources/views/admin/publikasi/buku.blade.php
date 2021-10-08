@extends('admin.layouts.master')
@section('title')
    Buku
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
        <h3 class="panel-title">Halaman Data Buku</h3>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#myModal">
          Tambah Buku
        </a>
      </div>
    </div>
    <div class="panel-body" style="margin-top: 10px;">
        <table class="table table-striped" id="data_bukus_reguler">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($bukus->count() != null)
                    @foreach ($bukus as $buku)

                    <tr>
                        <td>{{$buku->judul}}</td>
                        <td>{!!Str::limit($buku->deskripsi,150)!!}</td>
                        <td>
                            <a href="{{url('publikasi/'.$buku->gambar)}}">
                                <img src="{{url('publikasi/'.$buku->gambar)}}" alt="{{$buku->nama_buku}}" style="max-width: 150px;">
                            </a>
                        </td>
                        <td>
                            <a href="{{route('editBuku',$buku->id)}}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <button class="btn btn-danger hapus-buku" data-buku_id="{{$buku->id}}">Hapus</button>
                            <a href="{{url('publikasi/'.$buku->file)}}" target="_blank">
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


{{-- MODAL ADD buku --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postBuku')}}" method="POST" enctype="multipart/form-data">
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
                            <label class="col-sm-12">File buku</label>
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
    $(".hapus-buku").click(function (e) {
        const buku_id = $(this).data("buku_id");

        swal({
            title: "Yakin?",
            text: "Mau menghapus buku ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/publikasi/buku/delete/"+buku_id;
            }
        });
    });

    $('#data_jurnals_reguler').DataTable();
</script>
@endsection
