@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Maintenance Requests</h1>
			<hr>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Issue Title</th>
						<th scope="col">Issue Type</th>
						<th scope="col">Description</th>
						<th scope="col">Created At</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($requests as $request)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $request->title }}</td>
							<td>{{ $request->type }}</td>
							<td>{{ $request->description }}</td>
							<td>{{ $request->created_at }}</td>
						</tr>
					@empty
						<tr><td colspan="5">No requests found!</td></tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection
