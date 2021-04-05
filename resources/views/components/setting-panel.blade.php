<div id="sa_setting">
	<div id="sa_st_form" class="form-wrapper">
		{!! Form::open(['method' => 'post', 'route' => ['admin.site.update'], 'file' => true]) !!}
		<div class="form-row">
			<div class="form-group col-12 col-md-6">
				{!! Form::label('name', 'Tên Website') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-12 col-md-6">
				{!! Form::label('title', 'Tiêu đề Website') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12 col-md-6">
				{!! Form::label('description', 'Mô tả Website') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-12 col-md-6">
				{!! Form::label('keywords', 'Từ khóa') !!}
				{!! Form::text('keywords', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12 col-md-6">
				{!! Form::label('author', 'Chủ sở hữu') !!}
				{!! Form::text('author', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-12 col-md-6">
				{!! Form::label('logo', 'Logo') !!}
				{!! Form::file('logo', null, ['class' => 'form-control-file']) !!}
				<div class="preview-img">
					<img src="{{ $site->logo_photo_path }}" alt="{{ $site->name }}">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12 col-md-6">
				{!! Form::label('shortcut', 'Ảnh shortcut') !!}
				{!! Form::file('shortcut', null, ['class' => 'form-control-file']) !!}
				<div class="preview-img">
					<img src="{{ $site->shortcut_photo_path }}" alt="{{ $site->name }}">
				</div>
			</div>
			<div class="form-group col-12 col-md-6">
				{!! Form::label('favicon', 'Ảnh favicon') !!}
				{!! Form::file('favicon', null, ['class' => 'form-control-file']) !!}
				<div class="preview-img">
					<img src="{{ $site->favicon_photo_path }}" alt="{{ $site->name }}">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12">
				{!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>