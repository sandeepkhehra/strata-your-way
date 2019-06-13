<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name', 'App') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/style.css') }}">
</head>
<body>
<header>
	<div class="container-block">
		<div class="header-inner">
			<a href="{{ url('/') }}" class="logo"><img src="images/starta-logo.png"></a>
			<ul>
				<li><a href="{{ route('login') }}" id="loginForm">Login</a></li>
				<li><a href="javascript:void(0)" id="contactForm">Contact</a></li>
			</ul>
		</div>
	</div>
</header>
<section class="page-block">
		<div class="container-block">
			<div class="pageInfo">
				<h1>Are you receiving poor service from your body corporate?</h1>
				<h1>Are you paying too much in body corporate fees?</h1>
				<h1>Start running your strata community your way</h1>
				<div class="question">
					<div class="questionFirst" data-val="blueClr">
						<img src="images/blue-bg.png?98754-04895984">
						<h2>What is self-managed?</h2>
					</div>
					<div class="questionFirst" data-val="brownColor">
						<img src="images/brown-bg.png?785--578">
						<h2>Why move to self-managed?</h2>
					</div>
					<div class="questionFirst" data-val="greenColor">
						<img src="images/green-img.png?875--=85">
						<h2>How do you move?</h2>
					</div>
					<div class="questionFirst" data-val="darkgreen">
						<img src="images/dark-green-bg.png?785--998">
						<h2>How we can help</h2>
					</div>
					<div class="questionFirst" data-val="offGreen">
						<img src="images/greenmorebg.png?78870-08948">
						<h2>The services we offer</h2>
					</div>
					<div class="questionFirst" data-val="OrangeColor">
						<img src="images/orange-bg.png?78578--86">
						<h2>What happens next?</h2>
					</div>
					<div class="questionFirst" data-val="YellowColor">
						<img src="images/yellow-bg.png?478570--04389">
						<h2>About me</h2>
					</div>
				</div>

				<div class="main-detail-block">
				<div class="info-div expand-div" id="blueClr">
					<p>A self-managed owners corporation is one where the management committee is responsible for the daily administrative tasks of running the community.  These	 tasks include bookkeeping and financial statement preparation, insurance renewal management, secretarial services, debt collection and cash management. Many owners may be daunted by moving to a self-managed community because they don't feel they can manage all these tasks or because no one on the management committee has any specific strata management experience.  I have first-hand experience to prove that it can be done.</p>
					<p>Strata Your Way can provide you with the services you need to move to a self-managed community and you can start benefiting from lower costs and a better service.</p>
				</div>


				<div class="info-div" style="display:none" id="brownColor">
					<ul>
						<li>Lower management costs for the community</li>
						<li>Improved responsiveness to owner requests</li>
						<li>More flexibility in the way the community is run</li>
						<li>Decisions are made in the best interests of the community</li>
						<li>More informed decisions by the management committee</li>
					</ul>
				</div>


				<div class="info-div" id="greenColor" style="display:none">
					<ul>
						<li>Get a copy of the body corporate management agreement and understand the contract termination requirements</li>
						<li>Determine whether the existing management committee have the skills and time to run the community – we can help if they don’t</li>
						<li>Calculate how much it will save the community if you move to self-managed – use our easy quoting tool to work
       						out how much our services will cost</li>
						<li> Understand what proportion of owners need to agree to the change – we can explain this as the rules are different in each state</li>
						<li>Send information to owners explaining the benefits of moving to self-managed and advise that you are intending to vote to do so</li>
						<li>Present a case to the other owners – the management committee have access to the contact details of the other owners</li>
						<li>Alleviate the concerns of any owners who are unsure about the change</li>
						<li>Advise the body corporate manager that you will be voting to terminate their contract at the annual general meeting and have a motion added to the agenda</li>
						<li>Win the vote!</li>
					</ul>
				</div>


				<div class="info-div" id="darkgreen" style="display:none">
					<p>We can lead you through your transition to a self-managed community including utilising newsletters and surveys to inform the other owners about the benefits of moving to a self-managed community.
                        We can then work with you to understand which tasks the management committee are comfortable performing and which services you need some support with.  If the move to a self-managed
                        community is successful we  can then guide you through the process to setup your self-managed community.
                    </p>
				</div>


				<div class="info-div" style="display:none" id="offGreen">
					<ul>
						<li><b>Consulting services</b> We can provide advice and assistance on the practical steps needed to move your community to self-managed</li>
						<li><b>Bookkeeping services</b> We can arrange someone to enter supplier invoices, create and send quarterly levy notices and issue fines</li>
						<li><b>Financial governance service</b> We can arrange someone to complete a quarterly review on the financial statements, prepare the annual budget and ensure financial documents are in order for the annual audit</li>
						<li><b>Treasury function</b> We can arrange an experienced professional to regularly monitor your cash balances during the year and help setup at-call and term deposit accounts to maximise the interest earned on your cash</li>
						<li><b>Insurance management</b> We can arrange an experienced professional to review your current insurance policy, recommend changes to your insurance policy and help you find the insurance policy that best suit the needs of your community</li>
						<li><b>Overdue levy service</b> We can arrange someone to chase owners with overdue levies for payment</li>
					</ul>
					<ul>
						<li><b>Secretarial service</b> We can arrange someone to prepare the agenda and take and send minutes for the management committee meetings and annual general meeting</li>
						<li><b>Community portal</b> We can setup an easy-to-use, low-value portal that maintains owner details and communication preferences, tracks maintenance requests and holds any community documents</li>
						<li><b>Strata management expertise</b> We can provide access to an experienced strata mananger when required</li>
						<li><b>Legal services</b> We can provide access to legal counsel experienced in owners corporation issues</li>
						<li><b>Virtual phone line</b> We can setup a virtual phone line which includes a menu service to direct calls to appropriate management committee members</li>
						<li><b>Overflow commmunication service</b> We can provide administration support to help answer phone calls or emails in times when you are not available</li>
					</ul>
				</div>


				<div class="info-div" id="OrangeColor" style="display:none">
					<p>Let your management committee know about us.  Click on <a href="javascript:void(0)" id="getaQuote">this link</a> to generate a short email to your nominated committee member introducing our services and providing a link to our website.</p>
					<p><strong><em>If you are a management committee member</em></strong><br>
					Request a quote to provide an estimate on how much each of our services will cost then book in a no obligation conference call with one of our team</p>
					<input type="button" value="Get a quote" id="getaQuoteBtn">
					<div class="steps">
						<h3>Step 1</h3>
						<p>No obligation free conference call to introduce our services to the management committee and provide a brief guide on moving to a self-managed community.</p>
					</div>
					<div class="steps">
						<h3>Step 2</h3>
						<p>Consulting services to guide you through to the Annual General Meeting stage where the community will vote on the proposed move.  This includes customising existing newsletter templates and surveys to inform the community of the benefits.</p>
					</div>
					<div class="steps">
						<h3>Step 3</h3>
						<p>Consulting services to guide you through the setup of the self-managed community including setting up a domain and email, bookkeeping, payment gateway, portal and  virtual phone line if required.</p>
					</div>
				</div>


				<div class="info-div" id="YellowColor" style="display:none">
					<ul>
						<li>I am a qualified accountant with over 20 years experience across a variety of industries both overseas and in Australia</li>
						<li>I have spent a considerable time in my career managing operational teams within larger Finance teams</li>
						<li>I am a property investor with five investment properties in different states around Australia</li>
						<li>I am the Presiding Officer for one of the largest self-managed communities in Australia</li>
						<li>I personally managed the transition from this community from body-corporated managed to self-managed</li>
					</ul>
				</div>
			</div>
		</div>


		</div>

