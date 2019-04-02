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
								<td>Name</td>
								<td>Some com</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">Lot Owner Details</div>
				<div class="card-body">
					<table>
						<tbody>
							<tr>
								<td>Name</td>
								<td>Some com</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div style="min-height: 1900px">
				<h2>Community Wall</h2>
				<hr>
			</div>
		</div>
        <div class="col-md-6 position-sticky">
            <div class="card">
                    <a href="{{ route('maintenance.create') }}">Maintenance Form</a>
                    <a href="{{ route('user.edit', $user->userDetail->id) }}">Contact Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
