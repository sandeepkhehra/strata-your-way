@extends('layouts.app')

@section('title', 'Super Admin Area')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col"></th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manage All Users</td>
						<td>
							<a class="btn btn-primary" href="{{ route('super.users') }}"><i class="fa fa-users"></i> Manage Users</a>
						</td>
					</tr>
					<tr>
						<td>Manage All Communities</td>
						<td><a class="btn btn-primary" href="{{ route('super.communities') }}"><i class="fa fa-home"></i> Manage Communities</a></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection

