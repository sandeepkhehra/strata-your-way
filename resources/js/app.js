
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
		const formData = new FormData(this)

		axios.post('/user/import', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(response => {
        	console.log(response.data);
    	});
	})

	$('#send-comm-link').on('submit', function(e) {
		e.preventDefault()
		const formData = new FormData(this)

		axios.post('/community/invite', formData, {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Content-Type': 'multipart/form-data'
			}
		})
		.then(response => {
        	console.log(response.data);
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

	$('.has-select2').select2()
})