<?php

namespace App\Listeners;

use Mail;
use App\Events\ProductEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductEvent  $event
     * @return void
     */
    public function handle(ProductEvent $event)
    {
        Mail::raw('plain text message', function ($message) {
            $message->from(env('MAIL_HOST'));
            $message->sender(env('MAIL_HOST'));
            $message->to(env('MAIL_CLIENT'));
            $message->subject('Product affected');
        });
    }
}
