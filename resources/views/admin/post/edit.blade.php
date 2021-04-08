<x-home>
	<x-slot name="title">
		Thông tin bài viết
	</x-slot>
	<x-slot name="content">
		<x-admin.post.edit-post :post="$post" :parentCates="$parent_cates" :childCates="$child_cates" />
	</x-slot>
</x-home>