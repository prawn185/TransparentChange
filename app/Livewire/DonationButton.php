<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Donation;

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

        auth()->user()->donations()->create([
            'amount' => $this->amount,
            'status' => 'pending',
            'is_recurring' => $this->isRecurring,
            'frequency' => $this->isRecurring ? $this->frequency : null,
            'next_donation_date' => $this->isRecurring ? $this->calculateNextDonationDate() : null,
        ]);

        $this->closeModal();
        session()->flash('message', 'Donation successful!');
    }

    private function calculateNextDonationDate()
    {
        return $this->frequency === 'weekly' ? now()->addWeek() : now()->addMonth();
    }
}