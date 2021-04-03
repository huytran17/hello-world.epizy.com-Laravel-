function toggle(source) {
    checkboxes = document.getElementsByName('checkbox');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

function getCheckboxChecked() {
	var checkboxs = [];

	$("input:checkbox[name=type]:checked").each(function(){
	    checkboxs.push($(this).val());
	});

	return checkboxs;
}