<div class="container-fluid p-0 mt-5">
    <section class="row p-0">
        <h4 class="w-100 text-center">{{ __('Châm ngôn') }}</h4>
        <div class="opera-box mr-auto w-100 row p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.quote.perform']]) !!}
        		{!! Form::selectRequired('operabox', [
        			0 => '---Chọn một---',
        			1 => 'Xóa',
        		], 0, ['class' => 'form-control'], [0]) !!}
        		{!! Form::submit('Thực hiện', ['id' => 'ex_opera']) !!}
        	{!! Form::close() !!}
            @can('quote.create')
                {{ Html::link(route('admin.quote.create'), 'Thêm', ['class' => 'btn btn-primary']) }}
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
                        <th>Nội dung</th>
                        <th>Tác giả</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $q)
                    <tr>
                    	<td>
                    		<input type="checkbox" name="checkbox" id="{{ $q->id }}">
                    	</td>
                        <td>{{ $q->id }}</td>
                        <td>{{ $q->content }}</td>
                        <td>{{ $q->author }}</td>
                        <td>
                            @can('user.view', $q->user)
                            <a href="{{ route('admin.user.edit', ['id' => $q->user->encrypted_id]) }}">{{ $q->user->name }}</a>
                            @else
                            {{ $q->user->name }}
                            @endcan
                        </td>
                        <td>{{ $q->dmy_created_at }}</td>
                        <td>{{ $q->dmy_updated_at }}</td>
                        <td class="text-center">
                            <x-badge class="{{ $q->isDeleted ? 'success' : 'danger' }}">
                                {{ $q->isDeleted ? __('Hiện') : __('Khóa') }}
                            </x-badge>
                        </td>
                        <td class="text-center">
                            @can('quote.update', $q)
                            <a href="{{ route('admin.quote.edit', ['id' => $q->encrypted_id]) }}">{{ __('Sửa') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
{{ $quotes->onEachSide(2)->links() }}
