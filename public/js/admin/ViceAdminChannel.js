var pusher = new PusherClient;
pusher.appKey = '2d9b74f07a6ead7c49b9';
pusher.openConnection();

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