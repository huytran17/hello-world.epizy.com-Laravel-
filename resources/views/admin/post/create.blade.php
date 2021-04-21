<x-admin.home>
	<x-slot name="title">
		Thêm bài viết
	</x-slot>
	<x-slot name="content">
		<x-admin.post.create-post :parentCates="$parent_cates" :childCates="$child_cates" />
	</x-slot>
</x-admin.home>