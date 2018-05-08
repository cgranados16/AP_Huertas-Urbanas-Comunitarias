<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $colorCatalog->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', 'Nombre:') !!}
    <p>{!! $colorCatalog->Name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Descripción:') !!}
    <p>{!! $colorCatalog->Description !!}</p>
</div>

<!-- Colorhexcode Field -->
<div class="form-group">
    {!! Form::label('ColorHexCode', 'Color:') !!}
    <p>{!! $colorCatalog->ColorHexCode !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{!! $colorCatalog->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado el:') !!}
    <p>{!! $colorCatalog->updated_at !!}</p>
</div>

