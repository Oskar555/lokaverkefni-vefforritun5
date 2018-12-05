@extends('layouts/app')

@section('content')
<body>
	<h1>
		{{ $thread->title }}
	</h1>
	<img style="max-width: 8000px; max-height: 300px;" src="{{ asset('storage/' . $thread->image_path) }}">
	<p>
		{{ $thread->body }}
	</p>
	@auth
	<form method="POST" action="/threads/{{ $thread->id }}/comment">
		@csrf
		<div class="form-group">
			<textarea name="body" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Post</button>
		</div>
	</form>
	@else
		<p>Please sign in to leave a comment</p>
	@endauth
	@foreach($thread->comments()->latest()->get() as $comment)
		<h6>{{ $comment->user->name }}</h6>
		<p>{{ $comment->body }}</p>
		<p>{{ $comment->created_at }}</p>
	@endforeach
@endsection