<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserRes;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct()
    {
    }
    public function show(int $id)
    {

        try {
            $user = User::findOrFail($id);
            //dd($user);
            //return UserRes::collection($user);
            return new UserRes($user);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Usuario no encontrado!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function destroy(int $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(["message" => "Usuario eliminado correctamente !!"]);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Usuario no encontrado!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function create(Request $request)
    {
        try {
            $user = new User();
            $user->role = $request->role;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->created_at = now();
            $user->save();

            return response()->json(['message' => 'El usuario se registró con éxito!!'], 200);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
}
