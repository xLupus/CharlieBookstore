<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
//use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterRequest;
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
    public function store(RegisterRequest $request)
    {
       $request->validated();
       $request->old('nome');
       $request->old('email');
       $request->old('cpf');

        $user = User::create([
            'USUARIO_NOME'  => $request->nome,
            'USUARIO_EMAIL' => $request->email,
            'USUARIO_SENHA' => Hash::make($request->senha),
            'USUARIO_CPF'   => $request->cpf,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));
    }
}
