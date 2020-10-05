@extends('admin/layouts/master')
@section('title','Kategori')
@section('header')
@stop
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
      <h3 class="panel-title">Halaman Kategori</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambahkategori"
         id="btn-tambahkategori">
        Tambah Kategori
      </a>
    </div>
  </div>
  <hr>
  <div class="panel-body" style="margin-top: 10px;">
    @if($kategoris->count() != 0)
    <table class="table table-hover" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Kategori</th>
        </tr>
      </thead>
      <tbody>
				@foreach($kategoris as $kategori)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$kategori->nama_kategori}}</td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada data kategori</h3>
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form class="" action="{{route('storeKategori')}}" method="post" enctype="multipart/form-data">
				@csrf
	      <div class="modal-body">
          <div class="row form-group">
            <div class="col-md-4">
              <span>Kategori</span>
            </div>
            <div class="col-md-8">
              <input type="text" name="nama_kategori" value="" class="form-control">
            </div>
          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
			</form>

    </div>
  </div>
</div>
@stop
@section('linkfooter')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {



	});

</script>
@stop
