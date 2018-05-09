<?php

namespace flashcards\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use flashcards\Subcategory;
use Illuminate\Support\Facades\Storage;

class SubcategoryDeletingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Subcategory $subcategory)
    {
        foreach ($subcategory->decks as $deck) {
            $deck->delete();
        }

        
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
