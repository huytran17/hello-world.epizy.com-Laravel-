<div class="container">
	<div class="form-wrapper">
		<div class="form-header">
			<h4>Chỉnh sửa thông tin tài khoản</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>['admin.user.updateAvatar', ['id' => $user->encrypted_id]], 'files' => true])!!}
				<div class="form-row">
                    <div class="current_img col-12">
                        <div class="thumbnail">
                            <img src="{{$user->profile_photo_path}}" alt="{{$user->slug}}" class="rounded-circle" width="80" height="80">
                        </div>
                    </div>
                    <div id="profile_photo_path" class="form-group col-12">
                    	{!! Form::label('profile_photo_path','Ảnh đại diện') !!}
                        <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*" class="form-control-file @error('profile_photo_path') is-invalid @enderror">
                    </div>
                    @error('profile_photo_path')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::submit('Lưu',['class'=> 'btn btn-primary', 'id' => 'BtnUpdateAvatar']) !!}
                        </div>
                    </div>
				</div>
			{!!Form::close()!!}

			{!!Form::open(['method'=>'post','route'=>['admin.user.updateEmail', ['id' => $user->encrypted_id]]])!!}
				<div class="form-row">
					<div class="form-group col-12">
						{!! Form::label('name','Tên tài khoản') !!}
						{!! Form::text('name',$user->name,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12">
						{!! Form::label('email','Email') !!}
						{!! Form::text('email',$user->email,['class'=>'form-control']) !!}
					</div>
					<div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::button('Lưu',['class'=> 'btn btn-primary', 'id' => 'BtnUpdateEmail']) !!}
                        </div>
                    </div>
				</div>
			{!!Form::close()!!}

			{!!Form::open(['method'=>'post','route'=>['admin.user.updatePwd', ['id' => $user->encrypted_id]]])!!}
				<div class="form-row">
					<div class="form-group col-12">
						{!! Form::label('password','Mật khẩu') !!}
						{!! Form::password('password',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12">
						{!! Form::label('repass','Nhập lại mật khẩu') !!}
						{!! Form::password('repass',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group row">
                        <div class="col-md-6">
                            {!! Form::button('Lưu',['class'=> 'btn btn-primary', 'id' => 'BtnUpdatePwd']) !!}
                        </div>
                    </div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			<button class="btn btn-secondary" onclick="window.history.back();">Hủy</button>
		</div>
	</div>
</div>