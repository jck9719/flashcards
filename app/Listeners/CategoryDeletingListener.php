<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Category;
use Illuminate\Support\Facades\Storage;

class CategoryDeletingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($category)
    {
        foreach ($category->subcategories as $subcategory) {
            $subcategory->delete();
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
