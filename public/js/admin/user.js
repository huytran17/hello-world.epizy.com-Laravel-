class User{

	constructor(){
		this.checkboxes = [];
		this.route = $('.opera-box form').attr('action');
		this.type = 0;
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
}

var user = new User;

$('#ex_userbox').click(function(){
	user.selectType = parseInt($('#user_box').val());
	user.perform();
});