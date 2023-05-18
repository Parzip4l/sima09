<?php

namespace App\Observers;

use App\Berita;
use App\Log;

class BeritaObserver
{
    /**
     * Handle the Berita "created" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function created(Berita $berita)
    {
        Log::create([
            'id' => $berita->id,
            'user_id' => auth()->id(),
            'model' => 'berita',
            'action' => 'created',
            'new_value' => $berita->toJson(),
        ]);
    }

    /**
     * Handle the Berita "updated" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function updated(Berita $berita)
    {
        Log::create([
            'id' => $berita->id,
            'user_id' => auth()->id(),
            'model' => 'berita',
            'action' => 'updated',
            'old_value' => $berita->getOriginal(),
            'new_value' => $berita->toJson(),
        ]);
    }

    /**
     * Handle the Berita "deleted" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function deleted(Berita $berita)
    {
        Log::create([
            'id' => $berita->id,
            'user_id' => auth()->id(),
            'model' => 'berita',
            'action' => 'deleted',
            'old_value' => $berita->toJson(),
        ]);
    }

    /**
     * Handle the Berita "restored" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function restored(Berita $berita)
    {
        //
    }

    /**
     * Handle the Berita "force deleted" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function forceDeleted(Berita $berita)
    {
        //
    }
}
