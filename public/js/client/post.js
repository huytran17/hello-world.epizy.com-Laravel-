$('.search-form .icon-search').click(function(event) {
	if ($(this).next().val()!="") $(this).closest('form').submit();
	else return false;
});

$('.subs-wrap form').submit(function(event) {
	$(this).find('input[type=submit]').attr('disabled', 'disabled');
});