@extends('layouts.app')

@section('title', 'View Community Documents')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">View Community Documents</h1>
			<hr>

			<div class="form-group row">
				<label for="view-doc-type" class="col-md-4 col-form-label text-md-right">Document Type</label>
				<div class="col-md-6">
					<select id="view-doc-type" data-id="{{ $community->id }}" class="custom-select">
						<option value="" selected disabled>&mdash; Select document type &mdash;</option>
						@foreach ($community::DOC_TYPES as $key => $type)
							<option value="{{ $type }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row" data-docs-list>
				<div class="col-md-12">
					<ul class="list-group">
					</ul>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
