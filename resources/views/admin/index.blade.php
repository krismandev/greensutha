@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Selamat Datang {{auth()->user()->name}}</h3>
		<p class="panel-subtitle">Update terbaru hari ini</p>
	</div>
	<div class="panel-body">
		

	</div>
</div>
@stop
