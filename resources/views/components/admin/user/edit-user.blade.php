<div class="container">
	<div class="form-wrapper">
		<div class="form-header">
			<h4>Chỉnh sửa thông tin tài khoản</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>'admin.user.store'])!!}
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('name','Tên') !!}
						{!! Form::text('name',$user->name,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('email','Email') !!}
						{!! Form::text('email',$user->email,['class'=>'form-control','disabled'=>'disabled']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('password','Mật khẩu') !!}
						{!! Form::text('password',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('repass','Nhập lại mật khẩu') !!}
						{!! Form::text('repass',null,['class'=>'form-control']) !!}
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			{!! Form::button('Sửa',['class'=> 'btn btn-primary']) !!}
		</div>
	</div>
</div>