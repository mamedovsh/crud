<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthorizesRequests;

class UsersController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('view-any', User::class);
        $users = User::all(); 
        return response()->json($users); 
    }
}
