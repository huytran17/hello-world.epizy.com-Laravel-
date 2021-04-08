
pusher.channelName = 'super-admin.'+uid;

pusher.subscriber();

pusher.bindEvent('App\\Events\\SuperAdminNewMessageEvent', newMessage);

function newMessage(data) {
	console.log(data.message);
}

