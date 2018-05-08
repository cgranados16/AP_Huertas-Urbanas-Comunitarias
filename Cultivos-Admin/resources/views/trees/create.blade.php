@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> @endsection @section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/trees.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')
<form action="be_pages_ecom_product_edit.php" method="post" onsubmit="return false;">
    <div class="block block-rounded block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información Básica</h3>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <label class="col-12" for="ecom-product-meta-title">Title</label>
                <div class="col-6">
                    <input type="text" class="js-maxlength form-control js-maxlength-enabled" maxlength="50">
                    <div class="form-text text-muted font-size-sm text-right">50 Caractéres máx</div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('InDanger', 'Familia y orden:', ['class'=>'col-12']) !!}
                <div class="col-6">
                    <select class="js-example-basic-single" name="state">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
            </div>
        </div>
    </div>  
</form>

<div class="block block-rounded block-themed">
    <div class="block-header bg-gd-primary">
        <h3 class="block-title">Images</h3>
    </div>
    <div class="block-content block-content-full">
        <form action="/trees.store" class="dropzone" id="my-awesome-dropzone"></form>
    </div>
</div>
@endsection @section('scripts')


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2({width: '100%'});
        Codebase.helpers(['maxlength', 'select2']);
    });
</script> @endsection