</section>


<!-- start getaquate popup -->

<div class="getaquate-popup" id="linkPopup">
	<form>
	<div class="form-details">
		<div class="cross-btn">
			<span>x</span>
		</div>
		<div class="inner-form">
		<div class="input-flex">
			<div class="input-field">
				<label>To:</label>
				<input type="text" placeholder="Enter your email address" name="send_to">
			</div>
			<div class="input-field">
				<label>Subject:</label>
				<input type="text" placeholder="Possible move to a self-managed community" name="subject" readonly>
			</div>
		</div>
		<div class="input-field">
				<label>Detail:</label>
				<textarea name="message_details" readonly>Dear Management Committee, I have come across a company that could help us move to a self-managed community which would help us to reduce our body corporate fees and provide a better service to our owners corporation. Here is a link to their website: www.stratayourway.com.au. Please investigate this option and advise if you think this is something suitable suitable for our owners corporation. Thanks</textarea>
		</div>
		<div class="input-flex">
			<div class="input-field">
				<label>Name:</label>
				<input type="text" placeholder="Enter your full name" name="full_name">
			</div>
			<div class="input-field">
				<label>Address:</label>
				<input type="text" placeholder="Enter your unit number or street address" name="address">
			</div>
		</div>
		<div class="input-field">
				<label>Email:</label>
				<input type="text" placeholder="Enter your email address" name="full_email">
			</div>
			</div>
		<input type="button" value="Submit" id="submitForm">
	</div>
	</form>
