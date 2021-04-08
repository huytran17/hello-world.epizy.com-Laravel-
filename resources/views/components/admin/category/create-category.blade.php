<div class="container">
    <div class="form-wrapper">
    	<div class="form-header">
    		<h4>Thêm chuyên mục</h4>
    	</div>
    	<div class="form-body">
    		{!! Form::open(['method' => 'post', 'route' => ['admin.cate.store'], 'files' => true]) !!}
	    		<div class="form-row">
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('title', 'Tiêu đề') !!}
	    				{!! Form::text('title', null, ['class' => 'form-control']) !!}
	    			</div>
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('description', 'Mô tả') !!}
	    				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	    			</div>
	    		</div>
	    		<div class="form-row">
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('thumbnail_photo_path', 'Thumbnail') !!}
	    				{!! Form::file('thumbnail_photo_path', null, ['class' => 'form-control-file']) !!}
	    			</div>
	    		</div>
	    	{!! Form::close() !!}
    	</div>
    	<div class="form-footer">
    		{!! Form::button('Thêm', ['class' => 'btn btn-primary']) !!}
    	</div>
    </div>
</div>