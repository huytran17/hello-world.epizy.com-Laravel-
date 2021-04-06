class User{

	constructor(){
		this.checkboxes = [];
		this.route = $('.form-wrapper form').attr('action');
		this.type = 0;
		this.appendPos = $('#AppendPosition');
	}
	
	set selectType(type){
		this.type = type;
	}

	get selectType(){
		return this.type;
	}

	set routeUrl(url) {
		this.route = url;
	}

	get routeUrl() {
		return this.route;
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

	async updateName(route) {
		var res = await axios.post(route, {
			name: $('#name').val()
		});
	}
}

var user = new User;

$('#ex_userbox').click(function(){
	user.selectType = parseInt($('#user_box').val());
	user.perform();
});

$('.form-footer button[type=button]').click(function(event) {
	user.update();
});

$('#BtnUpdateName').click(function(event) {
	user.updateName($(event).closest('form').attr('action'));
});