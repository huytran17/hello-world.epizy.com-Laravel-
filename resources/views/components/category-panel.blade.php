<div class="container-fluid p-0">
    <section class="row p-0">
        <h4 class="table-title">{{ __('Danh mục') }}</h4>
        <div class="form-wrapper w-100 p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.cate.perform']]) !!}
                <div class="form-row d-flex ml-3">
                    <div class="form-group m-0">
                        {!! Form::selectRequired('catebox', [
                            0 => '---Chọn một---',
                            1 => 'Khóa',
                            2 => 'Khôi phục',
                            3 => 'Xóa vĩnh viễn'
                        ], 0, ['class' => 'form-control', 'id' => 'catebox'], [0]) !!}
                        {!! Form::button('Thực hiện', ['id' => 'ex_catebox']) !!}
                    </div>
                </div>
        	{!! Form::close() !!}
            <div class="act">
                @can('user.create')
                    {{ Html::link(route('admin.cate.create'), 'Thêm', ['class' => 'btn btn-primary ml-3']) }}
                @endcan
            </div>
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
                    <tr class="text-center">
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
                        <td>
                            <x-badge class="{{ $c->isDeleted ? 'success' : 'danger' }}">
                                {{ $c->isDeleted ? __('Hiện') : __('Khóa') }}
                            </x-badge>
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
{{ $categories->onEachSide(2)->links() }}
