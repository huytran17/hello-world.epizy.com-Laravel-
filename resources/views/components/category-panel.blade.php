<div class="container-fluid p-0 mt-5">
    <section class="row p-0">
        <h4 class="w-100 text-center">{{ __('Danh mục') }}</h4>
        <div class="form-wrapper mr-auto w-100 row p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.cate.perform']]) !!}
        		{!! Form::selectRequired('catebox', [
        			0 => '---Chọn một---',
        			1 => 'Khóa',
        			2 => 'Khôi phục',
        			3 => 'Xóa vĩnh viễn'
        		], 0, ['class' => 'form-control', 'id' => 'catebox'], [0]) !!}
        		{!! Form::button('Thực hiện', ['id' => 'ex_catebox']) !!}
        	{!! Form::close() !!}
            @can('category.create')
                {{ Html::link(route('admin.cate.create'), 'Thêm', ['class' => 'btn btn-primary']) }}
            @endcan
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr class="text-center">
                    	<th>
                    		<input type="checkbox" name="" id="" onClick="toggle(this)">
                    	</th>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Mục cha</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $c)
                    <tr>
                    	<td>
                    		<input type="checkbox" name="checkbox" value="{{ $c->id }}">
                    	</td>
                        <td>{{ $c->id }}</td>
                        <td>
                            @can('category.update')
                            <a href="{{ route('admin.cate.edit', ['id' => $c->id]) }}">{{ $c->title }}</a>
                            @else
                            {{ $c->title }}
                            @endcan
                        </td>
                        <td>{{ $c->description }}</td>
                        <td>
                            @if (empty($c->parent))
                                <x-badge class="light">
                                    <a href="{{ route('admin.cate.show', ['id' => $c->id]) }}">{{ __('Mục cha') }}</a>
                                </x-badge>
                            @else <a href="{{ route('admin.cate.show', ['id' => $c->parent->id]) }}">{{ $c->parent->title }}</a>
                            @endif
                        </td>
                        <td>{{ $c->user->name }}</td>
                        <td>{{ $c->dmy_created_at }}</td>
                        <td>{{ $c->dmy_updated_at }}</td>
                        <td class="text-center">
                            <x-badge class="{{ $c->isDeleted ? 'success' : 'danger' }}">
                                {{ $c->isDeleted ? __('Hiện') : __('Khóa') }}
                            </x-badge>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
{{ $categories->onEachSide(2)->links() }}
