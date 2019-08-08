
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Maintenance Update
 */
jQuery(function() {
	$('#status').on('change', function() {
		const type = $(this).val()

		$('div[data-status-switch]').find('#'+type).show().siblings().hide()
		$('div[data-status-switch]').show()

		if (type == 'new' || type == 'resolved') {
			$('div[data-status-switch]').hide()
		}
	})

	$('#view-doc-type').on('change', function() {
		const type = $(this).val()
		const id = $(this).data('id')

		axios.get('/community/get-doc/' + id + '/' + type)
		.then(resp => {
			$('[data-docs-list] ul').html('')

			if ($.isEmptyObject(resp.data)) {
				$('[data-docs-list] ul').html('<li class="list-group-item">No documents found!</li>')
			} else {
				Object.keys(resp.data).map(i => {
					$('[data-docs-list] ul').append('<li class="list-group-item">'+resp.data[i]+'</li>')
				})
			}
    	});

		$('div[data-status-switch]').find('#'+type).show().siblings().hide()
		$('div[data-status-switch]').show()

		if (type == 'new' || type == 'resolved') {
			$('div[data-status-switch]').hide()
		}
	})

	$('#toggle-import-form').on('click', function() {
		$('[data-import-form]').toggleClass('d-none')
	})

	$('#import-csv-user').on('submit', function(e) {
		e.preventDefault()
		const _this = $(this)
		const formData = new FormData
		formData.append('csv-file', document.querySelector('#import-csv').files[0])

		_this.find('button[type="submit"]').prop('disabled', true)

		axios.post('/user/import', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(resp => {
			console.log('sss', resp)
			alert(resp.data.msg)

			if (resp.data.type === 'success') {
				$('#import-owner').modal('hide')
				location.reload()
			}
			else if (resp.data.type === 'error') {
				$('input[name="import-csv"]').addClass('is-invalid')
			}

			_this.find('button[type="submit"]').prop('disabled', false)
		})
		.catch(err => {
			alert(err.response.data.message)
			_this.find('button[type="submit"]').prop('disabled', false)
		})
	})

	$('#send-comm-link').on('submit', function(e) {
		e.preventDefault()
		const formData = new FormData(this)
		const btn = $(this).find('button[type="submit"]')

		btn.prop('disabled', true)

		axios.post('/community/invite', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(resp => {
			alert(resp.data.msg)

			if (resp.data.type === 'success') {
				$('#community-link').modal('hide')
			}

			btn.prop('disabled', false)
		});
	})

	$('#generate-levy-report').on('submit', function(e) {
		e.preventDefault()
		const formData = new FormData(this)

		axios.post('/user/levy-report', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(resp => console.log('sda', resp))

		console.log('asd', formData)
	})

	$(document).on('click', 'button[data-doc-delete]', function(e) {
		e.preventDefault()
		const _this = $(this)
		const file = _this.attr('data-doc-delete')
		const community = _this.attr('data-community')
		const formData = new FormData
		formData.append('file', file)
		formData.append('community', community)

		axios.post('/community/delete-doc', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(resp => _this.closest('li').fadeOut('slow', function() {
			$(this).css('background-color', 'red').remove()
		}))
	})

	$('input[type="file"]').change(function(e){
		const fileName = e.target.files[0].name;
		$(this).next('label').html(fileName)
	});

	$('form[data-delete-community]').on('submit', function(e) {
		if (! confirm('Are you sure you want to delete this community?')) {
			return false;
		}
	})

	$('a[data-delete-user]').on('click', function(e) {
		if (! confirm('Are you sure you want to delete this this?')) {
			return false;
		}
		const _this = $(this)
		const id = _this.data('user-id')
		const token = $('meta[name=csrf-token]').attr('content')

		$.ajax({
			url: '/user/delete/' + id,
			type: 'post',
			data: {
				_method: 'delete',
				_token : token
			},
			success: function() {
				_this.parent().fadeOut(250).remove()
			}
		})
	})

	$('.has-select2').select2()
})