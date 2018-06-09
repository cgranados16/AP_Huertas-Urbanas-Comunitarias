@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="bg-gd-dusk">
        <div class="bg-black-op-25">
            <div class="content content-top content-full text-center">
                <div class="mb-15">
                    <a class="img-link" href="{{ asset($user->photo()) }}">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset($user->photo()) }}" alt="">                        
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
        {{-- <div class="row gutters-tiny">
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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Ajustes</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Edit Customer -->
            

        </div>
        <!-- END Addresses -->

        <!-- Cart -->
        <h2 class="content-heading">Cart</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <!-- Products Table -->
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                            <th>Product</th>
                            <th class="d-none d-md-table-cell">Category</th>
                            <th class="text-right">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.424</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Out of Stock</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/27                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #24</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">House</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$92</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.423</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">Available</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/26                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #23</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">House</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$18</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.422</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Out of Stock</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/25                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #22</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">House</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$77</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products Table -->
            </div>
        </div>
        <!-- END Cart -->

        <!-- Past Orders -->
        <h2 class="content-heading">Past Orders</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <!-- Orders Table -->
                <table class="table table-borderless table-sm table-striped">
                    <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th style="width: 120px;">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                            <th class="d-none d-sm-table-cell">Customer</th>
                            <th class="text-right">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.577</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/27                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$303</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.576</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/26                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$454</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.562</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/25                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$341</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.785</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/24                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$172</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.454</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/23                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$125</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Orders Table -->
            </div>
        </div> --}}
        <!-- END Past Orders -->
    </div>
    <!-- END Page Content -->
@endsection