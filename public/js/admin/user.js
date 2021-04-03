class User{

	constructor(){
		this.checkboxes = [];
		this.route = $('.opera-box form').attr('action');
		this.type = 0;
	}
	async destroy(){

		this.checkboxes = app.getCheckboxChecked();

		var res  = await axios.post(this.route, {
			id_arr: this.checkboxes,
			type: this.type
		});

		if (res.data.error == false) {
			location.relaod();
		} else console.log("loi");
	};
	
	async restore(){

	};
	
	async forceDelete(){};
	
	async upgrade(){};
	
	async downgrade(){};
}

var user = new User;

$('#ex_userbox').click(function(){
	console.log('bắt đầu');

	let type = parseInt($('#user_box').val());

	switch(type){
		case 1:
			user.destroy();
			break;
		case 2:
			user.upgrade();
			break;
		case 3:
			user.downgrade();
			break;
		case 4:
			user.restore();
			break;
		case 5:
			user.forceDelete();
			break;
		default:
			console.log("hihi");
			break;
	}
});