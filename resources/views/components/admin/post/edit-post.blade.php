<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h4>Chỉnh sửa bài viết</h4>
        </div>
        <div class="form-body">
            {!!Form::open(['method'=>'post','route'=>'admin.user.store','files'=>true])!!}
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('title','Tiêu đề bài viết') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('description','Mô tả') !!}
                    {!! Form::text('description',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('thumbnail_photo_path','Thumbnail') !!}
                    {!! Form::text('thumbnail_photo_path',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('content','Nội dung') !!}
                    {!! Form::text('content',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('keywords','') !!}
                    {!! Form::text('keywords',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('source','') !!}
                    {!! Form::text('source',null,['class'=>'form-control']) !!}
                </div>
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
                <div class="form-group col-12 col-md-6 d-none">
                    <select name="parent_cate" id="parent_cate">
                        <option value="" disabled="disabled" selected="selected">{{ __('---Tùy chọn---') }}</option>
                        
                    </select>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        <div class="form-footer">
            {!! Form::button('Sửa',['class'=> 'btn btn-primary']) !!}
        </div>
    </div>
</div>
