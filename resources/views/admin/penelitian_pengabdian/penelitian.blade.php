@extends('admin.layouts.master')
@section('title')
    penelitian
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
        <h3 class="panel-title">Halaman data Penelitian</h3>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#myModal">
            Tambah
        </a>
      </div>
    </div>
    <div class="panel-body" style="margin-top: 10px;">
        <table class="table table-striped" id="data_penelitians_reguler">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($penelitians!= null)
                    @foreach ($penelitians as $penelitian)

                    <tr>
                        <td>{{$penelitian->deskripsi}}</td>
                        <td>
                            <a href="{{url('penelitian/'.$penelitian->gambar)}}">
                                <img src="{{url('penelitian/'.$penelitian->gambar)}}" alt="{{$penelitian->deskripsi}}" style="max-width: 150px;">
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger hapus-penelitian" data-penelitian_id="{{$penelitian->id}}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


{{-- MODAL ADD penelitian --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postPenelitian')}}" method="POST" enctype="multipart/form-data">
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data_penelitians_reguler').DataTable();

        $(".hapus-penelitian").click(function (e) {
            const penelitian_id = $(this).data("penelitian_id");

            swal({
                title: "Yakin?",
                text: "Mau menghapus penelitian ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/dashboard/penelitian/delete/"+penelitian_id;
                }
            });
        });
    });
</script>
@endsection
