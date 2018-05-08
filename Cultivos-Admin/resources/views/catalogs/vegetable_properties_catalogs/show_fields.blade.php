<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id   :') !!}
    <p>{!! $vegetablePropertiesCatalog->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', Lang::get('common.'.strtolower('Name')).':') !!}
    <p>{!! $vegetablePropertiesCatalog->Name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', Lang::get('catalogs/vegetablePropertiesCatalogs.strtolower(Created At)').':') !!}
    <p>{!! $vegetablePropertiesCatalog->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', Lang::get('catalogs/vegetablePropertiesCatalogs.strtolower(Updated At)').':') !!}
    <p>{!! $vegetablePropertiesCatalog->updated_at !!}</p>
</div>

