<x-home>
	<x-slot name="title">
		Thêm chuyên mục
	</x-slot>
	<x-slot name="content">
		<x-admin.category.create-category :parentCates="$parent_cates" />
	</x-slot>
</x-home>