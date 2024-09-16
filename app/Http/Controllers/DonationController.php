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
        $donations = auth()->user()->donations()->latest()->paginate(15);
        return response()->json($donations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'is_recurring' => 'boolean',
            'frequency' => 'required_if:is_recurring,true|in:weekly,monthly',
        ]);

        $donation = auth()->user()->donations()->create([
            'amount' => $validated['amount'],
            'status' => 'pending',
            'is_recurring' => $validated['is_recurring'] ?? false,
            'frequency' => $validated['frequency'] ?? null,
            'next_donation_date' => $validated['is_recurring'] ? $this->calculateNextDonationDate($validated['frequency']) : null,
        ]);

        ProcessPennyAllocation::dispatch($donation);

        return response()->json($donation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
