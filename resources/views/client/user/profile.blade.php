<x-client.home>
	<x-slot name="title">
		Thông tin tài khoản
	</x-slot>
	<x-slot name="content">
		<x-client.user.profile :user="auth()->user()">
			
		</x-client.user.profile>
	</x-slot>
</x-client.home>