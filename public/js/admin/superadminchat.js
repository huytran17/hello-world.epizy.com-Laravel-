pusher.unsubscribeCurrentChannel();

pusher.channelName = 'super-admin';

pusher.subscribe();

pusher.bindEvent('App\\Events\\SuperAdminNewMessageEvent', function(data) {
	$('#conversation .wrapper').append(data.message);
	console.log(data.message)
});

$('#superAdInput').keydown(function(event) {
	if (event.keyCode==13) {
		message.create($(event.target).data('route'), $(event.target).val());
	}
});