@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h4>Buku</h4>
		</div>
			<div class="col-sm-2">
				<a class="btn btn-sm btn-success" href="{{ route('buku.create')}}">Create new book list</a>
			</div>
		</div>

		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif

		<table class="table table-hover table-sm">
			<tr>
				<th width="50px">No.</th>
				<th width="250px"><b>Judul buku</b></th>
				<th width="250px"><b>Penerbit</b></th>
				<th width="250px"><b>Tahun terbit</b></th>
				<th width="250px"><b>Pengarang</b></th>
				<th width="180px"><b>Action</b></th>
			</tr>

			@foreach ($bukus as $buku)
			<tr>
				<td><b>{{++$i}}.</b></td>
				<td>{{$buku->judul}}</td>
				<td>{{$buku->penerbit}}</td>
				<td>{{$buku->tahun_terbit}}</td>
				<td>{{$buku->pengarang}}</td>
				<td>
					<form action="{{ route('buku.destroy',$buku->id) }}" method="post">
						<a class="btn btn-sm btn-success" href="{{ route('buku.show', $buku->id)}}">Show</a>
						<a class="btn btn-sm btn-warning" href="{{ route('buku.edit', $buku->id)}}">Edit</a>
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
				{!! $bukus->links() !!}
	</div>
@endsection