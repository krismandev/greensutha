@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Selamat Datang {{auth()->user()->name}}</h3>
		<p class="panel-subtitle">Update terbaru hari ini</p>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-newspaper-o"></i></span>
					<p>
						<span class="number">{{total_post()}}</span>
						<span class="title">Berita</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<p>
						<span class="number">{{total_foto()}}</span>
						<span class="title">Foto</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<p>
						<span class="number">{{total_poster()}}</span>
						<span class="title">Poster</span>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<p>
						<span class="number">{{total_event()}}</span>
						<span class="title">Event</span>
					</p>
				</div>
			</div>

		</div>
    <div class="row">
			<div class="col-md-3">
				<div class="metric">
					<span class="icon"><i class="fa fa-eye"></i></span>
					<p>
						<span class="number">{{total_tim()}}</span>
						<span class="title">Tim</span>
					</p>
				</div>
			</div>
    </div>

	</div>
</div>
@stop
