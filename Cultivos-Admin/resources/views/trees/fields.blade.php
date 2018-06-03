<div class="block block-rounded block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información Básica</h3>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <!-- Name Field -->
            
                {!! Form::label('Name', Lang::get('common.name').':') !!}
                {!! Form::text('Name', null, ['class' => 'form-control']) !!}
        
            </div>
            <div class="form-group row">
                {!! Form::label('Order', 'Familia y orden:', ['class'=>'col-12']) !!}
                <div class="col-6">                           
                    <select class="js-example-basic-single" name="Order">
                        @foreach($ordersCatalog as $order)
                            <option value="{{$order->id}}">{{$order->Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>  
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