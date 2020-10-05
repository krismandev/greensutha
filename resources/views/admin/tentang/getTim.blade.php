@extends('admin/layouts/master')
@section('title','Tim')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
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
      <h3 class="panel-title">Halaman Tim</h3>
    </div>
    <div class="col-md-6">
      <a href="" class="btn btn-primary navbar-btn-right" id="btn-tambahuser" data-toggle="modal" data-target="#tambahuser">
        Tambah tim
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($tims->count() != 0)
    <table class="table table-hover" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gambar</th>
					<th>Aksi</th>
        </tr>
      </thead>
      <tbody>
				@foreach($tims as $tim)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$tim->user->name}}</td>
          <td> <img src="{{$tim->getAvatar()}}" alt="" style="max-width: 100px; max-height: 100px;"> </td>
					<td> <a href="#" class="btn btn-primary edit-user" title="Edit" data-toggle="modal" data-target="#edituser" data-tim_id="{{$tim->id}}" data-email="{{$tim->user->email}}" data-name="{{$tim->user->name}}"> <i class="lnr lnr-pencil"></i>  </a> </td>
        </tr>
				@endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada data tim</h3>
    @endif
  </div>
</div>
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('storeTim')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row form-group">
              <div class="col-md-4">
                <span>Nama</span>
              </div>
              <div class="col-md-8">
                <input type="text" name="name" value="" class="form-control" placeholder="Nama...">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-4">
                <span>Email </span>
              </div>
              <div class="col-md-8">
                <input type="email" name="email" value="" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-4">
                <span>Posisi/Jabatan</span>
              </div>
              <div class="col-md-8">
                <input type="text" name="posisi" value="" class="form-control">
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

<!-- EDIT USER- ___________________________________________________________________________________--- -->

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('updateTim')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row form-group">
              <div class="col-md-4">
                <span>Nama</span>
              </div>
              <div class="col-md-8">
                <input type="hidden" name="tim_id" id="tim_id" value="">
                <input type="text" id="name" name="name" value="" class="form-control" placeholder="Nama...">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-4">
                <span>Email </span>
              </div>
              <div class="col-md-8">
                <input type="email" id="email" name="email" value="" class="form-control">
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#btn-tambahpost').click(function(){

		});
		$('.edit-user').click(function(){
			const tim_id = $(this).data('tim_id');
			const email = $(this).data('email');
			const name = $(this).data('name');


			$('#tim_id').val(tim_id);
			$('#email').val(email);
			$('#name').val(name);

		});

	});

</script>
@stop
