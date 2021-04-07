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

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async updateEmail(route) {
		var res = await axios.post(route, {
			email: $('#email').val(),
			password: $('#password_check').val()
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async updatePwd(route) {
		var res = await axios.post(route, {
			old_password: $('#old_password').val(),
			password: $('#password').val(),
			repass: $('#repass').val(),
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async create(route) {
		var res = await axios.post(route, {
			name: $('#name').val(),
			slug: $('#name').val(),
			email: $('#email').val(),
			password: $('#password').val(),
			repass: $('#repass').val(),
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}
}

var user = new User;

$('#ex_userbox').click(function(){
	user.selectType = parseInt($('#user_box').val());
	user.perform();
});

// $('.form-footer button[type=button]').click(function(event) {
// 	user.update();
// });

$('#BtnUpdateName').click(function(event) {
	user.updateName($('#FormUpdateName').attr('action'));
});

$('#BtnUpdateEmail').click(function(event) {
	user.updateEmail($('#FormUpdateEmail').attr('action'));
});

$('#BtnUpdatePwd').click(function(event) {
	user.updatePwd($('#FormUpdatePwd').attr('action'));
});

$('#BtnCreateUser').click(function(event) {
	user.create($('#FormCreateUser').attr('action'));
});