@extends('admin/layouts/master')
@section('title','Pesan')
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
      <h3 class="panel-title">Daftar pesan</h3>
    </div>

  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($pesans->count() != 0)
    <table class="table table-hover" id="data_pesans_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Waktu</th>
            <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
				@foreach($pesans as $pesan)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$pesan->nama}}</td>
          <td> {{date('d M Y H:i',strtotime($pesan->created_at))}} </td>
					<td>
						<a href="{{route('showPesan',$pesan->id)}}" class="btn btn-primary"> <i class="lnr lnr-eye"></i> </a>
						<a href="#" class="btn btn-danger hapus-pesan" data-pesan_id="{{$pesan->id}}"> <i class="lnr lnr-trash"></i> </a>

					</td>

        </tr>
                @endforeach
      </tbody>
    </table>
    @else
    <h3>Belum ada pesan masuk</h3>
    @endif
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
		$('#data_pesans_reguler').DataTable();
		$('.hapus-pesan').click(function(){
			const pesan_id = $(this).data('pesan_id');
			const hapus = confirm('Yakin ingin menghapus pesan ini?');

			if (hapus) {
				window.location = '../dashboard/pesan/delete/'+pesan_id;
			}


		});


	});

</script>
@stop
