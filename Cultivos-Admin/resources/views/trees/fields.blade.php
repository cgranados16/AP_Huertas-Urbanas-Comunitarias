<div class="block block-rounded block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información Básica</h3>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <!-- Name Field -->
            
                {!! Form::label('Name', Lang::get('common.name').':', ['class'=>'col-12']) !!}
                {!! Form::text('Name', $tree->Name, ['class' => 'form-control col-6']) !!}
        
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
            <div class="form-group col-12">
                {!! Form::label('InDanger', Lang::get('trees.indanger').':') !!}
                <label class="radio-inline">
                    {!! Form::radio('InDanger', "1", null) !!} {{Lang::get('common.yes')}}
                </label>
            
                <label class="radio-inline">
                    {!! Form::radio('InDanger', "0", null) !!} {{Lang::get('common.no')}}
                </label>
            </div>
        </div>
    </div>  
    
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(Lang::get('/common.save'), ['class' => 'btn btn-primary','id'=>'submit']) !!}
        <a href="{!! route('trees.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
    </div>