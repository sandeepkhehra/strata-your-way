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
						<th scope="col">Community Name</th>
						<th scope="col">Community Admin</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($communities as $community)
					@php($userClass = new App\User)
						<tr>
							<td>{{ $community->name }}</td>
							<td>{{ $userClass::find($community->user_id) ? $userClass::find($community->user_id)->name : 'Admin profile doesn\'t exist!' }}</td>
							<td style="display:flex;">
								<a class="btn btn-primary" href="{{ route('super.community', $community->id) }}" style="margin-right:20px"><i class="fa fa-home"></i> Manage</a>
								<form data-delete-community action="{{ route('community.destroy', $community->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">No communities found!</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection

