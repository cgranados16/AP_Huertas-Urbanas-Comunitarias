<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('users/profile', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('users/edit', ['user' => Auth::user()]);
    }

    public function updateProfile()
    {
         $email = Input::get('profile-email');
         $exists = User::where('email',$email)->first();
        if (!$exists && $email!=Auth::user()->email){
            $user = Auth::user();
            $user->email = $email;
            $user->save();
            flash('Guardado correctamente')->success();
        }else{
            flash('Correo electrónico ya existe')->error();
        }
        return redirect(route('user.edit'));


    }

    public function updatePassword(){
        $user = Auth::user();
        if (Hash::check(Input::get('password-current'), Auth::user()->password)) {
            $user->password = Hash::make(Input::get('password-new'));
            $user->save();
            flash('Guardado correctamente')->success();
        }else{
            flash('La contraseña es incorrecta.')->error();
        }
        return redirect(route('user.edit'));
    }

    public function updateInfo(){
        $user = Auth::user();
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        $user->birth_date = Input::get('birth_date');
        $user->save();
        flash('Guardado correctamente')->success();
        return redirect(route('user.edit'));
    }

    public function updatePhoto(){
        $user = Auth::user();
        $file = Input::file('file');
        if ($file){   
            $time = Carbon::now();
            $extension = $file->getClientOriginalExtension();    
            $directory = 'users/'. $user->id;
            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
            $upload_success = $file->storeAs($directory, $filename,'photos');
            $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
            if ($upload_success && $ext_upload_success) {
                $user->photo = 'photos/users/'. $user->id.'/'.$filename;
                $user->save();
                flash('Foto de Perfil actualizada  correctamente')->success();
            }
        }
        // return redirect(route('user.edit'));
    }

    public function show($id)
    {
        return view('users/show', ['user' => User::findOrFail($id)]);
    }

    public function favoriteGardens()
    {
        return view('users/favoriteGardens', ['user' => Auth::user()]);
    }
}
