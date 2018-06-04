@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="bg-gd-dusk">
        <div class="bg-black-op-25">
            <div class="content content-top content-full text-center">
                <div class="mb-20">
                    <a class="img-link" href="be_pages_ecom_customer.html">
                        <img class="img-avatar img-avatar-thumb" src="{{ asset('photos/users/default.png') }}" alt="">
                    </a>
                </div>
                <h1 class="h3 text-white font-w700 mb-10">
                    {{$user->getFullNameAttribute()}}
                </h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <h2 class="content-heading">Overview</h2>
        <div class="row gutters-tiny">
            <!-- Orders -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-line-chart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="39">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- In Cart -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-shopping-cart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="3">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">In Cart</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END In Cart -->

            <!-- Edit Customer -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Edit Customer</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Edit Customer -->
            

        </div>
        <!-- END Addresses -->

    </div>
    <!-- END Page Content -->
@endsection