<div class="container">
    <div class="form-wrapper">
    	<div class="form-header">
    		<h4 class="panel-title">Sửa chuyên mục</h4>
    	</div>
    	<div class="form-body">
    		{!! Form::open(['method' => 'post', 'route' => ['admin.cate.updateThumbnail', ['id' => $cate->id]], 'files' => true, 'id' => 'FormUdtCateThumb']) !!}
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
	    			{!! Form::submit('Lưu', ['class' => 'btn btn-primary cbtn']) !!}
	    		</div>
    		{!! Form::close() !!}
    		{!! Form::open(['method' => 'post', 'route' => ['admin.cate.update', ['id' => $cate->id]], 'files' => true, 'id' => 'FormUdtCate']) !!}
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
	   
	    		@if (!$cate->isParent())
	    			<div class="form-row">
		    			<div class="form-group">
		    				{!! Form::label('parent_id', 'Chuyên mục cha') !!}
		    				<select name="parent_id" id="parent_id" class="form-control" data-route="{{ route('admin.cate.getChildCate') }}">
		    					@foreach($parents as $p) 
		    						@if($p->id !== $cate->id)
		    							<option value="{{ $p->id }}" {{ $cate->parent->id===$p->id ? 'selected=selected' : '' }}>{{ $p->title }}</option>
		    						@endif
		    					@endforeach
		    				</select>
		    			</div>
		    		</div>
	    		@endif

	    		<div class="form-row">
	    			{!! Form::button('Lưu', ['class' => 'btn btn-primary cbtn', 'id' => 'BtnUdtCate']) !!}
	    		</div>
	    	{!! Form::close() !!}
    	</div>
    </div>
</div>