<div class="container">
	<div class="form-wrapper">
		<div class="form-header">
			<h4>Thêm bài viết</h4>
		</div>
		<div class="form-body">
			{!!Form::open(['method'=>'post','route'=>'admin.post.store','files'=>true,'id'=>'FormCreatePost'])!!}
				
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('title','Tiêu đề bài viết') !!}
						{!! Form::text('title',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('description','Mô tả') !!}
						{!! Form::text('description',null,['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('content','Nội dung') !!}
						{!! Form::text('content',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						{!! Form::label('keywords','') !!}
						{!! Form::text('keywords',null,['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::label('source','') !!}
						{!! Form::text('source',null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-12 col-md-6">
						<div class="form-group col-12 col-md-6">
		                    {!! Form::label('parent_cate','Chuyên mục') !!}
		                    <select name="parent_cate" id="parent_cate">
		                        <option value="" disabled="disabled" selected="selected">{{ __('---Tùy chọn---') }}</option>
		                        @foreach($parentCates as $c)
		                        <option value="{{ $c->id }}">{{ $c->title }}</option>
		                        @endforeach
		                    </select>
		                </div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-md-6">
						{!! Form::hidden('user_id',auth()->id(),['class'=>'form-control']) !!}
					</div>
				</div>
			{!!Form::close()!!}
		</div>
		<div class="form-footer">
			{!! Form::button('Thêm',['class'=> 'btn btn-primary','id'=>'BtnCreatePost']) !!}
		</div>
	</div>
</div>