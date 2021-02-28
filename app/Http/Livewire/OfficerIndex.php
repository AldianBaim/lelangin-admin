<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OfficerIndex extends Component
{
    public $officers;

    public function mount($officers)
    {
        $this->officers = $officers;
    }

    public function render()
    {

        return view('livewire.officer-index');
    }
}
