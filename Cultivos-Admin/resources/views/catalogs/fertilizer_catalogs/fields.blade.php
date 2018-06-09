<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catalogs.fertilizerCatalogs.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
</div>
