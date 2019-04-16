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

			{{-- <div class="card mb-3">
				<div class="card-header">Lot Owners</div>
				<div class="card-body">
					<table>
						<tbody>
							@forelse ($admin->community->users as $userID)
								@php($user = App\User::find($userID))
								<tr>
									<td>{{ $admin->name }} <a href="{{ route('user.edit', $admin->id) }}"><strong>View User</strong></a></td>
								</tr>
							@empty
								<tr><td>No user found!</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div> --}}

			<div>
				<h4 class="d-flex align-items-center justify-content-between">Community Wall <a href="{{ route('maintenance.create') }}" class="badge badge-primary text-right" style="font-size:55%">New Request</a></h4>
				<hr>

				<div class="list-group" style="max-height: 350px; overflow-y: auto">
					@include('shared.users._maintenance-requests')
				</div>
			</div>
		</div>
        <div class="col-md-6">
			{{-- <div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Update Maintenance Requests</h5>
					<a href="{{ route('maintenance.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div> --}}

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Amend Contact Details</h5>
					<a href="{{ route('user.index') }}" class="card-link">Own &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Community Documents</h5>
					<a href="{{ route('community.show', $admin->community->id) }}" class="card-link">View &rarr;</a>
					<a href="{{ route('community.new', $admin->community->id) }}" class="card-link">Upload &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Email Inbox</h5>
					<a href="{{ route('user.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><a href="#" data-toggle="modal" data-target="#levy-modal" class="card-link">Owner Levies<a></h5>
				</div>
			</div>
        </div>
    </div>
</div>

@include('admin.partials.levy-modal')
@includeWhen($admin->type === 0, 'admin.partials.community-link-modal')
@includeWhen($admin->type === 0, 'admin.partials.import-owner-modal')
@endsection
