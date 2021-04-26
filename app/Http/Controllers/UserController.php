<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function searchUser(Request $request)
    {
        $search = $request->input('search');

        if (strlen($search) > 0) 
        {
            $users = User::search($search)->get()->values();
            return response()->json($users, 200);
        }
        return response(401);
    }

}
