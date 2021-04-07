<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h4>Chỉnh sửa bài viết</h4>
        </div>
        <div class="form-body">
            {!!Form::open(['method'=>'post','route'=>['admin.post.updateThumbnail',['id'=>$post->id]],'files'=>true])!!}
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <div class="current_img col-6">
                        <div class="thumbnail">
                            <img src="{{$post->thumbnail_photo_path}}" alt="{{$post->slug}}" width="80" height="80">
                        </div>
                    </div>
                    <div id="thumbnail_photo_path col-6">
                        {!! Form::label('thumbnail_photo_path','Thumbnail') !!}
                        <input type="file" name="thumbnail_photo_path" id="thumbnail_photo_path" accept="image/*" class="form-control-file @error('thumbnail_photo_path') is-invalid @enderror">
                    </div>
                    @error('thumbnail_photo_path')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row col-12 col-md-6">
                <div class="form-group col-12 col-md-6">
                    {!! Form::submit('Sửa',['class'=> 'btn btn-primary']) !!}
                </div>
            </div>
            {!!Form::close()!!}
            {!!Form::open(['method'=>'post','route'=>['admin.post.update',['id'=>$post->id]],'files'=>true, 'id' => 'FormUpdatePost'])!!}
            <div class="form-group col-12 col-md-6">
                {!! Form::label('title','Tiêu đề bài viết') !!}
                {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-12 col-md-6">
                {!! Form::label('description','Mô tả') !!}
                {!! Form::textarea('description',$post->description,['class'=>'form-control']) !!}
            </div>
            <div class="form-row">
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
            <div class="form-row col-12 col-md-6">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('parent_cate','Chuyên mục cha') !!}
                    <select name="parent_cate" id="parent_cate" data-route="{{ route('admin.cate.getChildCate') }}">
                        <option value="" disabled="disabled" selected="selected">{{ __('---Tùy chọn---') }}</option>
                        @isset ($parentCates)
                            @foreach($parentCates as $c)
                            <option value="{{ $c->id }}" {{ $post->category->parent->id===$c->id ? 'selected=selected' : '' }}>{{ $c->title }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('child_cate','Chuyên mục con') !!}
                    <select name="child_cate" id="child_cate">
                        @isset ($childCates)
                            @foreach($childCates as $c)
                                <option value="{{ $c->id }}" {{ $post->category->id===$c->id ? 'selected=selected' : '' }}>{{ $c->title }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>
            <div class="form-row col-12 col-md-6">
                <div class="form-group col-12 col-md-6">
                    {!! Form::button('Sửa',['class'=> 'btn btn-primary', 'id' => 'BtnUpdatePost']) !!}
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
</div>
