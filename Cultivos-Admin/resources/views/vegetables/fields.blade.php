<div class="block block-rounded block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información Básica</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('Name', Lang::get('/common.name').':') !!}
                    {!! Form::text('Name', null, ['class' => 'js-maxlength form-control js-maxlength-enabled','maxlength'=>'50']) !!}
                    <div class="form-text text-muted font-size-sm text-right">50 Caractéres máx</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    {!! Form::label('Color', Lang::get('catalogs/color_catalog.color').':') !!}
                    <select class="js-example-basic-single" name="Color">
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    {!! Form::label('Properties', Lang::get('catalogs/vegetable_properties_catalogs.title').':') !!}
                    <select class="js-example-basic-multiple" name="properties[]" multiple="multiple">
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>                
            <div class="form-group row">
                {!! Form::label('Type', Lang::get('catalogs/vegetable_type_catalog.title').':', ['class'=>'col-12']) !!}
                <div class="col-6">
                    <select class="js-example-basic-single" name="Type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>                
        </div>
    </div>  
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(Lang::get('/common.save'), ['class' => 'btn btn-primary','id'=>'submit']) !!}
        <a href="{!! route('vegetables.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
    </div>