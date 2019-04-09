@extends('layouts.app')

@section('title', 'Edit Contact Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Basic Details</h1>
			<hr>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif

			<form method="POST" action="{{ route('user.update', $user->id) }}">
				@csrf
				@method('PUT')

				@include('shared.users._user-details')
			</form>
        </div>
    </div>
</div>
@endsection
