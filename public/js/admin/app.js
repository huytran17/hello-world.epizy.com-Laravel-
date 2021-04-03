function toggle(source) {
    checkboxes = document.getElementsByName('checkbox');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

class App {

    getCheckboxChecked() {
        var checkboxes = [];

        $("input[type=checkbox]:checked").each(function() {
            checkboxes.push($(this).val());
        });

        return checkboxes;
    }
}

var app = new App;