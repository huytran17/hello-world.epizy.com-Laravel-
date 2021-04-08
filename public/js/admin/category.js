class Category {

	constructor() {
		this.checkboxes = [];
		this.route = $('.form-wrapper form').attr('action');
		this.type = 0;
		this.appendPos = $('#AppendPosition');
	}

	set selectType(type) {
		this.type = type;
	}

	get selectType() {
		return this.type;
	}

	async perform() {
		this.checkboxes = app.getCheckboxChecked();

		var res = await axios.post(this.route, {
			id_arr: this.checkboxes,
			type: this.type
		});

		if (res.data.error==false) location.reload();
		else console.log('error');
	}

	async update(route) {
		var res = await axios.post(route, {
			title: $('#title').val(),
			slug: app.convertToSlug($('#title').val()),
			description: $('#description').val(),
			parent_id: $('select[id=parent_id]').val(),
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async create(route) {
		let parent_id = $('input[name=type]')[0].checked ? null : $('select[id=parentCates]').val();
		var res = await axios.post(route, {
			title: $('#title').val(),
			slug: $('#title').val(),
			description: $('#description').val(),
			parent_id: parent_id,
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}
}

var category = new Category;

$('#ex_catebox').click(function() {
	category.selectType = parseInt($('#catebox').val());
	category.perform();
});

$('#BtnUdtCate').click(function(event) {
	category.update($(this).closest('form').attr('action'));
});

$('input[name=type]').change(function(event) {
	$('#parentCates').closest('.form-row').toggleClass('d-none');
});

$('#BtnCreateCate').click(function(event) {
	category.create($('#FormCreateCate').attr('action'));
});

$