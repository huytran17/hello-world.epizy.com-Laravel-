class Post{

	constructor(){
		this.checkboxes = [];
		this.route = $('.form-wrapper form').attr('action');
		this.type = 0;
		this.appendPos = $('#AppendPosition');
		this.slug = null;
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
		this.route = $('#FormUpdatePost').attr('action');

		var res = await axios.post(this.route ,{
			title: $('#title').val(),
			description: $('#description').val(),
			content: $('#content').val(),
			meta_data: {
				keywords: $('#keywords').val(),
				source: $('#source').val(),
			}
		});
		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async addition() {
		this.route  = $('#FormCreatePost').attr('action');

		this.slug = app.convertToSlug($('#title').val());

		// let user_id =  $('input[name=user_id]').val();
		// console.log(user_id);

		var res = await axios.post(this.route, {
			title:$('#title').val(),
			slug: this.slug,
			description:$('#description').val(),
			content:$('#content').val(),
			meta_data:{
				keywords: $('#keywords').val(),
				source: $('#source').val()
			},
			user_id: $('input[name=user_id]').val(),
			category_id: 1

		});

		if (res.data.error == false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}
}

var post = new Post;

$('#ex_post').click(function() {
	post.selectType = parseInt($('#post_box').val());
	post.perform();
});

$('#BtnUpdatePost').click(function(event){
	post.update();
});

$('#BtnCreatePost').click(function() {
	post.addition();
});
