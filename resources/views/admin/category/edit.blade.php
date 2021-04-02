
<x-home>
	<x-slot name="title">
		Sửa chuyên mục
	</x-slot>
	<x-slot name="content">
		<x-admin.category.edit-category :cate="$cate" :parents="$parents" />
	</x-slot>
</x-home>