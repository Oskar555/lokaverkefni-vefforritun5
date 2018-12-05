@extends('layouts/app')

@section('title', 'Create')

@section('content')
<h1>Create new thread</h1>
	
	@if ($errors->any())
    	<div class="alert alert-danger">
    	    <ul>
    	        @foreach ($errors->all() as $error)
    	            <li>{{ $error }}</li>
    	        @endforeach
    	    </ul>
    	</div>
	@endif

	<form method="POST" action="/threads" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<input placeholder="title" type="text" name="title" class="form-control" value="{{ old('title') }}">
		</div>
		<div class="form-group">
			<textarea placeholder="body" name="body" class="form-control">{{ old('body') }}</textarea>
		</div>
		<div>
			<select name="category" class="form-control">
					@foreach ($Categories as $categorie)
						<option value="{{ $categorie }}">{{ $categorie }}</option>
					@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="file" name="image" accept="image/*">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>
@endsection