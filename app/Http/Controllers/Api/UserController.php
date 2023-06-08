<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserCollection::collection(User::all());
    }

    public function show(int $id)
    {
        return new UserResource(User::query()->find($id));
    }

}
