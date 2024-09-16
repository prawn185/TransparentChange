<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DonationHistory extends Component
{
    use WithPagination;

    public $donations;
    public $perPage = 10;

    public function mount()
    {
        $this->loadDonations();
    }

    public function render()
    {
        return view('livewire.donation-history', [
            'paginatedDonations' => $this->donations
        ]);
    }

    public function loadDonations()
    {
        $this->donations = auth()->user()->donations;
    }

    public function donations()
    {
        return auth()->user()->donations;
    }

}
