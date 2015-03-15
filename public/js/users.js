// get all links

function renderUsers(url) {
	if (url === undefined || url === null) url = 'users/all';
	$.get(url, function(data) {
		$('#users-table').empty();
		if (data['empty'] == false) {
			$('#users-table').append(data['html']);

		} else {
			$('#users-table').append('<div class="alert alert-info">There are no users to show. Please create some.</div>');

		}
		});

}
// clear form
function clearFormInput(form) {
	$(':text').val('');
}
//call to show links

renderUsers();

// pagination
var curPage = null;
$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    if ( $(this).attr('href') != '#' ) {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        curPage = $(this).attr('href');
        renderUsers(curPage);
    }
});

$('#create-user-form').submit(function(event) {
	$.post('users/store', $('#create-user-form').serialize(), function(data) {
		
		renderUsers();

		clearFormInput('#create-user-form');

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
		url: 'users/' + id,
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
						renderUsers();
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
	$.get('users/' + id + '/edit', function(data) {
		var edit = row.html(data['html']).find('td');
		

	});
});

// save edit
$(document).on('click', '.glyphicon-floppy-disk', function(event) {
	
	var id = $(this).closest('tr').find("input[name='update-id']").val();
	$.ajax({
		url: 'users/' + id,
		type: 'put',
		data: $('#edit-users-form').serialize(),
		context: this
	})
	.done(function(data) {
		if (data['status']) {
			$(this).closest('tr').find('td').delay('400', function() {

				renderUsers();
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
		renderUsers();
	});
});