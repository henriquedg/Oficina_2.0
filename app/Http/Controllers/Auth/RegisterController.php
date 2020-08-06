<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'id' => ['required', 'string', 'max:8', 'unique:users'],
            'cliente' => ['required', 'string', 'max:255'],
            'data' => ['required', 'string'],
            'hora' => ['required', 'string'],
            'vendedor' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string', 'max:255'],
            'valor' => 'numeric',
            
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            /*'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),*/

            'id' => $data['id'],
            'cliente' => $data['cliente'],
            'data' => $data['data'],
            'hora' => $data['hora'],
            'vendedor' => $data['vendedor'],
            'descricao' => $data['descricao'],
            'valor' => $data['valor'],
        ]);
    }
}
