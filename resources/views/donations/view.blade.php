<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Donation Information</h3>
                    <p><strong>Amount:</strong> ${{ number_format($donation->amount, 2) }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($donation->status) }}</p>
                    <p><strong>Date:</strong> {{ $donation->created_at->format('F j, Y') }}</p>
                    <p><strong>Recurring:</strong> {{ $donation->is_recurring ? 'Yes' : 'No' }}</p>
                    @if($donation->is_recurring)
                        <p><strong>Frequency:</strong> {{ ucfirst($donation->frequency) }}</p>
                        <p><strong>Next Donation Date:</strong> {{ $donation->next_donation_date->format('F j, Y') }}</p>
                    @endif
                </div>

                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Donation Allocation</h3>
                    <div class="w-full h-64">
                        <canvas id="donationPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('donationPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Community Projects', 'Education', 'Healthcare', 'Environmental Initiatives'],
                    datasets: [{
                        data: [30, 25, 25, 20], // These percentages should be dynamically calculated based on actual allocation
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Donation Allocation'
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
