@extends('layouts.app')

@section('title', 'Lot User Details')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h1 class="text-center">{{ $user->user->name }} Details</h1>
			<hr>

			<form method="POST" action="{{ route('user.update', $user->id) }}">
				@csrf
				@method('PUT')
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
					<div class="col-md-6">
						<input
							id="name"
							type="text"
							name="name"
							value="{{ $user->user->name }}"
							required="required"
							autofocus="autofocus"
							placeholder="Name"
							class="form-control"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label for="address" class="col-md-4 col-form-label text-md-right">Postal Address</label>
					<div class="col-md-6 form-group">
						<input
							id="address"
							type="text"
							name="address"
							value="{{ $user->name }}"
							required="required"
							placeholder="Address Line 1"
							class="form-control"
						/>
					</div>
					<div class="col-md-6 offset-md-4">
						<input
							type="text"
							name="address[2]"
							value="{{ $user->name }}"
							placeholder="Address Line 2"
							class="form-control"
						/>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-2 offset-md-4">
						<input type="text" placeholder="Post Code" class="form-control">
					</div>
					<div class="col-md-2">
						<select name="country" class="form-control" readonly>
							<option value="AUS" selected>Australia</option>
						</select>
					</div>
					<div class="col-md-2">
						<select name="state" class="form-control">
							<option value="SA">SA</option>
							<option value="VIC">VIC</option>
							<option value="NSW">NSW</option>
							<option value="QLD">QLD</option>
							<option value="ACT">ACT</option>
							<option value="WA">WA</option>
							<option value="TAS">TAS</option>
							<option value="NT">NT</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">Email Addresses</label>
					<div class="col-md-2">
							<input
							id="email"
							type="email"
							name="email[1]"
							value="{{ $user->details->email->{'1'} }}"
							required="required"
							placeholder="Email Address 1"
							class="form-control"
						/>
					</div>
					<div class="col-md-2">
							<input
							type="email"
							name="email[2]"
							value="{{ $user->details->email->{'2'} }}"
							required="required"
							placeholder="Email Address 2"
							class="form-control"
						/>
					</div>
					<div class="col-md-2">
							<input
							type="email"
							name="email[3]"
							value="{{ $user->details->email->{'3'} }}"
							required="required"
							placeholder="Email Address 3"
							class="form-control"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label for="tel" class="col-md-4 col-form-label text-md-right">Phone Number</label>
					<div class="col-md-3">
							<input
							id="tel"
							type="tel"
							name="tel[home]"
							value="{{ $user->details->tel->home }}"
							required="required"
							placeholder="Home phone number"
							class="form-control"
						/>
					</div>
					<div class="col-md-3">
							<input
							type="tel"
							name="tel[mobile]"
							value="{{ $user->details->tel->mobile }}"
							required="required"
							placeholder="Mobile phone number"
							class="form-control"
						/>
					</div>
				</div>

				<h2 class="text-center mt-5">Preferred Method of Communication</h2>
				<hr>
				<div class="form-group row">
					<label for="postal" class="col-md-4 col-form-label text-md-right">AGM notices and minutes</label>
					<div class="col-md-6">
						<div class="btn-group-toggle text-muted" data-toggle="buttons">
							<label class="btn btn-secondary {{ isset($user->details->communication->agm->email1)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[agm][email1]" autocomplete="off"
								{{ isset($user->details->communication->agm->email1)  ? 'checked' : '' }}
								> Email Address 1
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->agm->email2)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[agm][email2]" autocomplete="off"
								{{ isset($user->details->communication->agm->email2)  ? 'checked' : '' }}
								> Email Address 2
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->agm->email3)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[agm][email3]" autocomplete="off"
								{{ isset($user->details->communication->agm->email3)  ? 'checked' : '' }}
								> Email Address 3
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->agm->sms)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[agm][sms]" autocomplete="off"
								{{ isset($user->details->communication->agm->sms)  ? 'checked' : '' }}
								> SMS
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->agm->post)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[agm][post]" autocomplete="off"
								{{ isset($user->details->communication->agm->post)  ? 'checked' : '' }}
								> Post
							</label>
						</div>
					</div>

					{{-- <div class="row col-md-6">
						<div class="form-group col-md-12">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-secondary {{ isset($user->details->communication->agm) ? 'active' : '' }}">
									<input type="radio" name="communication[agm]" id="agm" autocomplete="off"
									{{ isset($user->details->communication->agm) ? 'checked' : '' }}
									> AGM notices and minutes
								</label>
								<label class="btn btn-secondary {{ isset($user->details->communication->levy) ? 'active' : '' }}">
									<input type="radio" name="communication[levy]" id="levy" autocomplete="off"
									{{ isset($user->details->communication->levy) ? 'checked' : '' }}
									> Strata levy notices
								</label>
								<label class="btn btn-secondary {{ isset($user->details->communication->other) ? 'active' : '' }}">
									<input type="radio" name="communication[other]" id="other" autocomplete="off"
									{{ isset($user->details->communication->other)  ? 'checked' : '' }}
									> Other communication
								</label>
							</div>
						</div>
						<div class="form-group col-md-12">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-secondary {{ isset($user->details->medium->email1)  ? 'active' : '' }}">
									<input type="checkbox" name="medium[email1]" id="email1" autocomplete="off"
									{{ isset($user->details->medium->email1)  ? 'checked' : '' }}
									> Email Address 1
								</label>
								<label class="btn btn-secondary {{ isset($user->details->medium->email2)  ? 'active' : '' }}">
									<input type="checkbox" name="medium[email2]" id="email2" autocomplete="off"
									{{ isset($user->details->medium->email2)  ? 'checked' : '' }}
									> Email Address 2
								</label>
								<label class="btn btn-secondary {{ isset($user->details->medium->email3)  ? 'active' : '' }}">
									<input type="checkbox" name="medium[email3]" id="email3" autocomplete="off"
									{{ isset($user->details->medium->email3)  ? 'checked' : '' }}
									> Email Address 3
								</label>
								<label class="btn btn-secondary {{ isset($user->details->medium->sms)  ? 'active' : '' }}">
									<input type="checkbox" name="medium[sms]" id="sms" autocomplete="off"
									{{ isset($user->details->medium->sms)  ? 'checked' : '' }}
									> SMS
								</label>
								<label class="btn btn-secondary {{ isset($user->details->medium->post)  ? 'active' : '' }}">
									<input type="checkbox" name="medium[post]" id="post" autocomplete="off"
									{{ isset($user->details->medium->post)  ? 'checked' : '' }}
									> Post
								</label>
							</div>
						</div>
					</div> --}}
				</div>

				<div class="form-group row">
					<label for="postal" class="col-md-4 col-form-label text-md-right">Strata levy notices</label>
					<div class="col-md-6">
						<div class="btn-group-toggle text-muted" data-toggle="buttons">
							<label class="btn btn-secondary {{ isset($user->details->communication->levy->email1)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[levy][email1]" autocomplete="off"
								{{ isset($user->details->communication->levy->email1)  ? 'checked' : '' }}
								> Email Address 1
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->levy->email2)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[levy][email2]" autocomplete="off"
								{{ isset($user->details->communication->levy->email2)  ? 'checked' : '' }}
								> Email Address 2
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->levy->email3)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[levy][email3]" autocomplete="off"
								{{ isset($user->details->communication->levy->email3)  ? 'checked' : '' }}
								> Email Address 3
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->levy->sms)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[levy][sms]" autocomplete="off"
								{{ isset($user->details->communication->levy->sms)  ? 'checked' : '' }}
								> SMS
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->levy->post)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[levy][post]" autocomplete="off"
								{{ isset($user->details->communication->levy->post)  ? 'checked' : '' }}
								> Post
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="postal" class="col-md-4 col-form-label text-md-right">Other communication</label>
					<div class="col-md-6">
						<div class="btn-group-toggle text-muted" data-toggle="buttons">
							<label class="btn btn-secondary {{ isset($user->details->communication->other->email1)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[other][email1]" autocomplete="off"
								{{ isset($user->details->communication->other->email1)  ? 'checked' : '' }}
								> Email Address 1
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->other->email2)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[other][email2]" autocomplete="off"
								{{ isset($user->details->communication->other->email2)  ? 'checked' : '' }}
								> Email Address 2
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->other->email3)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[other][email3]" autocomplete="off"
								{{ isset($user->details->communication->other->email3)  ? 'checked' : '' }}
								> Email Address 3
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->other->sms)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[other][sms]" autocomplete="off"
								{{ isset($user->details->communication->other->sms)  ? 'checked' : '' }}
								> SMS
							</label>
							<label class="btn btn-secondary {{ isset($user->details->communication->other->post)  ? 'active' : '' }}">
								<input type="checkbox" name="communication[other][post]" autocomplete="off"
								{{ isset($user->details->communication->other->post)  ? 'checked' : '' }}
								> Post
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Update Details</button>
						<button type="button" class="btn btn-danger">Cancel</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection