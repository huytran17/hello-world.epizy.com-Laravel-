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

	async perform() {
		this.checkboxes = app.getCheckboxChecked();

		var res = await axios.post(this.route, {
			id_arr: this.checkboxes,
			type: this.type
		});

		if (res.data.error==false) location.reload();
		else console.log('error');
	}

	async update() {
		var res = await axios.post(this.route, {
			name: $('#name').val(),
			email: $('#email').val(),
			password: $('#password').val(),
			repass: $('#repass').val(),
		});

		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice); $('#toast').toast('show');}
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