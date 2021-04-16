class User{

	constructor(){
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

}

var user = new User;

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
