@extends('layouts.app')

@section('title', 'View Lot Owner Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">{{ $user->user ? $user->user->name : $admin->name }} Details</h1>
			<hr>

			<form>
				@include('shared.users._user-details')
			</form>
        </div>
    </div>
</div>
@endsection
