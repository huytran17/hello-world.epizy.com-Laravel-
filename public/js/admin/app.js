function toggle(source) {
    checkboxes = document.getElementsByName('checkbox');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

class App {

    getCheckboxChecked() {
        var checkboxs = [];

        $("input[type=checkbox]:checked").each(function() {
            checkboxs.push($(this).val());
        });

        return checkboxs;
    }
}

var app = new App;