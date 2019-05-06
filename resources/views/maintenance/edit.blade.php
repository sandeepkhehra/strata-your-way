@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<h1 class="text-center">Update Maintenance Request #{{ $maintenance->id }} </h1>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
			<hr>

			<form action=" {{ route('maintenance.update', $maintenance->id) }} " method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group row">
					<label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
					<div class="col-md-6">
						<select name="status" id="status" class="form-control" required>
							@foreach ($maintenance::STATUSES as $key => $status)
							<option value="{{ $status }}" {{ $maintenance->status === $status ? 'selected' : ($status === 'new' ? 'disabled' : '') }}>{{ $key }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div data-status-switch>
					<div class="form-group row" id="allocated" {!! $maintenance->status !== 'allocated' ? 'style="display: none"' : '' !!}>
						<label for="assigned" class="col-md-4 col-form-label text-md-right">Allocate User</label>
						<div class="col-md-6">
							<select name="assigned" id="assigned" class="form-control">
								@forelse ($adminUsers as $userID)
									@php($user = App\User::find($userID))

									@if ($user)
										<option value="{{ $user->id }}" {{ $maintenance->assigned == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
									@endif

								@empty
								<option value="">No user found!</option>

								@endforelse
							</select>
						</div>
					</div>

					<div class="form-group row" id="quoted" {!! $maintenance->status !== 'quoted' ? 'style="display: none"' : '' !!}>
						<label for="quote" class="col-md-4 col-form-label text-md-right">Quote Number</label>
						<div class="col-md-6 form-group">
							<input type="text" id="quote" name="quote" value="{{ $maintenance->quote }}" class="form-control" placeholder="Quote Number">
						</div>
						<label for="title" class="col-md-4 col-form-label text-md-right">External Contractor Names</label>
						<div class="col-md-6">
							<textarea name="contractors" id="contractors" class="form-control" placeholder="External Contractor Names">{{ $maintenance->contractors }}</textarea>
							<small><i class="fa fa-info-circle" aria-hidden="true"></i> Comma separated names</small>
						</div>
					</div>

					<div class="form-group row" id="invoiced" {!! $maintenance->status !== 'invoiced' ? 'style="display: none"' : '' !!}>
						<label for="invoice" class="col-md-4 col-form-label text-md-right">Invoice Number</label>
						<div class="col-md-6 form-group">
							<input type="text" id="invoice" name="invoice" value="{{ $maintenance->invoice }}" class="form-control" placeholder="Invoice Number">
						</div>
						<label for="attachment" class="col-md-4 col-form-label text-md-right">Invoice File</label>
						<div class="col-md-6">
							@if (empty($maintenance->attachment))
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="attachment" class="custom-file-input" id="attachment">
										<label class="custom-file-label" for="attachment">Choose Invoice file</label>
									</div>
								</div>
							@else
								<a href="{{ Storage::url($maintenance->attachment) }}" class="btn btn-info">View Document</a>
								{{-- <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button> --}}
							@endif
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right">Original Issue</label>
					<div class="col-md-6">
						<input type="text" class="form-control form-group" value="{{ $maintenance->title }}" disabled>
						<textarea class="form-control" disabled>{{ $maintenance->description }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="comments" class="col-md-4 col-form-label text-md-right">Additional Comments</label>
					<div class="col-md-6">
						<textarea name="comments" id="comments" class="form-control">{{ $maintenance->comments }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Update Request</button>
						<a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>

			<form action=" {{ route('maintenance.destroy', $maintenance->id) }} " method="POST">
				@csrf
				@method('DELETE')

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Request</button>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
