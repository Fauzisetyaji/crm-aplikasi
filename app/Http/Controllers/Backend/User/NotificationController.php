<?php

namespace App\Http\Controllers\Backend\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use App\Models\Booking;

class NotificationController extends Controller
{
	/**
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * The Booking instance.
     *
     * @var \App\Models\Booking
     */
    protected $booking;

    /**
     * Create a new controller instance.
     */
    public function __construct(Booking $booking)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');
        $this->booking = $booking;
    }

    /**
     * Please describe process of this method.
     *
     * @param param type $param
     * @return data type
     */
    public function get(Request $request, DatabaseNotification $notification)
    {
    	$notification->markAsRead();

    	if($request->user()->unreadNotifications->isEmpty()) {
        	return redirect()->route('my-booking.index');
    	}

    	return back();
    }
}