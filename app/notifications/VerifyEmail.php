<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    // Content email verification
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::get('Vérification adresse email'))
            ->line(Lang::get('Cliquez sur le bouton ci-dessous pour vérifier votre e-mail.'))
            ->action(
                Lang::get('Vérification adresse email'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Si vous ne posséder pas de compte, vous devez en créer un.'));
    }
}
