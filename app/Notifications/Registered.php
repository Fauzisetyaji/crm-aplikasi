<?php

namespace App\Notifications;

use URL;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Registered extends Notification implements ShouldQueue
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
        $link = URL::to('verify-account?' . http_build_query([
            'id' => $this->user->id,
            'token' => $notifiable->verification_token,
        ]));

        return (new MailMessage)
                    ->subject('Verifikasi Akun')
                    ->greeting('Hallo '.($notifiable->username ?: $notifiable->pelanggan->nm_pelanggan).',')
                    ->line(__('Silahkan Anda melakukan verifikasi akun yang telah anda daftarkan dengan meng klik tombol dibawah ini. ' . $this->user->username))
                    ->action(__('Verifikasi Akun'), $link)
                    ->line(__('Jika Anda tidak pernah melakukan registrasi ini, tidak ada tindakan lebih lanjut yang diperlukan.'));
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
