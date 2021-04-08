var pusher = new PusherClient;
pusher.appKey = '2d9b74f07a6ead7c49b9';
pusher.openConnection();


pusher.channelName = 'super-admin.'+uid;

pusher.subscribe();

pusher.bindEvent('App\\Events\\SuperAdminNewMessageEvent', newMessage);

function newMessage(data) {
	console.log(data.message);
}

$('#superAdInput').keydown(function(event) {
	console.log('lsss');
});