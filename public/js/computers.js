// get all links

function renderComputers(url) {
	if (url === undefined || url === null) url = 'computers/all';
	$.get(url, function(data) {
		$('#computers-table').empty();
		if (data['empty'] == false) {
			$('#computers-table').append(data['html']);

		} else {
			$('#computers-table').append('<div class="alert alert-info">There are no computers to show. Please create some.</div>');

		}
		});

}
// clear form
function clearFormInput(form) {
	$(':text').val('');

}
//call to show links

renderComputers();

// pagination
var curPage = null;
$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    if ( $(this).attr('href') != '#' ) {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        curPage = $(this).attr('href');
        renderComputers(curPage);
    }
});

//create links



$('#create-computer-form').submit(function(event) {
	$.post('computers/store', $('#create-computer-form').serialize(), function(data) {
		
		renderComputers();

		clearFormInput('#create-computer-form');

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

$('#make').change(function(){
	$.get('computers/dropdown',
		{ option: $(this).val() },
			function(data) {
				var model = $('#model');
				model.empty();

				$.each(data, function(index, element) {
			model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
		});
		});
}); 
// Devuelve el valor de un parámetro de la URL
function getURLParameter(url, parameter) {
	var pos = url.indexOf(parameter);
	if (pos === -1) {
		return false;
	}
	pos += parameter.length + 1;
	substr = url.substr(pos);
	end = substr.indexOf('&');
	if (end === -1) {
		return substr;
	}
	return substr.substr(0, end);
}

// Devuelve una URL con la anterior página
function previousPageURL(url, parameter) {
	var pos = url.indexOf(parameter);
	if (pos === -1) {
		return false;
	}
	pos += parameter.length + 1;
	substr = url.substr(pos);
	end = substr.indexOf('&');
	page_value = (end === -1) ? substr : substr.substr(0, end);
	end += pos + page_value.length;
	first_chunk = url.substr(0, pos);
	last_chunk = url.substr(end + 1, url.length);
	prev_page = parseInt(page_value) - 1;
	prev_page_url = first_chunk + prev_page + last_chunk;
	return prev_page_url;
}

// Devuelve una URL con la siguiente página
function nextPageURL(url, parameter) {
	var pos = url.indexOf(parameter);
	if (pos === -1) {
		return false;
	}
	pos += parameter.length + 1;
	substr = url.substr(pos);
	end = substr.indexOf('&');
	page_value = (end === -1) ? substr : substr.substr(0, end);
	end += pos + page_value.length;
	first_chunk = url.substr(0, pos);
	last_chunk = url.substr(end + 1, url.length);
	next_page = parseInt(page_value) + 1;
	next_page_url = first_chunk + next_page + last_chunk;
	return next_page_url;
}

// delete link
$(document).on('click', '.glyphicon-trash', function(event) {
	var thiz = $(this);
	var id = thiz.next('input:hidden').val();

	$.ajax({
		url: 'computers/' + id,
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
						renderComputers(curPage);
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
	$.get('computers/' + id + '/edit', function(data) {
		var edit = row.html(data['html']).find('td');
		

	});
});

// save edit
$(document).on('click', '.glyphicon-floppy-disk', function(event) {
	
	var id = $(this).closest('tr').find("input[name='update-id']").val();
	$.ajax({
		url: 'computers/' + id,
		type: 'put',
		data: $('#edit-computers-form').serialize(),
		context: this
	})
	.done(function(data) {
		if (data['status']) {
			$(this).closest('tr').find('td').delay('400', function() {

				renderComputers(curPage);
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
		renderComputers(curPage);
	});
});

$('.combobox').combobox();

