<div class="container-fluid p-0">
    <section class="row p-0">
        <h4 class="table-title">{{ __('Bài viết') }}</h4>
        <div class="form-wrapper w-100 p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.post.perform']]) !!}
                <div class="form-row d-flex ml-3">
                    <div class="form-group m-0">
                        {!! Form::selectRequired('post_box', [
                            0 => '---Chọn một---',
                            1 => 'Khóa',
                            2 => 'Khôi phục',
                            3 => 'Xóa vĩnh viễn'
                        ], 0, ['class' => 'form-control','id'=>'post_box'], [0]) !!}
                        {!! Form::button('Thực hiện', ['id' => 'ex_post']) !!}
                    </div>
                </div>
        	{!! Form::close() !!}
            <div class="act">
                @can('user.create')
                    {{ Html::link(route('admin.post.create'), 'Thêm', ['class' => 'btn btn-primary ml-3']) }}
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
                        <th>Danh mục</th>
                        <th>Người tạo</th>
                        <th>Từ khóa</th>
                        <th>Nguồn</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $p)
                    <tr class="text-center">
                    	<td>
                    		<input type="checkbox" name="checkbox" value ="{{ $p->id }}">
                    	</td>
                        <td>{{ $p->id }}</td>
                        <td>
                            @can('post.update', $p)
                            <a href="{{ route('admin.post.edit', ['id' => $p->id]) }}">{{ $p->title }}</a>
                            @else
                            {{ $p->title }}
                            @endcan
                        </td>
                        <td>{{ $p->description }}</td>
                        <td>
                            @can('category.view', $p->category)
                            <a href="{{ route('admin.cate.show', ['id' => $p->category->id]) }}">{{ $p->category->title }}</a>
                            @else
                            {{ $p->category->title }}
                            @endcan
                        </td>
                        <td>
                            @can('user.edit', $p->user)
                            <a href="{{ route('admin.user.edit', ['id' => $p->user->id]) }}">{{ $p->user->name }}</a>
                            @else
                            {{ $p->user->name }}
                            @endcan
                        </td>
                        <td>{{ implode(',', $p->meta_data->keywords) }}</td>
                        <td>{{ $p->meta_data->source }}</td>
                        <td>{{ $p->dmy_created_at }}</td>
                        <td>{{ $p->dmy_updated_at }}</td>
                        <td>
                            <x-badge class="{{ $p->isDeleted ? 'success' : 'danger' }}">
                                {{ $p->isDeleted ? __('Hiện') : __('Khóa') }}
                            </x-badge>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
{{ $posts->onEachSide(2)->links() }}
