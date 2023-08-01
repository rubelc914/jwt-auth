<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $apiResponseService;
    /**
     *  Create a new AuthController instance
     *
     * @return void
     */
    public function __construct(ApiResponseService $apiResponseService)
    {
        $this->middleware('auth:api',['except'=>['login','register']]);
        $this->apiResponseService = $apiResponseService;
    }
    /**
     * Register a user.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function register(RegistrationRequest $request)
    {
        try {
            $user = User::create(array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            ));
            return $this->apiResponseService->success($user, 'Successfully registered', 201);
        } catch (\Throwable $th) {
            return $this->apiResponseService->error('Failed to register. Please try again later.', 500);
        }

    }


        /**
     * Get a JWT via given credentials.
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if(!$token = Auth()->attempt($request->validated())){
            return $this->apiResponseService->error('Unauthorized', 401);
        }
        // return $this->createNewToken($token);
        return $this->apiResponseService->success($this->createNewToken($token));
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewToken($token){
        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL()*60,
            'user'          => auth()->user()
        ]);
    }

    public function profile(){
        return $this->apiResponseService->success(auth()->user());
    }

    public function logout(){
        auth()->logout();
        return $this->apiResponseService->success('User successfully logout');
    }

}


