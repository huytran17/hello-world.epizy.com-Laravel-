class User{
	async destroy(){


	};
	
	async restore(){

	};
	
	async forceDelete(){};
	
	async upgrade(){};
	
	async downgrade(){};
}

var user = new User;

$('#ex_opera').click(function(){
	console.log('bắt đầu tìm kiếm');

	let type = $('#operabox').val();
	console.log(type);

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
			break;
	}
});