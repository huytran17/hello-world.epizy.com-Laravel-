<x-home>
	<x-slot name="title">
		Thêm bài viết
	</x-slot>
	<x-slot name="content">
		<x-admin.post.create-post :parentCates="$parent_cates" />
	</x-slot>
</x-home>