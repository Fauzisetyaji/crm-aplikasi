<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebAuthController extends Controller
{
	/**
	 * Verify Account
	 *
	 * @param Request $request
	 * @return view
	 */
	public function verify(Request $request)
	{
		$user = User::find($request->id);
		
		$user->update([
			'verified' => true
		]);

		return redirect('/login');
	}
}
