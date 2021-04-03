class Category {

	constructor() {
		this.checkboxes = [];
	}

	async destroy() {
		this.checkboxes = app.getCheckboxChecked();
		console.log(this.checkboxes)
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