@forelse ($maintenanceRequests as $request)
	<a href="{{ route('maintenance.edit', $request->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
		<div class="d-flex w-100 justify-content-between">
			<h6 class="mb-1">Maintenance Issue #{{ $request->id }} has been Logged: <br><small>{{ array_search($request->type, $request::TYPES) }}</small></h6>
			{{-- <h4 class="mb-1">{{ $request->title }}</h4> --}}
			<small>{{ $request->created_at->diffForHumans() }}</small>
		</div>
		<p class="mb-1">{{ $request->description }}</p>
		{{-- <small>{{ array_search($request->type, $request::TYPES) }}</small> --}}

		<span class="badge badge-secondary">{{ array_search($request->status, $request::STATUSES) }}</span>
	</a>
@empty
	<h6>No requests found!</h6>
@endforelse