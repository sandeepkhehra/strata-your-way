<div class="form-group row">
	<label for="name" class="col-md-4 col-form-label text-md-right">User No.</label>
	<div class="col-md-6">
		<input type="text" value="{{ isset($admin->userDetail->details->uno) ? $admin->userDetail->details->uno : $admin->id }}" class="form-control" disabled>
	</div>
</div>

<div class="form-group row">
	<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
	<div class="col-md-6">
		<input
			id="name"
			type="text"
			name="name"
			value="{{ $admin->name }}"
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
			name="address[1]"
			value="{{ isset($admin->userDetail->details->address->{'1'}) ? $admin->userDetail->details->address->{'1'} : '' }}"
			placeholder="Address Line 1"
			class="form-control"
		/>
	</div>
	<div class="col-md-6 offset-md-4">
		<input
			type="text"
			name="address[2]"
			value="{{ isset($admin->userDetail->details->address->{'2'}) ? $admin->userDetail->details->address->{'2'} : '' }}"
			placeholder="Address Line 2"
			class="form-control"
		/>
	</div>
</div>

<div class="form-group row">
	<div class="col-md-2 offset-md-4">
		<input type="text" name="address[postal]" value="{{ isset($admin->userDetail->details->address->postal) ? $admin->userDetail->details->address->postal : '' }}" placeholder="Post Code" class="form-control">
	</div>
	<div class="col-md-2">
		<select name="address[country]" class="form-control" readonly>
			<option value="AUS" selected>Australia</option>
		</select>
	</div>
	<div class="col-md-2">
		<select name="address[state]" class="form-control">
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'SA' ? 'selected' : '' }} value="SA">SA</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'VIC' ? 'selected' : '' }} value="VIC">VIC</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'NSW' ? 'selected' : '' }} value="NSW">NSW</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'QLD' ? 'selected' : '' }} value="QLD">QLD</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'ACT' ? 'selected' : '' }} value="ACT">ACT</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'WA' ? 'selected' : '' }} value="WA">WA</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'TAS' ? 'selected' : '' }} value="TAS">TAS</option>
			<option {{ isset($admin->userDetail->details->address->state) && $admin->userDetail->details->address->state == 'NT' ? 'selected' : '' }} value="NT">NT</option>
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
			value="{{ isset($admin->userDetail->details->email->{'1'}) ?
				$admin->userDetail->details->email->{'1'} : '' }}"
			placeholder="Email Address 1"
			class="form-control"
		/>
	</div>
	<div class="col-md-2">
			<input
			type="email"
			name="email[2]"
			value="{{ isset($admin->userDetail->details->email->{'2'}) ?
				$admin->userDetail->details->email->{'2'} : '' }}"
			placeholder="Email Address 2"
			class="form-control"
		/>
	</div>
	<div class="col-md-2">
			<input
			type="email"
			name="email[3]"
			value="{{ isset($admin->userDetail->details->email->{'3'}) ?
				$admin->userDetail->details->email->{'3'} : '' }}"
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
			value="{{ isset($admin->userDetail->details->tel->home) ?
				$admin->userDetail->details->tel->home : '' }}"
			placeholder="Home phone number"
			class="form-control"
		/>
	</div>
	<div class="col-md-3">
			<input
			type="tel"
			name="tel[mobile]"
			value="{{ isset($admin->userDetail->details->tel->mobile) ?
				$admin->userDetail->details->tel->mobile : '' }}"
			placeholder="Mobile phone number"
			class="form-control"
		/>
	</div>
</div>

<div class="form-group row">
	<label for="tel" class="col-md-4 col-form-label text-md-right">Area</label>
	<div class="col-md-6">
		<input type="text" name="area" value="{{ isset($admin->userDetail->details->area) ? $admin->userDetail->details->area : '' }}" class="form-control">
	</div>
</div>

<h2 class="text-center mt-5">Preferred Method of Communication</h2>
<hr>
<div class="form-group row">
	<label for="postal" class="col-md-4 col-form-label text-md-right">AGM notices and minutes</label>
	<div class="col-md-6">
		<div class="btn-group-toggle text-muted" data-toggle="buttons">
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->agm->email1)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[agm][email1]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->agm->email1)  ? 'checked' : '' }}
				> Email Address 1
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->agm->email2)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[agm][email2]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->agm->email2)  ? 'checked' : '' }}
				> Email Address 2
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->agm->email3)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[agm][email3]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->agm->email3)  ? 'checked' : '' }}
				> Email Address 3
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->agm->sms)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[agm][sms]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->agm->sms)  ? 'checked' : '' }}
				> SMS
			</label>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->agm->post)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[agm][post]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->agm->post)  ? 'checked' : '' }}
				> Post
			</label>
		</div>
	</div>
</div>

<div class="form-group row">
	<label for="postal" class="col-md-4 col-form-label text-md-right">Strata levy notices</label>
	<div class="col-md-6">
		<div class="btn-group-toggle text-muted" data-toggle="buttons">
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->levy->email1)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[levy][email1]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->levy->email1)  ? 'checked' : '' }}
				> Email Address 1
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->levy->email2)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[levy][email2]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->levy->email2)  ? 'checked' : '' }}
				> Email Address 2
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->levy->email3)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[levy][email3]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->levy->email3)  ? 'checked' : '' }}
				> Email Address 3
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->levy->sms)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[levy][sms]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->levy->sms)  ? 'checked' : '' }}
				> SMS
			</label>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->levy->post)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[levy][post]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->levy->post)  ? 'checked' : '' }}
				> Post
			</label>
		</div>
	</div>
</div>

<div class="form-group row">
	<label for="postal" class="col-md-4 col-form-label text-md-right">Other communication</label>
	<div class="col-md-6">
		<div class="btn-group-toggle text-muted" data-toggle="buttons">
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->other->email1)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[other][email1]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->other->email1)  ? 'checked' : '' }}
				> Email Address 1
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->other->email2)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[other][email2]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->other->email2)  ? 'checked' : '' }}
				> Email Address 2
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->other->email3)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[other][email3]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->other->email3)  ? 'checked' : '' }}
				> Email Address 3
			</label> <br>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->other->sms)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[other][sms]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->other->sms)  ? 'checked' : '' }}
				> SMS
			</label>
			<label class="btn btn-secondary mb-2 {{ isset($admin->userDetail->details->communication->other->post)  ? 'active' : '' }}">
				<input type="checkbox" name="communication[other][post]" autocomplete="off"
				{{ isset($admin->userDetail->details->communication->other->post)  ? 'checked' : '' }}
				> Post
			</label>
		</div>
	</div>
</div>

<div class="form-group row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-primary">Update Details</button>
		<a href="{{ url('/') }}" class="btn btn-danger">Cancel</a>
	</div>
</div>