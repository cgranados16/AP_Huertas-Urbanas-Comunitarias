<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', Lang::get('/trees.'strtolower('Id')).':') !!}
    <p>{!! $tree->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', Lang::get('/trees.'strtolower('Name')).':') !!}
    <p>{!! $tree->Name !!}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('Order', Lang::get('/trees.'strtolower('Order')).':') !!}
    <p>{!! $tree->Order !!}</p>
</div>

<!-- Indanger Field -->
<div class="form-group">
    {!! Form::label('InDanger', Lang::get('/trees.'strtolower('Indanger')).':') !!}
    <p>{!! $tree->InDanger !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', Lang::get('/trees.'strtolower('Created At')).':') !!}
    <p>{!! $tree->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', Lang::get('/trees.'strtolower('Updated At')).':') !!}
    <p>{!! $tree->updated_at !!}</p>
</div>

