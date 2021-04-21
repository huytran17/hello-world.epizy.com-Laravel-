
pusher.unsubscribeCurrentChannel();

pusher.channelName = 'lower-admin';

pusher.subscribe();

pusher.bindEvent('App\\Events\\LowerAdminNewMessageEvent', function(data) {
	$('#conversation .wrapper').append(data.message);
});

$('#viceAdInput').keydown(function(event) {
	if (event.keyCode==13) {
		message.create($(event.target).data('route'), $(event.target).val());
	}
});