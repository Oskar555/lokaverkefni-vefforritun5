@extends('layouts/app')

@section('content')
	<h1>Breads</h1>

	<div>
		<ul style="text-align: center;">
			<li style="display: inline-block;">
				<a href="/threads?category=ask?">ask?</a>
			</li>
			<li style="display: inline-block;">
				<a href="/threads?category=anime & manga">anime & manga</a>
			</li>
			<li style="display: inline-block;">
				<a href="/threads?category=animals">animals</a>
			</li>
			<li style="display: inline-block;">
				<a href="/threads?category=cute">cute</a>
			</li>
			<li style="display: inline-block;">
				<a href="/threads?category=Funny">Funny</a>
			</li>
			<li style="display: inline-block;"><a href="/threads?category=Surprised Pikachu memes">Surprised Pikachu memes</a></li>
		</ul>
	</div>

	@foreach($threads as $thread)
	<div class="card mb-4">
		<div class="card-body">
   			<h5 class="card-title d-flex justify-content-between">
   				<a href="{{ $thread->path() }}">
   					{{ $thread->title }}
				</a>
				@if ($thread->image_path)
					<img style="max-width: 8000px; max-height: 300px;" src="{{ asset('storage/' . $thread->image_path) }}">
				@endif
				<div>
					@can('update', $thread)
						<a class="btn" href="/threads/{{ $thread->id }}/edit">Edit</a>
						<form method="POST" action="{{ $thread->path() }}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger">Delete</button>
						</form>
					@endcan()
				</div>
   			</h5>
   			<p class="card-text">
				{{ $thread->body }}
    		</p>
    		<h7 class="card-subtitle mb-2 text-muted">
    			<a href="/threads/user/{{ $thread->user->id }}">
    				{{ $thread->user->name }}
    			</a>
    		</h7>
    		<p style="font-size: 10px;">{{ $thread->created_at }}</p>
    		<p>category: {{ $thread->category }}</p>
    		<div style="text-align: center;">
    			<form style="display: inline-block;" method="POST" action="/threads/{{ $thread->id }}/upvote">
    				@csrf
    				<button>upvote</button>
				</form>
				<p style="display: inline-block;">{{ $thread->upvote }}</p>
				<form style="display: inline-block;" method="POST" action="/threads/{{ $thread->id }}/downvote">
					@csrf
					<button>downvote</button>
				</form>
    		</div>
  		</div>
	</div>
	@endforeach
@endsection