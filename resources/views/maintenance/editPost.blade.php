@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Update Post #{{ $post->id }} </h1>
			<hr>

			<form action=" {{ route('maintenance.update', $post->id) }} " method="POST">
				@csrf
				@method('PUT')
				<input type="hidden" name="status" value="new">
				<input type="hidden" name="isPost" value="yes">

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" for="title">Title</label>
					<div class="col-md-6">
						<input type="text" name="title" class="form-control form-group" value="{{ $post->title }}" id="title">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" for="description">Description</label>
					<div class="col-md-6">
						<textarea class="form-control" name="description" id="description">{{ $post->description }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Update Post</button>
						<a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>

			<form action=" {{ route('maintenance.destroy', $post->id) }} " method="POST">
				@csrf
				@method('DELETE')

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Post</button>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
