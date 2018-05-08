<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', Lang::get('common.id').':') !!}
    <p>{!! $vegetable->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', Lang::get('common.name').':') !!}
    <p>{!! $vegetable->Name !!}</p>
</div>

<!-- Color Field -->
<div class="form-group">
    {!! Form::label('Color', Lang::get('catalogs/color_catalog.color').':') !!}
    <p>{!! $vegetable->Color !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('Type', Lang::get('catalogs/vegetable_type_catalog.type').':') !!}
    <p>{!! $vegetable->Type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', Lang::get('common.created at').':') !!}
    <p>{!! $vegetable->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', Lang::get('common.updated at').':') !!}
    <p>{!! $vegetable->updated_at !!}</p>
</div>

