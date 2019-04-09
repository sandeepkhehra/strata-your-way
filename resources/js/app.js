
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

	$('#view_doc_type').on('change', function() {
		const type = $(this).val()
		const id = $(this).data('id')

		const l = fetch('/api/community/doc-data/' + id)

		console.log('as', l)

		$('div[data-status-switch]').find('#'+type).show().siblings().hide()
		$('div[data-status-switch]').show()

		if (type == 'new' || type == 'resolved') {
			$('div[data-status-switch]').hide()
		}
	})

})