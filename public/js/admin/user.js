class User{

	constructor(){
		this.checkboxes = [];
	}
	async destroy(){

		this.checkboxes = app.getCheckboxChecked();
		console.log(this.checkboxes);
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