class Category {

	constructor() {
		this.checkboxes = [];
		this.route = null;
	}

	async destroy() {
		this.checkboxes = app.getCheckboxChecked();

		this.route = $('.opera-box form').attr('action');

		var res = await axios.post(this.route, {
			id: this.checkboxes,
		});

		if (res.data.error==false) {
			location.reload();
		}
		else console.log('loi')

	}
	async restore() {

	}
	async forceDelete() {

	}
}

var category = new Category;

$('#ex_catebox').click(function() {
	let type = parseInt($('#catebox').val());
	
	switch (type) {
		case 1:
			category.destroy();
			break;
		case 2:
			category.restore();
			break;
		case 3:
			category.forceDelete();
			break;
		default:
			break;
	}
});