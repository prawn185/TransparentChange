<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Donation History</h2>
    @if($donations->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">View</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($donations as $donation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $donation->amount }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $donation->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $donation->created_at->format('F j, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('donation.view', ['id' => $donation->id]) }}" class="text-blue-600 hover:text-blue-800 transition duration-150 ease-in-out">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">No donations found.</p>
    @endif
</div>