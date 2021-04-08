<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h4>Thêm chuyên mục</h4>
        </div>
        <div class="form-body">
            {!! Form::open(['method' => 'post', 'route' => ['admin.cate.store'], 'files' => true, 'id' => 'FormCreateCate']) !!}
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
                    {!! Form::label('', 'Loại chuyên mục') !!}
                    {!! Form::label('', 'Mục cha') !!}
                    {!! Form::radio('type', 1); !!}
                    {!! Form::label('', 'Mục con') !!}
                    {!! Form::radio('type', 2, true); !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    {!! Form::label('parentCates','Chuyên mục cha') !!}
                    <select name="parentCates" id="parentCates" data-route="{{ route('admin.cate.getChildCate') }}">
                        @foreach($parentCates as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    {!! Form::button('Thêm', ['class' => 'btn btn-primary', 'id' => 'BtnCreateCate']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
