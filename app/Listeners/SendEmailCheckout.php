<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        /*
        echo 'Event fired';

        Mail::send('emails.reminder', array(), function($m){
            $m->from('yurickvinicius@gmail.com')
                ->to('yurickvinicius@gmail.com')
                ->subject('Ola');
        });
        */
    }
}
