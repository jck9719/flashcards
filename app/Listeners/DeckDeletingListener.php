<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Deck;

class DeckDeletingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Deck $deck)
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
