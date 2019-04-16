@extends('layouts.app')

@section('title', 'Edit Contact Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Basic Details</h1>
			<hr>

			<form method="POST" action="{{ route('user.update', $user->id) }}">
				@csrf
				@method('PUT')

				@include('shared.users._user-details')
			</form>
        </div>
    </div>
</div>
@endsection
