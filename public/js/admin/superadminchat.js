
pusher.channelName = 'super-admin.'+uid;

pusher.subscribe();

pusher.bindEvent('App\\Events\\SuperAdminNewMessageEvent', newMessage);

function newMessage(data) {
	console.log(data.message);
}

$('#superAdInput').keydown(function(event) {
	console.log('lsss');
});