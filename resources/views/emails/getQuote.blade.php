@if ( $formType === 'contact' )
	Hi Team, the following website user has contacted you with a question:<br>

	<ul>
		<li><strong>Name</strong> - {{ $formData['name'] }}</li>
		<li><strong>Email</strong> - {{ $formData['email'] }}</li>
		<li><strong>State</strong> - {{ $formData['state'] }}</li>
		<li><strong>Phone</strong> - {{ $formData['phone'] }}</li>
		<li><strong>Postcode</strong> - {{ $formData['postcode'] }}</li>
		<li><strong>Preferred Method Of Communication</strong> - {{ $formData['method'] }}</li>
		<li><strong>Message</strong> - {{ $formData['message'] }}</li>
	</ul>

@elseif ( $formType === 'quote' )
	<img src="{{ asset('images/logo.png') }}" alt="logo" style="max-width:150px"><br>
	Hi owner, here is your quote for self-management:-<br>

	<ul>
		@foreach ($formData as $key => $data)
			@if ($key !== 'quoteNo')
				<li>{{ str_replace('_', ' ', $key) }} - {{ $data }}</li>
			@endif
		@endforeach
	</ul>

	<strong>Quote number {{ $formData['quoteNo'] }} has been generated and sent to email address {{ $formData['user_email'] }}</strong>

@elseif ( $formType === 'contactOther' )
	<img src="{{ asset('images/logo.png') }}" alt="logo" style="max-width:150px"><br>
	Hi, the following owner has contacted you in relation to a strata management issue:<br>

	<ul>
		<li><strong>Name</strong> - {{ $formData['full_name'] }}</li>
		<li><strong>Email</strong> - {{ $formData['full_email'] }}</li>
		<li><strong>Address</strong> - {{ $formData['address'] }}</li>
		<li><strong>Subject</strong> - {{ $formData['subject'] }}</li>
		<li><strong>Message Details</strong> - {{ $formData['message_details'] }}</li>
	</ul>
@endif