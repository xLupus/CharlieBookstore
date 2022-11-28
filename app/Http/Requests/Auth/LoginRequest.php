<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => ['required', 'string', 'email:rfc,dns'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        /*
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        */
        //dd($this->only('email', 'password')); //imprima array c/ email e senha
        $user = User::where([ //filtra usuario e guarda na var
            'USUARIO_EMAIL' => $this->only('email')['email'] //only retorna o array, e somente o dado daquele EMAIL
        ])->first(); //filtra aonde encotnrar usuario email aonde encontrar o campo email (filtra o usuári que tiver o EMAIL) e retorna o primeiro valor ENCONTRADO

        if (!$user) { //se não existir
            throw ValidationException::withMessages([
                'invalid' => trans('Email ou senha incorretos'),
            ]);
        }

        //seta dupla => acessa propriedade , -> acessa valor
        //(verifica que são iguais)
        if (Hash::check($this->only('password')['password'], $user->USUARIO_SENHA)) { //passa a senha atual ( o que o usuario está digitando) (verifica se a hash corresponde a do banco) (verifica se pertence ao mesmo numero)
            Auth::login($user); //se a senha estiver correta !

            return redirect(route('home')); //retorna para a index
        } else {
            throw ValidationException::withMessages([
                'invalid' => trans('Email ou senha incorretos'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'    => 'Preencha este campo',
            'email.email'       => 'Formato de e-mail inválido',
            'password.required' => 'Preencha este campo'
        ];
    }
}
