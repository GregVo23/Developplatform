<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|unique:users',
            'rules' => 'required',
            'country' => 'string|max:255',
        ]);

        $categories = Category::all();
        $message = "Vous êtes désormais membre sur Developplatform ! Bienvenue ".$request->first_name." !";
        session(['categories' => $categories]);

        if($request->notification == "on"){
            $notification = true;
        }

        if($request->has('rules')){
            Auth::login($user = User::create([
                'role_id' => 1,
                'firstname' => ucfirst($request->first_name),
                'lastname' => ucfirst($request->last_name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'country' => ucfirst($request->country),
                'city' => ucfirst($request->city),
                'zipcode' => $request->postalCode,
                'number' => $request->number,
                'street' => $request->street,
                'notification' => $notification,
            ]));

            event(new Registered($user));

            $request->session()->regenerate();
            Session::flash('success', $message);
            return redirect(RouteServiceProvider::HOME)->with('success', $message);
        }

        return redirect()->back()->withErrors("Réglement non accepté")->withInput();
    }
}
