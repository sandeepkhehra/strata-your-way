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
						<th scope="col">Owner</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row" colspan="4">No data found!</td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection

