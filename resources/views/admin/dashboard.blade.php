<x-admin.home>
	<x-slot name="title">
		Dashboard
	</x-slot>
	<x-slot name="content">
		<x-dashboard :posts="$posts" :users="$users" :newPostInMonth="$new_post_in_month" :newUserInMonth="$new_user_in_month" />
	</x-slot>
</x-admin.home>
