<?php

namespace App\Http\Controllers;

use App\Service\UserService;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api', ['except' => ['unauthorized']]);
        $this->guard = 'api';
        $this->userService = $userService;
    }
    public function unauthorized()
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function show(int $id)
    {

        if (request()->ajax()) {
            if (request()->isMethod("GET")) {
                return $this->userService->show($id);
            }
        }
        abort(401);
    }
    public function destroy(int $id)
    {
        if (request()->ajax()) {
            if (request()->isMethod("DELETE")) {
                return $this->userService->destroy($id);
            }
        }
        abort(401);
    }
}
