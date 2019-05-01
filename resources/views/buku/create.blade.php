@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Create new book list</h4>
		</div>
	</div>

	@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Ups !!!</strong>there where some problem with your input.<br>
		<ul>
			@foreach ($errors as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ route('buku.store') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<strong>Judul</strong>
				<input type="text" name="judul" class="form-control" placeholder="Judul">
			</div>
			<div class="col-md-12">
				<strong>Penerbit</strong>
				<input type="text" name="penerbit" class="form-control" placeholder="Penerbit">
			</div>
			<div class="col-md-12">
				<strong>Tahun terbit</strong>
				<input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun terbit">
			</div>
			<div class="col-md-12">
				<strong>pengarang</strong>
				<input type="text" name="pengarang" class="form-control" placeholder="Pengarang">
			</div>
			<div class="col-md-12"><br>
				<a href="{{ route('buku.index')}}" class="btn btn-sm btn-success">Back</a>
				<button type="submit" class="btn btn-sm btn-primary">Save</button>
				
			</div>

		</div>
		
	</form>
</div>
@endsection


