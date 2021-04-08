pusher.channelName = 'lower-admin.'uid;

pusher.subcriber();

pusher.bindEvent('App\\Event\\LowerAdminNewMessageEvent',newMessage);

function newMessage(data){
	console.log(data.message);
}