<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Descriptiaon', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('rtrim(catalogs.,". ")/common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catalogs.fertilizerCatalogs.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
</div>
