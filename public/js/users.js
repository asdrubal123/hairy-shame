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