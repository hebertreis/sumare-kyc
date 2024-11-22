<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Receivers extends Component
{

    public $header = 'Receivers';

    public function mount()
    {
        
    }
    

       
    public function render()
    {
        return view('livewire.receivers')->layout('layouts.app');
    }
}
