@extends('layouts.app') 

@section('styles')
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/trees.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')

        <form action="be_pages_ecom_product_edit.php" method="post" onsubmit="return false;">
            <div class="block block-rounded block-themed">
                <div class="block-header bg-gd-primary">
                    <h3 class="block-title">Información Básica</h3>
                </div>
                <div class="block-content block-content-full">
                    {!! Form::open(['route' => 'trees.store']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('Name', Lang::get('common.name').':') !!}
                            {!! Form::text('Name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                                <div class="row">
                                {!! Form::label('InDanger', Lang::get('trees.indanger').':') !!}
                            </div>
                                {!! Form::radio('InDanger', "1", null) !!} {{Lang::get('common.yes')}}
                                </label>
                            
                                <label class="radio-inline">
                                    {!! Form::radio('InDanger', "0", null) !!} {{Lang::get('common.no')}}
                                </label>
                            
                            </div>

                            <div class="form-group col-sm-6">
                                {!! Form::label('InDanger', 'Familia y orden:') !!}
                                <select class="js-example-basic-single" name="state">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit(Lang::get('/common.save'), ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('trees.index') !!}" class="btn btn-default">{{Lang::get('common.cancel')}}</a>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
            
        </form>
        

        <div class="block block-rounded block-themed">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Images</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
            </div>
        </div>
@endsection

@section('scripts')


    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>
    
    <script>
       // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2({ width: '100%' });
});
    </script>
@endsection