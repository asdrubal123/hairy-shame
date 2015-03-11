// get all links

function renderLinks(url) {
	if (url === undefined || url === null) url = 'links/all';
	$.get(url, function(data) {
		$('#links-table').empty();
		if (data['empty'] == false) {
			$('#links-table').append(data['html']);

		} else {
			$('#links-table').append('<div class="alert alert-info">There are no links to show. Please create some.</div>');

		}
		});

}
// clear form
function clearFormInput(form) {
	$(':text').val('');
}
//call to show links

renderLinks();

//create links



$('#create-link-form').submit(function(event) {
	$.post('links/store', $('#create-link-form').serialize(), function(data) {
		
		renderLinks();

		clearFormInput('#create-link-form');

		if (data['status']) {

			$('#info-errors').addClass('hidden');
			$('#info-success').removeClass('hidden');
			$('#info-success').html(data['message']).append('<a class="close" data-dismiss="alert" aria-hidden="true">×</a>');

		} else {

			$('#info-success').addClass('hidden');
			$('#info-errors').removeClass('hidden');
			$('#info-errors').html(data['errors']).prepend('<a class="close" data-dismiss="alert" aria-hidden="true">×</a><p>The following errors have occured:</p>');

		}
	});
event.preventDefault();
});

// delete link
$(document).on('click', '.glyphicon-trash', function(event) {
	var thiz = $(this);
	var id = thiz.next('input:hidden').val();

	$.ajax({
		url: 'links/' + id,
		type: 'DELETE'
	})
	.done(function(data) {
		var executed = false;
		thiz.closest('tr')
			.find('td')
			.wrapInner('<div style="display: block;" />')
			.parent()
			.find('td > div')
			//.find('div')
			.slideUp(200)
			.delay(200, function() {
					if (!executed) {
					thiz.closest('td').remove();
					if ($('.table > tbody > tr').length > 1) {
						renderLinks();
					} 
					executed = true;
				}
			});

	});

});

// edit
$(document).on('click', '.glyphicon-edit', function(event) {
	var row = $(this).closest('tr');
	var id = row.find("input[name='edit-id']").val();
	$.get('links/' + id + '/edit', function(data) {
		var edit = row.html(data['html']).find('td');
		

	});
});

// save edit
$(document).on('click', '.glyphicon-floppy-disk', function(event) {
	
	var id = $(this).closest('tr').find("input[name='update-id']").val();
	$.ajax({
		url: 'links/' + id,
		type: 'put',
		data: $('#edit-links-form').serialize(),
		context: this
	})
	.done(function(data) {
		if (data['status']) {
			$(this).closest('tr').find('td').delay('400', function() {

				renderLinks();
			});
			$('#info-errors').addClass('hidden');
			$('#info-success').removeClass('hidden');
			$('#info-success').html(data['message']).append('<a class="close" data-dismiss="alert" aria-hidden="true">×</a>');
		} else {
			$('#info-success').addClass('hidden');
			$('#info-errors').removeClass('hidden');
			$('#info-errors').html(data['errors']).prepend('<a class="close" data-dismiss="alert" aria-hidden="true">×</a><p>The following errors have occured:</p>');
		}
	});
});

// cancel edit
$(document).on('click', '.glyphicon-ban-circle', function(event) {
	$(this).closest('tr').find('td').delay('400', function() {
		renderLinks();
	});
});