

pusher.channelName = 'lower-admin.'+uid;

pusher.subscribe();

pusher.bindEvent('App\\Event\\LowerAdminNewMessageEvent',newMessage);

function newMessage(data){
	console.log(data.message);
}

$('#viceAdInput').keydown(function(event) {
	console.log("obj");
}
)