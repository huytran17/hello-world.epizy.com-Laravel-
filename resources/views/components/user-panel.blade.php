<div class="p-0">
    <section class="row p-0">
        <h4 class="table-title">{{ __('Thành viên') }}</h4>
        <div class="form-wrapper w-100 p-0 m-0">
        	{!! Form::open(['method' => 'post', 'route' => ['admin.user.perform']]) !!}
        		<div class="form-row d-flex ml-3">
                    <div class="form-group m-0">
                        {!! Form::selectRequired('user_box', [
                            0 => '---Chọn một---',
                            1 => 'Khóa',
                            2 => 'Khôi phục',
                            3 => 'Nâng cấp',
                            4 => 'Hạ cấp',
                            5 => 'Xóa vĩnh viễn'
                        ], 0, ['class' => 'form-control', 'id'=>'user_box'], [0]) !!}
                        {!! Form::button('Thực hiện', ['id' => 'ex_userbox']) !!}
                    </div>
                </div>
        	{!! Form::close() !!}
            <div class="act">
                @can('user.create')
                    {{ Html::link(route('admin.user.create'), 'Thêm', ['class' => 'btn btn-primary ml-3']) }}
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
                        <th>Tài khoản</th>
                        <th>Email</th>
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
                    <tr class="text-center">
                    	<td>
                    		<input type="checkbox" name="checkbox" value="{{ $u->id }}">
                    	</td>
                        <td>{{ $u->id }}</td>
                        <td>
                            @can('user.update', $u)
                            <a href="{{ route('client.user.profile', ['id' => $u->id]) }}">{{ $u->name }}</a>
                            @else
                            {{ $u->name }}
                            @endcan
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <x-badge class="{{ $u->isSubscribed ? 'warning' : 'success' }}">
                                {{ $u->isSubscribed ? __('Chưa đăng ký') : __('Hoàn tất') }}
                            </x-badge>
                        </td>
                        <td>
                            <x-badge class="{{ $u->role===0 ? 'primary' : ($u->role===1?'info':'secondary') }}">
                                {{ $u->role_type }}
                            </x-badge>
                        </td>
                        <td>{{ $u->dmy_created_at }}</td>
                        <td>{{ $u->dmy_updated_at }}</td>
                        <td>
                            <x-badge class="{{ $u->isDeleted ? 'success' : 'danger' }}">
                                {{ $u->isDeleted ? __('Hiện') : __('Khóa') }}
                            </x-badge>
                        </td>
                        <td>
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