</div>

<!-- End getaquate-popup -->



<!-- start contact form -->
<div class="contact-form">
	<form>
		<h4>Contact Me</h4>
		<div class="form-details">
			<div class="cross-btn">
				<span>x</span>
			</div>
					<div class="inner-form">
					<div class="input-flex">
						<div class="input-field">
							<label>Name:</label>
							<input type="text" name="name">
						</div>
						<div class="input-field">
							<label>Email:</label>
							<input type="email" name="email">
						</div>
						<div class="input-field">
							<label>State:</label>
							<select name="state">
								<option value="">Select Your State</option>
								<option value="VIC">VIC</option>
								<option value="NSW">NSW</option>
								<option value="QLD">QLD</option>
								<option value="SA">SA</option>
								<option value="WA">WA</option>
								<option value="TAS">TAS</option>
								<option value="NT">NT</option>
								<option value="ACT">ACT</option>

							</select>
						</div>
						<div class="input-field">
							<label>Phone:</label>
							<input type="text" name="phone">
						</div>
						<div class="input-field">
							<label>Postcode:</label>
							<input type="text" name="postcode">
						</div>
						<div class="input-field">
							<label>Preferred Method of Contact:</label>
							<select name="method">
								<option value="email">Email</option>
								<option value="phone">Phone</option>
							</select>
						</div>

					</div>
							<div class="input-field">
							<label>Message:</label>
							<textarea name="message"></textarea>
					</div>
				</div>

			<input type="button" value="Submit" id="syw-contact">
		</div>
	</form>
</div>




<!-- start getaquate popup -->
<div class="getaquate-popup management-popup" >
    <form>
        <div class="management-quota">
            <div class="cross-btn  manage-btn">
                <span>x</span>
            </div>
            <div class="management-form">
                <div class="quota-flex">
                    <h1> Strata Management Quote </h1>
                </div>
                <div class="how-many-flex">
                    <div class="input-fld">
                        <h2>How many apartments or houses in your community?</h2>
                        <input type="text" name="Total Lots" data-lot>
                    </div>
                </div>
            </div>
            <div class="monthly-list">
                <div class="monthly-hours detail-hours">
                    <div class="part-one">
                        <h3></h3>
                    </div>
                    <div class="part-two">
                        <h3></h3>
                    </div>
                    <div class="part-three">
                        <h3>MONTHLY  HOURS</h3>
                    </div>
                    <div class="part-four">
                        <h3>RATE</h3>
                    </div>
                    <div class="part-five">
                        <h3>ANNUAL COST</h3>
                    </div>
                </div>

                <div class="monthly-hours" data-row="website">
                    <div class="part-one">
                        <p>Website subscription</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Website subscription">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p> - </p>
                    </div>
                    <div class="part-four">
                        $<p>0</p>
                    </div>
                    <div class="part-five">
                        $<p>0</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="bookkeeping">
                    <div class="part-one">
                        <p>Bookkeeping</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Bookkeeping">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        $<p>55</p>
                    </div>
                    <div class="part-five">
                        $<p>660</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="financial">
                    <div class="part-one">
                        <p>Finance review & budget</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Finance review & budget">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        $<p>75</p>
                    </div>
                    <div class="part-five">
                        $<p>900</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="annual">
                    <div class="part-one">
                        <p>Annual audit</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Annual audit">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p> - </p>
                    </div>
                    <div class="part-four">
                        <p> - </p>
                    </div>
                    <div class="part-five">
                        $<p>600</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="overdue">
                    <div class="part-one">
                        <p>Overdue levy service</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Overdue levy service">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        $<p>40</p>
                    </div>
                    <div class="part-five">
                        $<p>480</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="landline">
                    <div class="part-one">
                        <p>Monthly virtual landline rental</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Monthly virtual landline rental">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        $<p>20</p>
                    </div>
                    <div class="part-five">
                        $<p>240</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="secretarial">
                    <div class="part-one">
                        <p>Secretarial service</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Secretarial service">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        <p>-</p>
                    </div>
                    <div class="part-five">
                        $<p>1200</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="chairing">
                    <div class="part-one">
                        <p>Chairing AGM & preparing minutes</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Chairing AGM & preparing minutes">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p> - </p>
                    </div>
                    <div class="part-four">
                        <p>-</p>
                    </div>
                    <div class="part-five">
                        $<p>350</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="overflow">
                    <div class="part-one">
                        <p>Strata manager overflow service</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Strata manager overflow service">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p>-</p>
                    </div>
                    <div class="part-four">
                        $<p>60</p>
                    </div>
                    <div class="part-five">
                        $<p>720</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="cash">
                    <div class="part-one">
                        <p>Annual cash management</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Annual cash management">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p> - </p>
                    </div>
                    <div class="part-four">
                        <p> - </p>
                    </div>
                    <div class="part-five">
                        $<p>250</p>
                    </div>
                </div>
                <div class="monthly-hours" data-row="insurance">
                    <div class="part-one">
                        <p>Annual insurance renewal management</p>
                    </div>
                    <div class="part-two" data-choice>
                        <select name="Annual insurance renewal management">
                            <option value='yes'>YES</option>
                            <option value='no'>NO</option>
                        </select>
                    </div>
                    <div class="part-three">
                        <p> - </p>
                    </div>
                    <div class="part-four">
                        <p> - </p>
                    </div>
                    <div class="part-five">
                        $<p>250</p>
                    </div>
				</div>

				<div>
					<input type="email" name="user_email" placeholder="Your Email Address">
				</div>

                <div class="monthly-hours total">
                        <p>Total strata management cost for community</p>
						<input type="button" data-syw-quote value="Email a copy of the quote to yourself">
						<aside class="right-mmg" data-total-amount>13,630</aside>
						<input type="hidden" name="Total quote" value="">
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>

