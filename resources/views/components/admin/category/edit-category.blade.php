<div class="container">
    <div class="form-wrapper">
    	<div class="form-header">
    		<h4>Sửa chuyên mục</h4>
    	</div>
    	<div class="form-body">
    		{!! Form::open(['method' => 'post', 'route' => ['admin.cate.update'], 'files' => true]) !!}
	    		<div class="form-row">
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('title', 'Tiêu đề') !!}
	    				{!! Form::text('title', $cate->title, ['class' => 'form-control']) !!}
	    			</div>
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('description', 'Mô tả') !!}
	    				{!! Form::textarea('description', $cate->description, ['class' => 'form-control']) !!}
	    			</div>
	    		</div>
	    		<div class="form-row">
	    			<div class="current_img">
	    				<div class="thumbnail">
	    					<img src="{{ $cate->thumbnail_photo_path }}" alt="{{ $cate->slug }}">
	    				</div>
	    			</div>
	    			<div class="form-group col-12 col-md-6">
	    				{!! Form::label('thumbnail_photo_path', 'Thumbnail') !!}
	    				{!! Form::file('thumbnail_photo_path', null, ['class' => 'form-control-file']) !!}
	    			</div>
	    		</div>
	    		<div class="form-row">
	    			<div class="form-group">
	    				<select name="parent_id" id="parent_id">
	    					<option value="" disabled="disabled" selected="selected">{{ __('---Tùy chọn---') }}</option>
	    					@foreach($parents as $p) 
	    						@if($p->id !== $cate->id)
	    							<option value="{{ $p->id }}">{{ $p->title }}</option>
	    						@endif
	    					@endforeach
	    				</select>
	    			</div>
	    		</div>
	    	{!! Form::close() !!}
    	</div>
    	<div class="form-footer">
    		{!! Form::button('Lưu', ['class' => 'btn btn-primary']) !!}
    	</div>
    </div>
</div>