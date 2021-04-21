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
		this.route = $('#FormUpdatePost').attr('action');

		var res = await axios.post(this.route ,{
			title: $('#title').val(),
			slug: app.convertToSlug($('#title').val()),
			description: $('#description').val(),
			content: $('#content').val(),
			meta_data: {
				keywords: $('#keywords').val().split(','),
				source: $('#source').val(),
			},
			category_id: $('#child_cate').val()
		});
		if (res.data.error==false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async create() {
		this.route  = $('#FormCreatePost').attr('action');

		var res = await axios.post(this.route, {
			title:$('#title').val(),
			slug: $('#title').val(),
			description:$('#description').val(),
			content:$('#content').val(),
			meta_data:{
				keywords: $('#keywords').val().split(','),
				source: $('#source').val()
			},
			user_id: $('input[name=user_id]').val(),
			category_id: $('#child_cate').val()
		});

		if (res.data.error == false) location.reload();
		else {this.appendPos.append(res.data.toast_notice)}; $('#toast').toast('show');
	}

	async getChildCate(parent_id, route) {
		var res = await axios.post(route, {
			pid: parent_id,
		});
		
		if (res.data.error==false) {

			$('#child_cate').empty();

			res.data.cates.forEach( function(item, index) {
				$('#child_cate').append(`<option value=${item.id}>${item.title}</option>`);
			});
		}
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
	post.create();
});

$('select[id=parent_cate]').change(function(event) {
	post.getChildCate(event.target.value, $(event.target).data('route'));
});