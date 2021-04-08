<x-home>
	<x-slot name="title">
		Chỉnh sửa thông tin tài khoản
	</x-slot>
	<x-slot name="content">
		<x-admin.user.edit-user :user="$user"></x-admin>
	</x-slot>
</x-home>