

pusher.channelName = 'lower-admin.'+uid;

pusher.subcribe();

pusher.bindEvent('App\\Event\\LowerAdminNewMessageEvent',newMessage);

function newMessage(data){
	console.log(data.message);
}

$('#viceAdInput').keyup(function(event) {
	console.log("obj");
}
)