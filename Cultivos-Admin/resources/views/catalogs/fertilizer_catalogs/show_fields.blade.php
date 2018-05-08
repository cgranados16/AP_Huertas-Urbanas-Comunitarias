<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', Lang::get('common.id').':') !!}
    <p>{!! $fertilizerCatalog->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', Lang::get('common.description').':') !!}
    <p>{!! $fertilizerCatalog->Description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', Lang::get('common.created at').':') !!}
    <p>{!! $fertilizerCatalog->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', Lang::get('common.updated at').':') !!}
    <p>{!! $fertilizerCatalog->updated_at !!}</p>
</div>

