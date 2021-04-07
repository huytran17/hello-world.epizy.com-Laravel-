<x-home>
	<x-slot name="title">
		Thêm bài viết
	</x-slot>
	<x-slot name="content">
		<x-admin.post.create-post :post="$post" :parentCates="$parent_cates" />
	</x-slot>
</x-home>