<!-- End management-popup -->





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#submitForm').on('click', function(e) {
		e.preventDefault()
		const _this = $(this)
		const form = _this.closest('form')
		const formData = new FormData(form[0])

		$(form[0]).find('input').each(function(i, v) {
			if ($(v).prop('readonly') === false && v.value === '') {
				jQuery(v).css('border-color', 'red')
				flag = false
			} else {
				jQuery(v).css('border-color', '#f8f8f8')
			}
		})

		if (! flag) return

		_this.prop('disabled', true)

		fetch('/landing/contactOther', {
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			body: formData,
		}).
		then(r => {
			alert('Email Sent Successfully!')
			$('.cross-btn').click()
			_this.prop('disabled', false)
		})
	})

	$('#syw-contact').on('click', function(e) {
		e.preventDefault()
		const _this = $(this)
		const form = _this.closest('form')
		const formData = new FormData(form[0])
		let flag = true

		$(form[0]).find('input, select, textarea').each(function(i, v) {
			if (v.value === '') {
				jQuery(v).css('border-color', 'red')
				flag = false
			} else {
				jQuery(v).css('border-color', '#f8f8f8')
			}
		})

		if (! flag) return

		_this.prop('disabled', true)

		fetch('/landing/contact', {
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			body: formData,
		}).
		then(r => {
			alert('Email Sent Successfully!')
			$('.cross-btn').click()
			_this.prop('disabled', false)
		})
	})

	$('[data-syw-quote]').on('click', function(e) {
		e.preventDefault()
		const _this = $(this)
		const emailInput = $('input[name="user_email"]')
		const totalLot = $('input[name="Total Lots"]')

		if (emailInput.val() === '') {
			emailInput.css('border-color', 'red')
			return
		}

		if (totalLot.val() === '') {
			totalLot.css('border-color', 'red')
			return
		}

		emailInput.css('border-color', '#d7d7d7')
		totalLot.css('border-color', '#d7d7d7')

		_this.prop('disabled', true)

		const form = _this.closest('form')
		const formData = new FormData(form[0])

		fetch('/landing/getQuote', {
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			body: formData,
		}).
		then(r => {
			alert('Email Sent Successfully!')
			$('.cross-btn').click()
			_this.prop('disabled', false)
		})

	})

	$('.questionFirst').each(function(){
		$(this).click(function(){
			$('.info-div').hide();
			var id= $(this).attr('data-val');
			$('#'+id).show();
		});
	});

	$("#contactForm").click(function(){
		$(".contact-form").slideDown();
	});

	$("input#getaQuoteBtn").click(function(){
		$(".management-popup").slideDown();
		$('html, body').animate({ scrollTop: 0 }, 'fast');

	});

	$(".cross-btn").click(function(){
		$(".getaquate-popup, .contact-form, #linkPopup").slideUp();
	});


    $("#getaQuote").click(function(){
       $("#linkPopup").slideDown();

    });

    $(".manage-btn").click(function(){
        $(".management-popup").slideUp();
    });

	  jQuery('.question .questionFirst').click(function (ev) {
        jQuery(this).addClass('activeList').siblings().removeClass('activeList');
    });

});

