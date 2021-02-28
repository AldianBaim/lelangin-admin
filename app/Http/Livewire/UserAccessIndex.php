<?php

namespace App\Http\Livewire;

use App\Models\Officer;
use Livewire\Component;
use Alert;

class UserAccessIndex extends Component
{
    // public $officers;

    // public function mount($officers)
    // {
    //     $this->officers = $officers;
    // }
    public function render()
    {
        return view('livewire.user-access-index', [
            'officers' => Officer::paginate(5)
        ]);
    }

    public function changeAccess($id)
    {
        Officer::where('id', $id)->update(['role_id' => 1]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Petugas telah menjadi admin',
            'timer' => 5000,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
    }
}
