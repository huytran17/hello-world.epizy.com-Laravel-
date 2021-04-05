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

	async updateAvatar() {
		let file_data = $('#profile_photo_path').prop('files')[0];
        let form_data = new FormData();
        form_data.append('profile_photo_path', file_data);

		var res = await axios.post(this.route, {
			name: $('#name').val(),
			image: form_data
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

$('#BtnUpdateAvatar').click(function(event) {
	// user.routeUrl = $(event).closest('form').attr('action');
	// user.BtnUpdateAvatar();
});