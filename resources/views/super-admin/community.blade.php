@extends('layouts.app')

@section('title', 'Admin Area')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@endif

    <div class="row justify-content-center">
		<div class="col-md-6">
			@include('shared.users._community-details')
		</div>
        <div class="col-md-6">
			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">All Users</h5>
					<ul class="list-group">

						@php($userClass = new App\User)
						@forelse ($lotUsers as $user)
							@if ($user)
								<li class="list-group-item">
									<a href="{{ route('super.user', $user->id) }}">{{ $user->name }}</a>
									<a href="#" data-user-id="{{ $user->id }}" data-delete-user class="text-danger float-right">Delete</a>
								</li>
							@else
								<li class="list-group-item list-group-item-danger">User id {{ $userID }} is deleted!</li>
							@endif
						@empty
							<li class="list-group-item">No users found!</li>
						@endforelse
					</ul>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Community Documents</h5>
					<a href="{{ route('community.show', $community->id) }}" class="card-link">View All &rarr;</a>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
