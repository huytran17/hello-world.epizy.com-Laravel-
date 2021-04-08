class Message {
	async create(route, content) {
		await axios.post(route, {
			content: content
		});
	}
}

var message = new Message;