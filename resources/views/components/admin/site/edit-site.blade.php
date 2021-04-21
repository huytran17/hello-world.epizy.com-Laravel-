<div id="sa_setting">
    <div id="sa_st_form" class="form-wrapper">
        <div class="form-body">
            {!! Form::open(['method' => 'post', 'route' => ['admin.site.update'], 'id' => 'FormUpdSite']) !!}
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('name', 'Tên Website') !!}
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $site->title }}">
                    @error('name')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('title', 'Tiêu đề Website') !!}
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $site->title }}">
                    @error('title')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('description', 'Mô tả Website') !!}
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $site->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('keywords', 'Từ khóa') !!}
                    <input type="text" name="keywords" id="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{ $site->keywords }}">
                    @error('keywords')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('author', 'Chủ sở hữu') !!}
                    <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ $site->author }}">
                    @error('author')
                    <span class="invalid-feedback d-inline" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary cbtn']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'post', 'route' => ['admin.site.updateLogo'], 'files' => true, 'id' => 'FormUpdLogo']) !!}
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('logo', 'Logo') !!}
                    <input type="file" name="logo" id="logo" accept="image/*" class="form-control-file @error('logo') is-invalid @enderror">
                </div>
                @error('logo')
                <span class="invalid-feedback d-inline" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary cbtn']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'post', 'route' => ['admin.site.updateShortcut'], 'files' => true, 'id' => 'FormUpdShortcut']) !!}
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('shortcut', 'Ảnh shortcut') !!}
                    <input type="file" name="shortcut" id="shortcut" accept="image/*" class="form-control-file @error('shortcut') is-invalid @enderror">
                </div>
                @error('shortcut')
                <span class="invalid-feedback d-inline" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary cbtn']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'post', 'route' => ['admin.site.updateFavicon'], 'files' => true, 'id' => 'FormUpdFavicon']) !!}
            <div class="form-row mt-5">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('favicon', 'Ảnh favicon') !!}
                    <input type="file" name="favicon" id="favicon" accept="image/*" class="form-control-file @error('favicon') is-invalid @enderror">
                </div>
                @error('favicon')
                <span class="invalid-feedback d-inline" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary cbtn']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
