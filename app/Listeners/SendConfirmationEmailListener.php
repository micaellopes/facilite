<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendConfirmationEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $message = sprintf('Olá, $s! Sua conta foi criada com sucesso.', $event->user->name);
        $this->mailer->raw($message, function($m) use ($event) {
            $m->from('negociosfacilite@gmail.com', 'Facilite Negócios');
            $m->to($event->user->email, $event->user->name);
        });
    }
}
