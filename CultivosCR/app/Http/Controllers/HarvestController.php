<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Tree;
use  App\Models\Vegetable;
use  App\Models\Garden;
use  App\Models\Harvest;
use  Auth;
use DB;
use Illuminate\Support\Facades\Input;

class HarvestController extends Controller
{

    /**
     * Display the specified Vegetable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return redirect('admin/garden/'.$id.'/products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $garden = Garden::findOrFail($id);
        if (Auth::user()->can('view', $garden)) {
            $trees = Tree::all();
            $vegetables = Vegetable::all();
            $fertilizer = DB::table('fertilizercatalog')->get();
            return view('harvest/create',['trees' => $trees, 'vegetables' => $vegetables, 'fertilizer' => $fertilizer, 'garden' => $garden]);
        }
        return redirect('home');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        $harvest = new Harvest;
        $harvest->Garden = $id;
        if (Input::get('Harvest') instanceof Vegetable){
            $harvest->HarvestType = 2;
        }else{
            $harvest->HarvestType = 1;
        }
        $harvest->Harvest = Input::get('Harvest');
        $harvest->FertilizerRequirements = Input::get('Fertilizer');
        $harvest->Price = Input::get('Price');
        $harvest->InStock = Input::get('InStock') === 'on' ? 1 : 0;
       
        $harvest->save();
        return redirect('admin/garden/'.$id.'/products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Harvest $harvest)
    {
        $garden = Garden::findOrFail($id);
        if (Auth::user()->can('view', $garden)) {
            $trees = Tree::all();
            $vegetables = Vegetable::all();
            $fertilizer = DB::table('fertilizercatalog')->get();
            return view('harvest/edit',['harvest' => $harvest ,'trees' => $trees, 'vegetables' => $vegetables, 'fertilizer' => $fertilizer, 'garden' => $garden]);
        }
        return redirect('home');
    }


    public function update(Request $request)
    {
        $garden = Garden::findOrFail($harvest);
        if (Input::get('Harvest') instanceof Vegetable){
            $garden->HarvestType = 2;
        }else{
            $garden->HarvestType = 1;
        }
        $garden->Harvest = Input::get('Harvest');
        $garden->FertilizerRequirements = Input::get('Fertilizer');
        $garden->Price = Input::get('Price');
        $garden->InStock = Input::get('InStock') === 'on' ? 1 : 0;
       
        $garden->save();
        return redirect('admin/garden/'.$id.'/products');
    }

    public function destroy($id, Harvest $harvest)
    {
        $harvest->delete();
        return redirect('admin/garden/'.$id.'/products');
    }

    public function photo()
    {
        $id = Input::get('id');
        $harvest = Harvest::find($id);
        return asset($harvest->harvest->photos->first()->Photo);
    }
    
    

}
