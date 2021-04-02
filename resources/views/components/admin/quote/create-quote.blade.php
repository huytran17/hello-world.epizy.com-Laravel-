<div class="container">
	<div class="form-wrapper">
		<div class="form-header">
			<h4>Thêm bài viết</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>'admin.user.store','files'=>true])!!}
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('content','Nội dung châm ngôn') !!}
						{!! Form::text('content',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('author','Tác giả') !!}
						{!! Form::text('author',null,['class'=>'form-control']) !!}
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			{!! Form::button('Thêm',['class'=> 'btn btn-primary']) !!}
		</div>
	</div>
</div>