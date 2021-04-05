class Post{

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
			// thumbnail_photo_path: $('#thumbnail_photo_path').val(),
			content: $('#content').val(),
			keywords: $('#keywords').val(),
			source: $('#source').val(),
		});
		if (res.data) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}
}

var post = new Post;

$('#ex_post').click(function() {
	post.selectType = parseInt($('#post_box').val());
	post.perform();
});
// $('form-footer button[type=button]').click(function(event){
// 	post.update();
// });
