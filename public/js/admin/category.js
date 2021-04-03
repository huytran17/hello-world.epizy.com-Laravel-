class Category {
	async destroy() {

	}
	async restore() {

	}
	async forceDelete() {

	}
}

var category = new Category;

$('#ex_opera').click(function() {
	let type = $('#operabox').val();
	
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