<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Service\UserService;

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
    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api',['except'=>['unauthorized','create']]);
        $this->guard='api';
        $this->userService=$userService;
    }
    public function unauthorized(){
        return response()->json(['error'=>'Unauthorized'],401);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {

                $validator = Validator::make($request->all(), [
                    'role' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255','unique:users'],
                    'password' => ['required', 'string'],
                ]);
        
                if ($validator->fails()) {
                    return [
                        'created' => false,
                        'errors'  => $validator->errors()->all()
                    ];
                }

                return $this->userService->create($request);
            }
        }
        abort(401);
    }
}
