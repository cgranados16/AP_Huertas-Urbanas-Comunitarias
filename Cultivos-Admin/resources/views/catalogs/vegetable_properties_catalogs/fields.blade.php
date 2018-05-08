<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catalogs.vegetablePropertiesCatalogs.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
</div>
