<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Pembeli;
use App\Providers\RouteServiceProvider;
use App\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user= User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $pembeli = Pembeli::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'telepon' => $data['telephone'],
            'user_id' => $user->id,
        ]);

        return redirect('login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        // Iki lek mau regis ws tak kasih def e monggo diganti" seng nde sini
        // pke function ini gara" auth e itu bakal ke function e secara default lek ad seng mau regis
        
        // Validate Data - monggo dipake nde sini ya isa dikasi validasi lek mw 
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Save data to session
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $pembeli= new Pembeli();
        $pembeli->name= $request->name;
        $pembeli->address= $request->address;
        $pembeli->telepon= $request->telephone;
        $pembeli->user_id= $user->id;
        $pembeli->save();

        if($user != null){
            return redirect('login')->with(session()->flash('alert-success', 'Your account has been created. Please login for verification link.'));
        }

        return redirect('login')->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
}
