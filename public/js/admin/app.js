function toggle(source) {
    checkboxes = document.getElementsByName('checkbox');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

$(document).on('hidden.bs.toast', e => {
    e.target.remove();
});



class App {

    convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
            ;
    }

    getCheckboxChecked() {
        var checkboxes = [];

        $("input[type=checkbox]:checked").each(function() {
            checkboxes.push($(this).val());
        });

        return checkboxes;
    }
}

var app = new App;