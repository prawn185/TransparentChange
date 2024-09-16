<?php

namespace App\Http\Controllers;

use App\Models\PennyTracker;
use App\Models\Donation;
use App\Services\UniqueIdentifierGenerator;
use Illuminate\Http\Request;

class PennyTrackerController extends Controller
{
    public function assignUniqueIds(Donation $donation)
    {
        $amount = $donation->amount * 100; // Convert to pennies
        $pennyTrackers = [];

        for ($i = 0; $i < $amount; $i++) {
            $pennyTrackers[] = [
                'unique_identifier' => UniqueIdentifierGenerator::generate(),
                'donation_id' => $donation->id,
                'charity_id' => $donation->charity_id,
                'amount' => 0.01,
                'status' => 'allocated',
            ];
        }

        PennyTracker::insert($pennyTrackers);

        return response()->json(['message' => 'Unique IDs assigned successfully']);
    }
}