<div class="container-fluid p-0 mt-5">
    <section class="row p-0">
        <h4 class="w-100 text-center">{{ __('Thành viên') }}</h4>
        <div class="form-wrapper mr-auto w-100 row p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.user.perform']]) !!}
        		{!! Form::selectRequired('user_box', [
        			0 => '---Chọn một---',
        			1 => 'Khóa',
        			2 => 'Nâng cấp',
        			3 => 'Hạ cấp',
        			4 => 'Khôi phục',
        			5 => 'Xóa vĩnh viễn'
        		], 0, ['class' => 'form-control','id'=>'user_box'], [0]) !!}
        		{!! Form::button('Thực hiện', ['id' => 'ex_userbox']) !!}
        	{!! Form::close() !!}
            @can('user.create')
                {{ Html::link(route('admin.user.create'), 'Thêm', ['class' => 'btn btn-primary']) }}
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
                        <th>Tài khoản</th>
                        <th>Email</th>
                        <th>Xác thực</th>
                        <th>Đăng ký</th>
                        <th>Vai trò</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                    	<td>
                    		<input type="checkbox" name="checkbox" value="{{ $u->id }}">
                    	</td>
                        <td>{{ $u->id }}</td>
                        <td>
                            @can('user.update', $u)
                            <a href="{{ route('admin.user.edit', ['id' => $u->id]) }}">{{ $u->name }}</a>
                            @else
                            {{ $u->name }}
                            @endcan
                        </td>
                        <td>{{ $u->email }}</td>
                        <td class="text-center">
                            <x-badge class="{{ $u->isVerified ? 'warning' : 'success' }}">
                                {{ $u->isVerified ? __('Chưa xác thực') : __('Hoàn tất') }}
                            </x-badge>
                        </td>
                        <td class="text-center">
                            <x-badge class="{{ $u->isSubscribed ? 'warning' : 'success' }}">
                                {{ $u->isSubscribed ? __('Chưa đăng ký') : __('Hoàn tất') }}
                            </x-badge>
                        </td>
                        <td class="text-center">
                            <x-badge class="{{ $u->role===0 ? 'primary' : ($u->role===1?'info':'secondary') }}">
                                {{ $u->role_type }}
                            </x-badge>
                        </td>
                        <td>{{ $u->dmy_created_at }}</td>
                        <td>{{ $u->dmy_updated_at }}</td>
                        <td class="text-center">
                            <x-badge class="{{ $u->isDeleted ? 'success' : 'danger' }}">
                                {{ $u->isDeleted ? __('Hoạt động') : __('Khóa') }}
                            </x-badge>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.user.show', ['id' => $u->id]) }}">Xem</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
{{ $users->onEachSide(2)->links() }}
