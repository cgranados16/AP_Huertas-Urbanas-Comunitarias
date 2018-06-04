<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\FavoriteGardens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GardenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('gardens/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

/**
     * Display the specified Vegetable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return view('gardens/index', ['garden' => Garden::findOrFail($id)]);
    }

    public function reviews($id)
    {
        return view('gardens/reviews', ['garden' => Garden::findOrFail($id)]);
    }

    public function photos($id)
    {
        return view('gardens/photos', ['garden' => Garden::findOrFail($id)]);
    }

    public function products($id)
    {
        return view('gardens/product_list', ['garden' => Garden::findOrFail($id)]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function edit(Garden $garden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garden $garden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garden $garden)
    {
        //
    }

    public function follow($id)
    {
        $favorite = new FavoriteGardens;
        $favorite->IdClient = Auth::id();
        $favorite->IdGarden = $id;
        $favorite->save();
    }

    public function unfollow($id)
    {
        $favorite = FavoriteGardens::where('IdClient',Auth::id())->where('IdGarden',$id)->delete();
        

        
    }
}
