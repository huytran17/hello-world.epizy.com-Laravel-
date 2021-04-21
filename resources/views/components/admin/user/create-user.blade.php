<div class="container mb-4">
	<div class="form-wrapper">
		<div class="form-header">
			<h4 class="panel-title">Thêm tài khoản</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>'admin.user.store', 'id' => 'FormCreateUser'])!!}
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('name','Tên') !!}
						{!! Form::text('name',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('email','Email') !!}
						{!! Form::email('email',null,['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="form-row mt-3">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('password','Mật khẩu') !!}
						{!! Form::password('password', ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('repass','Nhập lại mật khẩu') !!}
						{!! Form::password('repass', ['class'=>'form-control']) !!}
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			{!! Form::button('Thêm',['class'=> 'btn btn-primary', 'id' => 'BtnCreateUser']) !!}
		</div>
	</div>
</div>