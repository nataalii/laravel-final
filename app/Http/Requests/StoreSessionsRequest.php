<?php

namespace App\Http\Requests;

use App\Rules\ExistsInDatabase;
use App\Rules\HashedPassword;
use Illuminate\Foundation\Http\FormRequest;

class StoreSessionsRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email'              => ['required', 'min:3', 'email'],
			'password'           => ['required'],
		];
	}
}
