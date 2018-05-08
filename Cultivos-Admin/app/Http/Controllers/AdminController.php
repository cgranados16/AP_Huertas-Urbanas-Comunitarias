<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    /**
    * Display a listing of the Admin.
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request)
    {
        $model = User::all();
        return view('admin.index')->with('users', $model);;
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.create');
    }

    

}
