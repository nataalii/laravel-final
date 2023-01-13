<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(StoreUserRequest $request)
	{
		$validated = $request->validated();

		$user = User::create($validated);
		event(new Registered($user));
		$user->save();
		session()->regenerate();
		Auth::login($user);

		return redirect(route('home'));
	}
}
