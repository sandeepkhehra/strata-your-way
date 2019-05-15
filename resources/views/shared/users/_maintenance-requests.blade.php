@forelse ($maintenanceRequests as $request)
	<a href="{{ Auth::user()->type != 0 ? '#' : route('maintenance.edit', $request->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
		<div class="d-flex w-100 justify-content-between">
			@if($request->type)
			<h6 class="mb-1">Maintenance Issue #{{ $request->id }} has been Logged: <br><small>{{ array_search($request->type, $request::TYPES) }}</small></h6>
			@else
			<h6 class="mb-1">Post #{{ $request->id }}: {{ $request->title }}</h6>
			@endif

			<small>{{ $request->created_at->diffForHumans() }}</small>
		</div>
		<p class="mb-1">{{ $request->description }}</p>

		@if($request->type)
		<span class="badge badge-secondary">{{ array_search($request->status, $request::STATUSES) }}</span>
		@endif
	</a>
@empty
	<h6>No requests found!</h6>
@endforelse