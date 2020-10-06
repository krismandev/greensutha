@extends('admin/layouts/master')
@section('title','Berita')
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
<div class="col-md-12">
	<!-- PANEL HEADLINE -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">{{$pesan->nama}}</h3>
      <h3 class="panel-title"> {{$pesan->email}} || {{$pesan->hp}} </h3>
			<p class="panel-subtitle">Dikirim pada {{date('d M Y H:i',strtotime($pesan->created_at))}}</p>
		</div>
		<div class="panel-body">
			<p>{{$pesan->pesan}}</p>
      <a href="{{route('getPesan')}}" class="btn btn-primary"> Kembali </a>
		</div>
	</div>
	<!-- END PANEL HEADLINE -->
</div>





@stop
@section('linkfooter')


@stop
