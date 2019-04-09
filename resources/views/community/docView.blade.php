@extends('layouts.app')

@section('title', 'View Community Documents')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">View Community Documents</h1>
			<hr>

			<div class="form-group row">
				<label for="view_doc_type" class="col-md-4 col-form-label text-md-right">Document Type</label>
				<div class="col-md-6">
					<select id="view_doc_type" data-id="{{ $community->id }}" class="custom-select">
						<option value="" selected disabled>Select document type</option>
						@foreach ($community::DOC_TYPES as $key => $type)
							<option value="{{ $type }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-12">
					<ul class="list-group">
					</ul>
				</div>
			</div>

			{{-- <form action=" {{ route('community.update', $community->id) }} " method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group row">
					<label for="doc_type" class="col-md-4 col-form-label text-md-right">Document Type</label>
					<div class="col-md-6">
						<select name="doc_type" id="doc_type" class="form-control">
							@foreach ($community::DOC_TYPES as $key => $type)
								<option value="{{ $type }}">{{ $key }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="file" class="col-md-4 col-form-label text-md-right">Document File</label>
					<div class="col-md-6">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input" id="file">
								<label class="custom-file-label" for="file">Choose Document file</label>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button class="btn btn-primary">Update Request</button>
						<a href="{{ url('admin-area') }}" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</form> --}}
        </div>
    </div>
</div>
@endsection
