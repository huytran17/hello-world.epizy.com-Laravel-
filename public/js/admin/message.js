class Message {
	async create(route, content) {
		await axios.post(route, {
			content: content
		})
		.then(res => {
			$('#superAdInput').val('');
			$('#viceAdInput').val('');
		})
		.catch(e => {
			console.log(e);
		});
	}
}

var message = new Message;