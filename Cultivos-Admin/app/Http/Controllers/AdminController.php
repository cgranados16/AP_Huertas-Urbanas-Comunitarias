<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

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

    public function store()
    {
        $user = new User();
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->gender = Input::get('gender-group');
        $user->birth_date = Carbon::parse(Input::get('birthdate'));
        $user->save();
        return redirect(route('admin.index'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('admin.index'));
    }

    

}
