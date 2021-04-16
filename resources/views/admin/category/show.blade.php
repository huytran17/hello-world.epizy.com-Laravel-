
<x-admin.home>
	<x-slot name="title">
		Thông tin danh mục
	</x-slot>
	<x-slot name="content">
		<x-admin.category.show-category :cate="$cate" />
	</x-slot>
</x-admin.home>