<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\Tree;
use App\Models\Vegetable;
use App\Models\FavoriteGardens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use DB;
use Illuminate\Support\Facades\Input;



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
        $districts = DB::table('district')->get();
        return view('gardens/create', ['districts' => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garden = new Garden;
        $garden->Name = Input::get('Name');
        $garden->IdManager = Auth::id();
        $garden->District = Input::get('District');
        $garden->Directions = Input::get('Directions');
        $garden->Latitude = Input::get('Latitude');
        $garden->Longitude = Input::get('Longitude');
        $garden->GardenPicture = 'photos/gardens/1/garden.jpg';
        $garden->save();
        return redirect(route('home'));
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

    public function showAdmin($id)
    {
         $garden = Garden::findOrFail($id);
         if (Auth::user()->can('view', $garden)) {
            return view('gardens/admin/dashboard', ['garden' => $garden]);
        }

        return redirect('home');
    }

    public function productsAdmin($id)
    {
         $garden = Garden::findOrFail($id);
         if (Auth::user()->can('view', $garden)) {
            return view('gardens/admin/products', ['garden' => $garden]);
        }

        return redirect('home');
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

    public function estadistica($id)
    {
        return view('gardens/estadistica', ['garden' => Garden::findOrFail($id)]);
    }

    public function sales($id)
    {
        return view('gardens/admin/Sales', ['garden' => Garden::findOrFail($id)]);
    }

    public function createSale($id)
    {
        return view('gardens/admin/Sale/create', ['garden' => Garden::findOrFail($id)]);
    }

    public function trades($id)
    {
        return view('gardens/admin/Trades', ['garden' => Garden::findOrFail($id)]);
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
