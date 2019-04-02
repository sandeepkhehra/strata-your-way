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
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">Joined At</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($users as $user)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->details['phone'] }}</td>
							<td>{{ $user->created_at }}</td>
							<td>
								<a href="{{ route('user.show', $user->id) }}" class="btn btn-secondary">View</a>
								<a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
							</td>
						</tr>
					@empty
						<tr><td colspan="5">No users found!</td></tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection
