@extends('layouts.app')

@section('title', 'Create a Community')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h1 class="text-center">Create a Community</h1>
			<hr>

			<form method="POST" action="{{ route('community.store') }}">
				@csrf
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Community Name</label>
					<div class="col-md-6">
						<input
							id="name"
							type="text"
							name="name"
							value=""
							required="required"
							placeholder="Community Name"
							autofocus="autofocus"
							class="form-control"
						/>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">Community Email</label>
					<div class="col-md-6">
						<input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-md-4 col-form-label text-md-right">Community Phone</label>
					<div class="col-md-6">
						<input type="tel" id="phone" name="details[phone]" class="form-control" placeholder="Phone Number">
					</div>
				</div>
				<div class="form-group row">
					<label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
					<div class="col-md-6">
						<textarea name="details[address]" id="address" placeholder="Community Address" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="bank" class="col-md-4 col-form-label text-md-right">Bank Details</label>
					<div class="col-md-6">
						<textarea name="details[bank]" id="bank" placeholder="Bank Details" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="bpay" class="col-md-4 col-form-label text-md-right">BPAY Details</label>
					<div class="col-md-6">
						<textarea name="details[bpay]" id="bpay" placeholder="BPAY Details" class="form-control"></textarea>
					</div>
				</div>
				{{-- <div class="form-group row">
					<label for="users" class="col-md-4 col-form-label text-md-right">Nominated Admins</label>
					<div class="col-md-6">
						<select name="users[]" id="users" class="form-control">
							<option value="">Select a user</option>
							@forelse ($users as $user)
								<option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
							@empty
								<option value="">No user found!</option>
							@endforelse
						</select>
					</div>
				</div> --}}
				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Create a Community</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
