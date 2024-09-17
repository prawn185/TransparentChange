<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = auth()->user()->donations;
        return response()->json($donations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $donation = Donation::create($request->all());
        return $donation;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'is_recurring' => 'boolean',
            'frequency' => 'required_if:is_recurring,true|in:weekly,monthly',
        ]);

        $donation->update([
            'is_recurring' => $validated['is_recurring'] ?? $donation->is_recurring,
            'frequency' => $validated['frequency'] ?? $donation->frequency,
            'next_donation_date' => $validated['is_recurring'] ? $this->calculateNextDonationDate($validated['frequency']) : null,
        ]);

        return response()->json($donation);
    }

    private function calculateNextDonationDate($frequency)
    {
        return $frequency === 'weekly' ? now()->addWeek() : now()->addMonth();
    }

    public function view($id)
    {
        $donation = Donation::find($id);
        return view('donations.view', compact('donation'));
    }
}
