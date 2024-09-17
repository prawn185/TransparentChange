<?php

namespace App\Http\Controllers;

use App\Models\PennyTracker;
use App\Models\Donation;
use App\Services\UniqueIdentifierGenerator;
use Illuminate\Http\Request;

class PennyTrackerController extends Controller
{
    public function processDonation(Donation $donation)
    {
        $amount = $donation->amount * 100;
        $pennyTrackers = [];

        for ($i = 0; $i < $amount; $i++) {
            $pennyTrackers[] = [
                'unique_identifier' => UniqueIdentifierGenerator::generate(),
                'donation_id' => $donation->id,
                'charity_id' => 1,
                'amount' => 0.01,
                'status' => 'allocated',
            ];
        }

        PennyTracker::create($pennyTrackers);
    }
}