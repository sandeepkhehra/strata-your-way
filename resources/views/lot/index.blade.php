@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-6">
			@include('shared.users._community-details')

			<div class="card mb-3">
				<div class="card-header">Lot Owner Details</div>
				<div class="card-body">
					<table>
						<tbody>
							<tr>
								<td colspan="2"><i class="fa fa-home"></i> <strong>
									{{ $user->userDetail->details->address->{'1'} }}
									{{ $user->userDetail->details->address->{'2'} }}
									{{ $user->userDetail->details->address->state }}
									{{ $user->userDetail->details->address->postal }}
									{{ $user->userDetail->details->address->country }}
								</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div>
				<h2 class="d-flex align-items-center justify-content-between">Community Wall <a href="{{ route('maintenance.create') }}" class="badge badge-primary text-right" style="font-size:55%">New Request</a></h2>
				<hr>

				<div class="list-group">
					@include('shared.users._maintenance-requests')
				</div>
			</div>
		</div>

        <div class="col-md-6">
			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Log Maintenance</h5>
					<a href="{{ route('maintenance.create') }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Update Contact Details</h5>
					<a href="{{ route('user.edit', $user->id) }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">View Community Documents</h5>
					<a href="{{ route('user.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div>

			<div class="card mb-3" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Send Message to Management Community</h5>
					<a href="{{ route('user.index') }}" class="card-link">View &rarr;</a>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
