<?php

namespace App\Livewire;

use Livewire\Component;

class AllocatedView extends Component
{
    public function render()
    {

        $allocated = auth()->user()->donations()->where('status', 'allocated')->get();
        return view('livewire.allocated-view', compact('allocated'));
    }


}
