<div class="container">
	<div class="form-wrapper">
		<div class="form-header">
			<h4>Chỉnh sửa trang Helo-world</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>'admin.user.store','files'=>true])!!}
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('name','Tên') !!}
						{!! Form::text('name',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('title','Tiêu đề trang') !!}
						{!! Form::text('title',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('description','Mô tả trang') !!}
						{!! Form::textarea('description',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('keywords','Từ khoá') !!}
						{!! Form::text('keywords',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('author','Admin') !!}
						{!! Form::text('author',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
	                    {!! Form::label('logo_photo_path','Logo') !!}
	                    <div class="current_img">
	                        <div class="thumbnail">
	                            <img src="{{$site->logo_photo_path}}" alt="{{$site->title}}">
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group col-12 col-md-6">
	                    {!! Form::label('shortcut_photo_path','Shortcut') !!}
	                    <div class="current_img">
	                        <div class="thumbnail">
	                            <img src="{{$site->shortcut_photo_path}}" alt="{{$site->title}}">
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group col-12 col-md-6">
	                    {!! Form::label('favicon_photo_path','favicon') !!}
	                    <div class="current_img">
	                        <div class="thumbnail">
	                            <img src="{{$site->favicon_photo_path}}" alt="{{$site->title}}">
	                        </div>
	                    </div>
	                </div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			{!! Form::button('Sửa',['class'=> 'btn btn-primary']) !!}
		</div>
		</div>
	</div>
</div>