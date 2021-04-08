<x-home>
	<x-slot name="title">
		Thông tin người dùng
	</x-slot>
	<x-slot name="content">
		<x-admin.user.show-user :user="$user"></x-admin>
	</x-slot>
</x-home>