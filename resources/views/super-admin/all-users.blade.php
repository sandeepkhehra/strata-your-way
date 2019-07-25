@extends('layouts.app')

@section('title', 'Super Admin Area')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@endif

    <div class="row justify-content-center">
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Role</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td scope="row">{{ $loop->index + 1 }}</td>
						<th>{{ $user->name}}</th>
						<td>{{ $user->type === 0 ? 'Admin' : ( $user->type === 1 ? 'Lot Owner' : ( $user->type === 3 ? 'Invited Lot Owner' : '&mdash;' ) ) }}</td>
						<td>
							<form data-delete-user action="{{ route('user.delete', $user->id) }}" method="POST">
								@csrf
								@method('DELETE')

								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete User</button>
									</div>
								</div>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection

