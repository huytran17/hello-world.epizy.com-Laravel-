<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-0">
            <div class="row no-gutters">
                <div class="form-wrapper ml-3 mx-auto mt-4 p-2">
                    <div class="form-header">
                        <h4 class="panel-title">Thông tin tài khoản</h4>
                    </div>
                    <div class="form-body">
                        {!!Form::open(['method'=>'post','route'=>['user.updateAvatar', ['id' => $user->id]], 'files' => true, 'class' => 'mt-4', 'id' => 'FormUpdAvt'])!!}
                        <div class="form-row">
                            <div class="current_img col-12">
                                <div class="thumbnail">
                                    <img src="{{$user->profile_photo_path}}" alt="{{$user->slug}}" class="rounded-circle">
                                </div>
                            </div>
                            <div id="profile_photo_path" class="form-group col-12">
                                <a href="{{ route('client.user.delavt') }}">Xóa ảnh hiện tại</a>
                                <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*" class="form-control-file @error('profile_photo_path') is-invalid @enderror">
                            </div>
                            @error('profile_photo_path')
                            <span class="invalid-feedback d-inline" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                {!! Form::submit('Lưu',['class'=> 'btn cbtn', 'id' => 'BtnUpdateAvatar']) !!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                        {!!Form::open(['method'=>'post','route'=>['user.updateName', ['id' => $user->id]], 'id' => 'FormUpdateName', 'class' => 'mt-4'])!!}
                        <div class="form-row">
                            <div class="form-group col-12">
                                {!! Form::label('name','Tên tài khoản') !!}
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                            </div>
                            @error('name')
                            <span class="invalid-feedback d-inline" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                {!! Form::button('Lưu',['class'=> 'btn cbtn', 'id' => 'BtnUpdateName']) !!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                        {!!Form::open(['method'=>'post','route'=>['user.updateEmail', ['id' => $user->id]], 'id' => 'FormUpdateEmail', 'class' => 'mt-4'])!!}
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('email','Email') !!}
                                {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-12 col-md-6">
                                {!! Form::label('password_check','Mật khẩu') !!}
                                {!! Form::password('password_check',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                {!! Form::button('Lưu',['class'=> 'btn cbtn', 'id' => 'BtnUpdateEmail']) !!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                        {!!Form::open(['method'=>'post','route'=>['user.updatePwd', ['id' => $user->id]], 'id' => 'FormUpdatePwd', 'class' => 'mt-4 mb-5'])!!}
                        <div class="form-row">
                            <div class="form-group col-12">
                                {!! Form::label('old_password','Mật khẩu cũ') !!}
                                {!! Form::password('old_password',['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-12">
                                {!! Form::label('password','Mật khẩu mới') !!}
                                {!! Form::password('password',['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-12">
                                {!! Form::label('repass','Xác nhận mật khẩu') !!}
                                {!! Form::password('repass',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                {!! Form::button('Lưu',['class'=> 'btn cbtn', 'id' => 'BtnUpdatePwd']) !!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
