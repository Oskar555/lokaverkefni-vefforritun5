@extends('layouts/app')

@section('title', 'Edit')

@section('content')
<h1>edit thread</h1>
	<form method="POST" action="{{ $thread->path() }}">
		@csrf
		@method('patch')
		<div class="form-group">
			<input placeholder="title" type="text" name="title" class="form-control" value="{{ $thread->title }}" required>
		</div>
		<div class="form-group">
			<textarea placeholder="body" name="body" class="form-control">{{ $thread->body }}</textarea required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary">update</button>
		</div>
	</form>
@endsection