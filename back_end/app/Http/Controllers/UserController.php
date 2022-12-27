<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\CreateCategoriesDefault;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(UserPostRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            app(CreateCategoriesDefault::class)->run($user->id);

            return response()->json($user, 201);
        } catch (\Exception $error) {
            return response()->json($error, 400);
        }
    }
}