calculateTotal()

jQuery( document ).on( 'keyup', '[data-lot]', function(){
    let lotCount = jQuery(this).val();

    sumTotal( lotCount )
});

jQuery( '[data-choice]' ).children( 'select' ).on( 'change', function(){
    let choiceVal = jQuery( this ).val();
    let optionParent = jQuery( this ).parents( '[data-choice]' );
    switch ( choiceVal ) {
        case 'no':
            optionParent.siblings( '.part-five' ).children( 'p' ).text( '0' )
            break;
        case 'yes':
            let mainBlock = jQuery( this ).parents( '.monthly-hours' )
            let i = mainBlock.data( 'row' )
            let rate = mainBlock.find( '.part-four' ).children( 'p' ).text()
            let hours = mainBlock.find( '.part-three' ).children( 'p' ).text()
            if( 'website' == i || 'landline' == i ){
                mainBlock.find( '.part-five' ).children( 'p' ).text( rate * 12 )
            }else if( 'annual' == i || 'secretarial' == i || 'chairing' == i || 'cash' == i || 'insurance' == i ){
                let annualAmt = { 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
                mainBlock.find( '.part-five' ).children( 'p' ).text( annualAmt[i] )
            } else {
                mainBlock.find( '.part-five' ).children( 'p' ).text( rate * hours * 12  )
            }
            break;
        default:
            break;
    }
    calculateTotal()
} )

function sumTotal( lotCount ){
    let valArr   = [];

    if( lotCount >= 0 && lotCount <= 4 ){
        valArr = { 'website' : 30, 'bookkeeping' : 0.5, 'financial' : 0.2, 'overdue' : 0.5, 'overflow' : 1, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250 };
    }else if( lotCount >= 5 && lotCount <= 9 ){
        valArr = { 'website' : 50, 'bookkeeping' : 1, 'financial' : 0.4, 'overdue' : 1, 'overflow' : 2, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
    }else if( lotCount >= 10 && lotCount <= 19 ){
        valArr = { 'website' : 70, 'bookkeeping' : 2, 'financial' : 0.6, 'overdue' : 1.5, 'overflow' : 3, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
    }else if( lotCount >= 20 && lotCount <= 29 ){
        valArr = { 'website' : 90, 'bookkeeping' : 3, 'financial' : 0.8, 'overdue' : 2, 'overflow' : 4, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
    }else if( lotCount >= 30 && lotCount <= 49 ){
        valArr = { 'website' : 100, 'bookkeeping' : 4, 'financial' : 1, 'overdue' : 3, 'overflow' : 5, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
    }else{
        valArr = { 'website' : 110, 'bookkeeping' : 5, 'financial' : 1.2, 'overdue' : 4, 'overflow' : 6, 'annual' : 600, 'landline' : 20, 'secretarial' : 1200 , 'chairing' : 350, 'cash' : 250, 'insurance' : 250  };
    }
    calculate( valArr )
}

function calculate( valArr ){
    jQuery.each( valArr, function( i, v ) {
        let blockRow = jQuery( '[data-row="'+i+'"]' )
        let optionVal = blockRow.find( '.part-two' ).children( 'select' ).val()
        if( 'yes' == optionVal ){
            if( 'website' == i || 'landline' == i ){
                blockRow.find( '.part-four' ).children( 'p' ).text( v )
                blockRow.find( '.part-five' ).children( 'p' ).text( v * 12 )
            }else if( 'annual' == i || 'secretarial' == i || 'chairing' == i || 'cash' == i || 'insurance' == i ){
                blockRow.find( '.part-five' ).children( 'p' ).text( v )
            } else {
                let amount = blockRow.find( '.part-four' ).children( 'p' ).text()
                blockRow.find( '.part-three' ).children( 'p' ).text( v )
                blockRow.find( '.part-five' ).children( 'p' ).text( amount * v * 12  )
            }
        }
    });
    calculateTotal()
}

function calculateTotal(){
    let annualAmount = jQuery( '.part-five' ).children( 'p' )
    let total = 0
    jQuery.each( annualAmount, function( i, v ) {
        total += parseInt( jQuery( this ).text() );
    } )
    jQuery( '[data-total-amount]' ).html( '<p>$'+ total +'</p>' )
    jQuery( 'input[name="Total quote"]' ).val( '$' + total )
}
</script>
</body>
</html>

