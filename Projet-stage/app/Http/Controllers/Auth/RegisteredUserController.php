<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Locataire;
use App\Models\Proprietaire;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>'required',
            'cin'=>'required|string|size:8',
            'name'=>'required',
            'phone'=>'required|string|size:10',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role,
        ]));
        //dd($user);
        if($user->role=='proprietaire'){
            Proprietaire::create([
            'cin' => $request->cin,
            'nom' => $request->name,
            'phone'=>$request->phone,
            'id_user'=>$user->id,
        ]);
        }
        if($user->role=='locataire'){
            Locataire::create([
            'cin' => $request->cin,
            'nom' => $request->name,
            'phone'=>$request->phone,
            'id_user'=>$user->id,
        ]);
        }

        event(new Registered($user));
        if($user->role=='proprietaire'){
            return redirect(RouteServiceProvider::PROPRIETAIRE);
        }
        if($user->role=='locataire'){
            return redirect(RouteServiceProvider::LOCATAIRE);
        }
    }
}
