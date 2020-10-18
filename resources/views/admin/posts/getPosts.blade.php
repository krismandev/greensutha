@extends('admin/layouts/master')
@section('title','Berita')
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
      <h3 class="panel-title">Halaman Berita</h3>
    </div>
    <div class="col-md-6">
      <a href="{{route('createPost')}}" class="btn btn-primary navbar-btn-right" id="btn-tambahpost">
        Tambah berita
      </a>
    </div>
  </div>
  <div class="panel-body" style="margin-top: 10px;">
    @if($posts->count() != 0)
    <table class="table table-hover" id="data_posts_reguler" style="margin-top: 10px;">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Konten</th>
          <th>Gambar</th>
					<th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $i = 1;
        @endphp
				@foreach($posts as $post)
        <tr>
          <td>{{$posts->perPage()*($posts->currentPage()-1)+$i}}</td>
          @php $i++; @endphp
          <td>{!!Str::limit($post->judul,50)!!}</td>
          <td>{!!Str::limit($post->konten,150)!!}</td>
          <td> <img src="{{url('posts/'.$post->gambar)}}" alt="" style="max-width: 100px; max-height: 100px;"></td>
					<td>
						<a href="{{route('editPost',$post->id)}}" class="btn btn-primary" title="Edit"> <i class="lnr lnr-pencil"></i> </a>
						<a href="#" class="btn btn-danger hapus-post" title="Hapus"  data-post_id="{{$post->id}}"> <i class="lnr lnr-trash"></i> </a>
					</td>
        </tr>
				@endforeach
      </tbody>
    </table>
    <div class="">
      {{$posts->links()}}
    </div>
    @else
    <h3>Belum ada data post</h3>
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
		// $('#data_posts_reguler').DataTable({
    //   'order':[[5,'desc']]
    // });
		// $('#data_posts_reguler').DataTable();

		$('.hapus-post').click(function(){
			const post_id = $(this).data('post_id');
			const hapus = confirm('Yakin ingin menghapus berita ini?');

			if (hapus) {
				window.location = '../dashboard/berita/delete/'+post_id;
			}


		});

	});

</script>
@stop
