<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h4>Chỉnh sửa bài viết</h4>
        </div>
        <div class="form-body">
            {!!Form::open(['method'=>'post','route'=>['admin.post.update',['id'=>$post->encrypted_id]],'files'=>true])!!}
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('title','Tiêu đề bài viết') !!}
                    {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('description','Mô tả') !!}
                    {!! Form::textarea('description',$post->description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('thumbnail_photo_path','Thumbnail') !!}
                    <div class="current_img col-6">
                        <div class="thumbnail">
                            <img src="{{$post->thumbnail_photo_path}}" alt="{{$post->slug}}">
                        </div>
                    </div>
                    <div id="thumbnail_photo_path col-6">
                        {!! Form::file('thumbnail_photo_path', null, ['class' => 'form-control-file']) !!}
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('content','Nội dung') !!}
                    {!! Form::textarea('content',$post->content,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('keywords','') !!}
                    {!! Form::text('keywords',$post->meta_data->keywords,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('source','') !!}
                    {!! Form::text('source',$post->meta_data->source,['class'=>'form-control']) !!}
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
