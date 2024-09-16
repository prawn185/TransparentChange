<?php

namespace App\Jobs;

use App\Models\Donation;
use App\Http\Controllers\PennyTrackerController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPennyAllocation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function handle(PennyTrackerController $controller)
    {
        $controller->assignUniqueIds($this->donation);
    }
}