@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mb-3">
				<div class="card-header">Community Details</div>
				<div class="card-body">
					<table>
						<tbody>
							<tr>
								<td><strong>{{ $user->community->name }}</strong></td>
							</tr>
							<tr>
								<td><i class="fa fa-phone"></i> <a href="tel:{{ $user->community->details->phone }}"><strong>{{ $user->community->details->phone }}</strong></a></td>
								<td><i class="fa fa-envelope"></i> <a href="mailto:{{ $user->community->email }}"><strong>{{ $user->community->email }}</strong></a></td>
							</tr>
							<tr>
								<td colspan="2"><i class="fa fa-home"></i> <strong>{{ $user->community->details->address }}</strong></td>
							</tr>
							<tr>
								<td class="pt-3"><a href="{{ route('community.edit', $user->community->id) }}">Edit details &rarr;</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">Lot Owners</div>
				<div class="card-body">
					<table>
						<tbody>
							@forelse ($user->community->users as $userID)
								@php($user = App\User::find($userID))
								<tr>
									{{-- Show the "show" form instead! --}}
									{{-- <td>{{ $user->name }} <a href="{{ route('user.show', $user->id) }}"><strong>View User</strong></a></td> --}}
									<td>{{ $user->name }} <a href="{{ route('user.edit', $user->id) }}"><strong>View User</strong></a></td>
								</tr>
							@empty
								<tr><td>No user found!</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>

			<div style="min-height: 1900px">
				<h2 class="d-flex align-items-center justify-content-between">Community Wall <a href="{{ route('maintenance.create') }}" class="badge badge-primary text-right" style="font-size:55%">New Request</a></h2>
				<hr>

				<div class="list-group">
					@forelse ($maintenanceRequests as $request)
					<a href="{{ route('maintenance.edit', $request->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between">
								<h4 class="mb-1">{{ $request->title }}</h4>
								<small>{{ $request->created_at->diffForHumans() }}</small>
							</div>
							<p class="mb-1">{{ $request->description }}</p>
							<small>{{ $request->type }}</small>

							<span class="badge badge-secondary">{{ $request->status }}</span>
						</a>
					@empty
						<h6>No requests found!</h6>
					@endforelse
				</div>
			</div>
		</div>
        <div class="col-md-6">
			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Update Maintenance Requests</h5>
					<a href="{{ route('maintenance.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Amend Contact Details</h5>
					<a href="{{ route('user.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Community Documents</h5>
					<a href="{{ route('user.index') }}" class="card-link">View &rarr;</a>
					<a href="{{ route('community.show', $user->community->id) }}" class="card-link">Upload &rarr;</a>
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
					<h5 class="card-title">Owner Levies</h5>
					<a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="card-link">View &rarr;</a>
				</div>
			</div>
        </div>
    </div>
</div>

@include('admin.levies.partials.modal')
@endsection
