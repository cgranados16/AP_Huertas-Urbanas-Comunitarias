<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', Lang::get('common.name').':') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Description', Lang::get('common.description').':') !!}
    {!! Form::textarea('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Colorhexcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ColorHexCode', Lang::get('catalogs/color_catalog.color').':') !!}
    {!! Form::text('ColorHexCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catalogs.colorCatalogs.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
</div>
