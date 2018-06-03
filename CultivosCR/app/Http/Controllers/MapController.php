<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;

class MapController extends Controller
{
    public function index(){
        return view('map',['gardens' => Garden::all()]);
    }
}
