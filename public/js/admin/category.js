class Category {

	constructor() {
		this.checkboxes = [];
		this.route = $('.opera-box form').attr('action');
		this.type = 0;
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
		else console.log('error')
	}
}

var category = new Category;

$('#ex_catebox').click(function() {
	category.selectType = parseInt($('#catebox').val());

	category.perform();
});