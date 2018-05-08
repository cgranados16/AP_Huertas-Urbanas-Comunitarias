<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', Lang::get('common.name').':') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Indanger Field -->
<div class="form-group col-sm-12">
    {!! Form::label('InDanger', Lang::get('trees.indanger').':') !!}
    <label class="radio-inline">
        {!! Form::radio('InDanger', "1", null) !!} {{Lang::get('common.yes')}}
    </label>

    <label class="radio-inline">
        {!! Form::radio('InDanger', "0", null) !!} {{Lang::get('common.no')}}
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('/common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trees.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
</div>
