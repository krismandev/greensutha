@extends('admin.layouts.master')
@section('title')
    Annual Report
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
        <h3 class="panel-title">Halaman Annual Report</h3>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#myModal">
          Tambah
        </a>
      </div>
    </div>
    <div class="panel-body" style="margin-top: 10px;">
        <table class="table table-striped" id="data_reports_reguler">
            <thead>
                <tr>
                    <th>Nomor / Tahun</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($reports->count() != null)
                    @foreach ($reports as $report)

                    <tr>
                        <td>{{$report->nomor}}</td>
                        <td>{{$report->judul}}</td>
                        <td>
                            <a href="{{url('publikasi/'.$report->file)}}" target="_blank">
                                <button class="btn btn-info">Download</button>
                            </a>
                            <a href="#">
                                <button class="btn btn-danger hapus-report" data-report_id="{{$report->id}}">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


{{-- MODAL ADD report --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postReport')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Nomor / Tahun</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Nomor Dokumen / Laporan Tahunan" name="nomor" value="{{old('judul')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Judul</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Tulis judul disini..." name="judul" value="{{old('judul')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">File</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="file">
                                <small>* Format PDF</small>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function () {
    $(".hapus-report").click(function (e) {
        const report_id = $(this).data("report_id");

        swal({
            title: "Yakin?",
            text: "Mau menghapus data ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/dashboard/publikasi/report/delete/"+report_id;
            }
        });
    });

    $('#data_reports_reguler').DataTable();
   });
</script>
@endsection
