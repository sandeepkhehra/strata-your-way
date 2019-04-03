@extends('layouts.app')

@section('title', 'Create Maintenance Request')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Create Maintenance Request</h1>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<hr>

			@include('maintenance.includes._form')
        </div>
    </div>
</div>
@endsection
