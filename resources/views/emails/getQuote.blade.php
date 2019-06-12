@if ( $formType === 'contact' )
	Hello Admin,<br>
	The user {{ $formData['name'] }} ({{ $formData['email'] }}) contacted you via the contact form on the landing page.
	<br>
	Here are the details of the message:<br><br>

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
	Hello,

	Here is your quoted result:-

	<ul>
		@foreach ($formData as $key => $data)
			<li>{{ str_replace('_', ' ', $key) }} - {{ $data }}</li>
		@endforeach
	</ul>

	@if ($for === 'admin')
	<strong>Quote number 123 has been generated and sent to email address {{ $formData['user_email'] }}</strong>
	@endif

@elseif ( $formType === 'contactOther' )
	Hello,<br>
	The user {{ $formData['full_name'] }} ({{ $formData['full_email'] }}) contacted you regarding {{ $formData['subject'] }}
	<br>
	Here are the details of the message:<br><br>

	<ul>
		<li><strong>Name</strong> - {{ $formData['full_name'] }}</li>
		<li><strong>Email</strong> - {{ $formData['full_email'] }}</li>
		<li><strong>Address</strong> - {{ $formData['address'] }}</li>
		<li><strong>Subject</strong> - {{ $formData['subject'] }}</li>
		<li><strong>Message Details</strong> - {{ $formData['message_details'] }}</li>
	</ul>
@endif