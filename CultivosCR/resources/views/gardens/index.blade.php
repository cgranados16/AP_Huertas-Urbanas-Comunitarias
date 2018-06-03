@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('img/photos/photo13@2x.jpg') }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-10">{{ $garden->Name }}</h1>
            <h2 class="h5 text-white-op">
                {{ $garden->Directions }}
            </h2>
            <!-- END Personal -->
            @auth
            <!-- Actions -->
            @if(!$garden->favorites->contains(Auth::user()->id))
                <button id="addFavoriteButton" type="button" onclick="addFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                    <i class="fa fa-plus mr-5"></i> Añadir a Favoritos
                </button>
                <button id="removeFavoriteButton" type="button" onclick="removeFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-danger mb-5"
                style="display:none;">
                    <i class="fa fa-times mr-5"></i> Eliminar de Favoritos
                </button>
            @else
                <button id="addFavoriteButton" type="button" onclick="addFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" style="display:none;">
                    <i class="fa fa-plus mr-5"></i> Añadir a Favoritos
                </button>
                <button id="removeFavoriteButton" type="button" onclick="removeFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-danger mb-5">
                    <i class="fa fa-times mr-5"></i> Eliminar de Favoritos
                </button>
            @endif
            
            @endif
            <!-- END Actions -->
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="content">
        <div class="row">
            <!-- Garden Navigation Bar -->
            <div class="col-lg-4 col-xl-3">
                <div class="block block-themed">
                    <div class="block-content block-content-full bg-image" style="background-image: url('{{ asset($garden->GardenPicture) }}');width:100%;height: 200px;">
                    </div>
                    <div class="block-content block-content-full block-content-sm ">
                        <div class="font-size-xl font-w600 mb-5">{{ $garden->Name }}</div>
                        <ul class="nav-main p-10">
                            <li>
                                <a href="u-garden-home.html">
                                    <span class="sidebar-mini-hide">Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="u-garden-products.html">
                                    <span class="sidebar-mini-hide">Productos</span>
                                </a>
                            </li>
                            <li>
                                <a href="u-garden-photos.html">
                                    <span class="sidebar-mini-hide">Fotos</span>
                                </a>
                            </li>
                            <li>
                                <a href="u-garden-reviews.html">
                                    <span class="sidebar-mini-hide">Opiniones</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END Garden Navigation Bar -->
            <div class="col-lg-4 col-xl-6">
                <!-- Products -->
                <h2 class="content-heading">
                    <a href="u-garden-products.html">
                        <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">Ver más...</button>
                    </a>
                    <i class="fa fa-box"></i> Productos
                </h2>
                <div class="row gutters-tiny">
                    @foreach ($garden->harvests as $harvest) 
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-link-shadow">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <img class="harvest-profile-showcase" src="{{ asset($harvest->harvest->photos->first()->Photo) }}"></img>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">{{$harvest->harvest->Name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- END Products -->
                <!--Photos -->

                <h2 class="content-heading pt-20">
                    <a href="u-garden-photos.html">
                        <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">Ver todas</button>
                    </a>
                    Fotos
                </h2>
                <div class="js-slider slick-nav-black slick-dotted-inner slick-dotted-white" data-dots="true" data-arrows="true">
                    @foreach ($garden->photos as $photo)
                        <div>
                            <img class="img-fluid" src="{{ asset($photo->Photo) }}" alt="">
                        </div>
                    @endforeach
                </div>

                <!-- END Photos -->
                <!-- Reviews -->
                <div class="block block-rounded block-bordered mt-30">
                    <div class="block-header">
                        <h3 class="block-title">
                            <b>Opiniones</b>
                        </h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-4 col-xl-1">
                                <h2 class="text-primary">
                                    @if (count($garden->reviews) === 0)
                                        5.0
                                    @else
                                        {{$garden->gardenScore()}}
                                    @endif
                                </h2>
                            </div>
                            <div class="col-lg-4 col-xl-5" style="padding-top: 4px;">
                                <div class="js-rating-read" data-score="5" data-star-on="fa fa-fw fa-2x fa-star text-primary" data-star-off="fa fa-fw fa-2x fa-star text-muted"></div>
                            </div>
                            <div class="col-l-4" style="padding-top: 8px;">
                                <h5 class="text-muted">{{ count($garden->reviews) }} opiniones</h5>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="float-left">
                                <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt="">
                            </div>
                            <div class="float-left p-5 m l-10">
                                @auth
                                <div class="font-w600" style="font-size:16px">Di a los demás qué te parece</div>
                                <div class="js-rating" data-star-on="fa fa-fw fa-2x fa-star text-primary" data-star-off="fa fa-fw fa-2x fa-star text-muted"></div>
                                @else
                            <a href="{{route('login')}}"><div class="font-w600 p-15" style="font-size:16px">Inicia Sesión para dejar tu opinión sobre esta huerta.</div></a>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="block-content pt-0">
                        <ul class="nav-reviews push">
                            @foreach ($garden->reviews as $review)
                            <li>
                                <a href="be_pages_generic_profile.php">
                                    <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt=""> {{$review->user->getFullNameAttribute()}}
                                    <small>{{$review->Date->diffForHumans()}}</small>
                                    <div class="js-rating-read" data-score="{{$review->Score}}" data-star-on="fa fa-fw fa-star text-primary" data-star-off="fa fa-fw fa-star text-muted"></div>
                                    <div class="font-w400 font-size-xs text-muted">{{$review->Description}}</div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-button">
                        <a href="u-garden-reviews.html">
                            <button type="button" class="btn btn-outline-primary btn-noborder">Ver todas</button>
                        </a>
                    </div>
                </div>
                <!-- END Reviews -->
                <!-- Colaboradores -->
                <h2 class="content-heading pt-20">
                    Colaboradores de la Huerta
                </h2>
                <div class="row gutters-tiny">
                    @foreach($garden->collaborators as $collaborator)
                    <div class="col-md-6 col-xl-4">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full">
                                <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt="">
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                            <div class="font-w600 mb-5">{{$collaborator->getFullNameAttribute()}}</div>
                                <div class="font-size-sm text-muted">{{$collaborator->email}}</div>
                            </div>
                            <div class="block-content block-content-full">
                                <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                                    <i class="fa fa-user-circle mr-5"></i>Enviar Mensaje
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- END Colaboradores -->
            </div>
            <div class="col-lg-4 col-xl-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-fw fa-id-badge"></i>
                            Administrador
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="push">
                            <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt="">
                        </div>
                        <div class="font-w600 mb-5">{!! $garden->manager->getFullNameAttribute() !!}</div>
                        <div class="font-size-sm text-muted">{!! $garden->manager->email !!}</div>
                    </div>
                </a>
                <div class="block block-rounded">
                    <div class="block-header block-header-default text-center">
                        <h3 class="block-title">
                            <i class="fa fa-fw fa-info"></i>
                            Acerca de
                        </h3>
                    </div>
                    <div id="map" style="width: 100%; height: 100px" onclick="openMapModal()"></div>
                    <div class="block-content">
                        <div class="js-rating-read text-center" data-score="3" data-star-on="fa fa-fw fa-star text-warning" data-star-off="fa fa-fw fa fa-star text-muted"></div>
                        <div class="font-size-sm text-muted text-center mb-20">
                            ({{ count($garden->reviews) }} {{trans_choice('common.reviews',count($garden->reviews))}})
                        </div>
                        <table class="table table-borderless table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fa fa-fw fa-heart mr-10 text-danger"></i> {{ count($garden->favorites) }}  personas han añadido esta huerta a sus favoritos
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="modal-popout">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Huerta del Sol</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="map2" style="width: 100%; height: 600px"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="https://www.google.com/maps?saddr=My+Location&daddr={{ $garden->Latitude }},{{ $garden->Longitude }}" target="_blank" class="btn btn-alt-success">Cómo llegar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fruitModal" tabindex="-1" role="dialog" aria-labelledby="modal-popout">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Huerta del Sol</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row py-20">
                            <div class="col-sm-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                                <div class="js-slider slick-nav-black slick-dotted-inner slick-dotted-white js-slider-enabled slick-initialized slick-slider slick-dotted"
                                    data-dots="true" data-arrows="true">
                                    <button class="slick-prev slick-arrow" aria-label="Previous" type="button">Previous</button>
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 3801px; transform: translate3d(-1629px, 0px, 0px);">
                                            <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                                                style="width: 543px;" tabindex="-1">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo3.png') }}" alt="Project Promo 3">
                                            </div>
                                            <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 543px;"
                                                tabindex="-1" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo1.png') }}" alt="Project Promo 1">
                                            </div>
                                            <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 543px;"
                                                tabindex="-1" role="tabpanel" id="slick-slide01" aria-describedby="slick-slide-control01">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo2.png') }}" alt="Project Promo 2">
                                            </div>
                                            <div class="slick-slide slick-current slick-active" data-slick-index="2"
                                                aria-hidden="false" style="width: 543px;" tabindex="0" role="tabpanel" id="slick-slide02"
                                                aria-describedby="slick-slide-control02">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo3.png') }}" alt="Project Promo 3">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="3" aria-hidden="true"
                                                style="width: 543px;" tabindex="-1">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo1.png') }}" alt="Project Promo 1">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true"
                                                style="width: 543px;" tabindex="-1">                                                
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo2.png') }}" alt="Project Promo 2">
                                            </div>
                                            <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true"
                                                style="width: 543px;" tabindex="-1">
                                                <img class="img-fluid" src="{{ asset('img/various/cb-project-promo3.png') }}" alt="Project Promo 3">
                                            </div>
                                        </div>
                                    </div>


                                    <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
                                    <ul class="slick-dots" style="" role="tablist">
                                        <li class="" role="presentation">
                                            <button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00"
                                                aria-label="1 of 3" tabindex="-1">1</button>
                                        </li>
                                        <li role="presentation" class="">
                                            <button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide01"
                                                aria-label="2 of 3" tabindex="-1">2</button>
                                        </li>
                                        <li role="presentation" class="slick-active">
                                            <button type="button" role="tab" id="slick-slide-control02" aria-controls="slick-slide02"
                                                aria-label="3 of 3" tabindex="0" aria-selected="true">3</button>
                                        </li>
                                    </ul>
                                </div>
                                <table class="table table-striped table-borderless mt-20">
                                    <tbody>
                                        <tr>
                                            <td class="font-w600">Client</td>
                                            <td>Company S.A.</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600">Budget</td>
                                            <td>$10.000</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600">Category</td>
                                            <td>Web Development</td>
                                        </tr>
                                        <tr>
                                            <td class="font-w600">Website</td>
                                            <td>
                                                <a href="javascript:void(0)">https://example.com/</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 nice-copy">
                                <h3 class="mb-10">Introduction</h3>
                                <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                                    luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus
                                    lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus
                                    mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                <h3 class="mt-20 mb-10">Research</h3>
                                <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                                    luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus
                                    lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus
                                    mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                                    luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus
                                    lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus
                                    mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="https://www.google.com/maps?saddr=My+Location&daddr={{ $garden->Latitude }},{{ $garden->Longitude }}" target="_blank" class="btn btn-alt-success">Cómo llegar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Container -->
@endsection
@section('scripts')
    <script>
        var latitude = {{ $garden->Latitude }};
        var longitude = {{ $garden->Longitude }}; 
        var host = '{{ url("garden/$garden->id") }}';
    </script>
    
    <script src="{{ asset('js/cultivoscr/garden-profile.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-raty/jquery.raty.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-59jWkkJJxeKQdF1KNUqgg7MrSWRqHt4&callback=initMap"></script>
        
@endsection