@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
@endsection
@section('content')
<div class="bg-primary-dark-op py-30">
    </div>
    <div class="content">
    <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
        @foreach($user->favoriteGardens as $garden)
            <div class="col-md-4">
                <div class="block">
                    <a href="{{url('garden/'.$garden->id)}}">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <img class="harvest-profile-showcase" src="{{ asset($garden->GardenPicture) }}"></img>
                                </div>
                                <div class="font-size-h4 font-w600">{{$garden->Name}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
