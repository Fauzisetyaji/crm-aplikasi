<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use App\Models\Booking;
use Carbon\Carbon;

class BookingConfirmations extends Notification
{
    /**
     * The Booking Instance.
     *
     * @var App\Models\Booking
     */
    public $booking;

    /**
     * User id property.
     *
     * @var integer
     */
    public $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking, $user_id)
    {
        $this->booking = $booking;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->booking->id,
            'booking_number' => $this->booking->booking_number,
            'jenis_pelayanan' => $this->booking->jenis_pelayanan,
            'status' => $this->booking->status,
            'cancellation' => $this->booking->cancellation,
            'user_id' => $this->user_id,
        ];
    }
}
