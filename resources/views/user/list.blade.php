@extends('layouts.app')

@section('title', 'Lot Owners List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Lot Owners</h1>
			<hr>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">User No.</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">Joined At</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($users as $user)
						@if (! is_null($user))
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->userDetail->details->tel->mobile }}</td>
							<td>{{ $user->created_at->diffForHumans() }}</td>
							<td>
								<a href="{{ route('user.edit', $user->userDetail->id) }}" class="btn btn-info">Edit</a>
							</td>
						</tr>
						@endif
					@empty
						<tr><td colspan="5">No users found!</td></tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection
