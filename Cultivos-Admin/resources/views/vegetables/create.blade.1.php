@extends('layouts.app') 

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
@endsection 

@section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/vegetables.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'vegetables.store']) !!}
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
{!! Form::close() !!}


@endsection

@section('scripts')


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2({width: '100%'});
        $('.js-example-basic-multiple').select2({width: '100%'});
        Codebase.helpers(['maxlength', 'select2']);
    });

    Dropzone.options.myDropzone = {
        // Prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,
        addRemoveLinks: true,

        init: function() {
        var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function() {
            alert('caca');
            //myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        });

        // You might want to show the submit button only when 
        // files are dropped here:
        this.on("addedfile", function() {
            // Show submit button here and/or inform user to click it.
        });

        }
    };
</script>
@endsection