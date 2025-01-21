<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\User;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ApiResponse;

    public function returnAllUsers()
    {
        $users =  User::all();
        return $this->responseSuccess('Users Found !!', $users);
    }
}
