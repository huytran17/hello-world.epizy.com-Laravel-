<x-home>
	<x-slot name="title">
		Thông tin Website
	</x-slot>
	<x-slot name="content">
		<x-admin.site.edit-site :site="$site"></x-admin>
	</x-slot>
</x-home>