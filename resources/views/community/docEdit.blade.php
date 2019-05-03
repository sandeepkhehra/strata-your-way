@extends('layouts.app')

@section('title', 'Upload Community Documents')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Upload Community Documents</h1>
			<hr>

			<form action=" {{ route('community.update', $community->id) }} " method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group row">
					<label for="doc_type" class="col-md-4 col-form-label text-md-right">Document Type</label>
					<div class="col-md-6">
						<select name="doc_type" id="doc_type" class="custom-select">
							<option value="" selected disabled>&mdash; Select document type &mdash;</option>
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
						<button type="submit" class="btn btn-primary">Upload Document</button>
						<a href="{{ url('/') }}" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
