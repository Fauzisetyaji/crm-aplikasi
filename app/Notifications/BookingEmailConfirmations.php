<?php

namespace App\Notifications;

use URL;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookingEmailConfirmations extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The user obeject.
     *
     * @var object
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = URL::to('/');
        
        return (new MailMessage)
                    ->subject('Notifications Booking')
                    ->greeting('Hallo '.($notifiable->pelanggan->nm_pelanggan).',')
                    ->line(__('Selamat Status booking anda "HEHEHEHE", Info lebih lanjut silahkan kujungi website.'))
                    ->action(__('Kunjungi Website'), $link)
                    ->line(__('Jika Anda tidak pernah melakukan registrasi atau transaksi ini, tidak ada tindakan lebih lanjut yang diperlukan.'));
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
            //
        ];
    }
}
