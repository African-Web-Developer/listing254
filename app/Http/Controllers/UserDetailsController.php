<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\item;

class UserDetailsController extends Controller
{
    public function show($username) {
    	$user = User::whereUsername($username)->first();
    	$items = item::where('owner_id', '=', $user->id)->get();
    	return view('users.profile', compact('user', 'items'));
    }
}
