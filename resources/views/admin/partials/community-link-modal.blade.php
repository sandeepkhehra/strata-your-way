<div
    class="modal fade"
    id="community-link"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Send Community Link to Owners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<form id="send-comm-link">
				<div class="modal-body container">
					<div class="form-group row">
						<div class="col-md-12">
							<ul class="list-group">
							@forelse ($admin->community->users as $userID)
								@php($user = App\User::find($userID))
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="owner_ids[]" value="{{ $user->id }}" id="lot-user-{{ $user->id }}">
											<label class="custom-control-label" for="lot-user-{{ $user->id }}">
												{{ $user->name }} <br>
												<i class="fa fa-envelope"></i> {{ $user->userDetail->details->email->{'1'} }} <br>
												<i class="fa fa-phone"></i> {{ $user->userDetail->details->tel->home }} &nbsp;
												<i class="fa fa-mobile"></i> {{ $user->userDetail->details->tel->mobile }}
											</label>
										</div>
									</li>
							@empty
								<li>No user found!</li>
							@endforelse
							</ul>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Send Link to Register</button>
				</div>
			</form>
        </div>
    </div>
</div>
