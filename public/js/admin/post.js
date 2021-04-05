class Post{

	constructor(){
		this.checkboxes = [];
		this.route = $('.form-wrapper form').attr('action');
		this.type = 0;
	}

	set selectType(type){
		this.type = type;
	}

	get selectType(){
		return this.type;
	}

	async perform(){
		this.checkboxes = app.getCheckboxChecked();

		var res = await axios.post(this.route, {
			id_arr: this.checkboxes,
			type:this.type
		});

		if (res.data.error == false) location.reload();
		else console.log("error");
	}

	async update() {
		var res = await axios.post(this.route ,{
			title: $('#title').val(),
			description: $('#description').val(),
			title: $('#thumbnail_photo_path').val(),
			title: $('#content').val(),
			title: $('#keywords').val(),
			title: $('#source').val(),
		});
		if (res.data) location.reload();
		else console.log("error");
	}
}

var post = new Post;

$('#ex_post').click(function() {
	post.selectType = parseInt($('#post_box').val());
	post.perform();
});
$('form-footer button[type=button]').click(function(event){
	post.update();
});
