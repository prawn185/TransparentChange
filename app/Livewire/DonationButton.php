<?php
namespace App\Livewire;

use App\Http\Controllers\DonationController;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\PennyTrackerController;

class DonationButton extends Component
{
    public $showModal = false;
    public $amount = '';
    public $isRecurring = false;
    public $frequency = 'monthly';

    protected $rules = [
        'amount' => 'required|numeric|min:0.01',
        'isRecurring' => 'boolean',
        'frequency' => 'required_if:isRecurring,true|in:weekly,monthly',
    ];

    public function render()
    {
        return view('livewire.donation-button');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['amount', 'isRecurring', 'frequency']);
    }

    public function makeDonation()
    {
        $this->validate();

        // Store the donation
        $donationController = new DonationController();
        $donation = $donationController->store(new Request([
            'amount' => $this->amount,
            'is_recurring' => $this->isRecurring,
            'frequency' => $this->frequency,
            'user_id' => auth()->user()->id,
            'status' => 'pending',
        ]));

        // Call PennyController
        $pennyTrackerController = new PennyTrackerController();
        $pennyTrackerController->processDonation($donation);

        $this->closeModal();
        session()->flash('message', 'Donation successful!');
    }
    
    private function calculateNextDonationDate()
    {
        $currentDate = now();
        $nextDonationDate = $currentDate->copy();

        if ($this->frequency === 'weekly') {
            $nextDonationDate->addWeek();
        } elseif ($this->frequency === 'monthly') {
            $nextDonationDate->addMonth();
        }

        return $nextDonationDate;
    }
}
