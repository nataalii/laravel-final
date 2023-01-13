<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
public function store(StoreSessionsRequest $request)
	{
		if (Auth::attempt($request->validated()))
		{
			session()->regenerate();
			return redirect()->route('home');
		}

		return back()->withErrors(['email' => 'incorrect credentials','password' =>'incorrect credentials']);

	}

	public function destroy()
	{
		auth()->logout();
		return redirect()->route('login');
	}
}
