<?php

namespace App\Listeners;

use App\Events\tituloAtualizado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SolicitacaoAtualizarTitulo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(tituloAtualizado $event): void
    {
        //
    }
}
