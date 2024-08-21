<x-guest-layout>
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Learn More About Transparent Change</h1>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Our Mission</h2>
            <p class="text-lg mb-4 text-gray-600">At Transparent Change, we're revolutionizing charitable giving through transparency and technology. We empower you to make a significant impact through micro-donations, while providing unprecedented visibility into how your contributions are used.</p>
            <p class="text-lg text-gray-600">We believe that every penny counts, and when combined with the power of community, small donations can lead to transformative change.</p>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">How It Works</h2>
            <ol class="list-decimal list-inside space-y-4 text-gray-600">
                <li class="text-lg"><span class="font-semibold">Daily Micro-Donations:</span> Choose a daily donation amount, starting from just 10p.</li>
                <li class="text-lg"><span class="font-semibold">Unique Penny Tracking:</span> Each penny receives a unique identifier, allowing you to track its journey.</li>
                <li class="text-lg"><span class="font-semibold">Choose Your Causes:</span> Select from a range of vetted causes that align with your values.</li>
                <li class="text-lg"><span class="font-semibold">Community Voting:</span> Participate in regular voting events to decide on funding priorities.</li>
                <li class="text-lg"><span class="font-semibold">Transparent Ledger:</span> Our technology ensures complete transparency and traceability of all transactions.</li>
                <li class="text-lg"><span class="font-semibold">Impact Tracking:</span> Receive updates showing how your donations are making a difference.</li>
            </ol>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Your Donation's Journey</h2>
            <p class="text-lg mb-4 text-gray-600">Here's how we track and distribute every penny you donate:</p>
            <div class="bg-gray-100 p-2 rounded-lg shadow-sm">
                <div class="mermaid">
                    graph LR
                    A["💰 Your Donation"] --> B["🔢 Unique IDs assigned to each penny"]
                    B --> C{"🗳️ Your Charity Choices"}
                    C --> D["Charity 1"]
                    C --> E["Charity 2"]
                    C --> F["Charity 3"]
                    D & E & F --> G["📊 Transparent Breakdown"]
                    G --> H["🏗️ % to Projects"]
                    G --> I["🖥️ % to Admin"]
                    H & I --> J["🔍 Track Impact"]
                    J --> K["👤 Your Dashboard"]

                    classDef default fill:#f9f9f9,stroke:#333,stroke-width:2px;
                    classDef highlight fill:#e6f3ff,stroke:#3182ce,stroke-width:2px;
                    classDef split fill:#fff3cd,stroke:#d69e2e,stroke-width:2px;
                    class A,B,C,K highlight;
                    class D,E,F split;
                    class G,H,I,J default;
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Why Choose Transparent Change?</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li class="text-lg">Unparalleled transparency in charitable giving</li>
                <li class="text-lg">Make a significant impact through small, daily donations</li>
                <li class="text-lg">Democratic decision-making through community voting</li>
                <li class="text-lg">Cutting-edge technology for tracking and secure transactions</li>
                <li class="text-lg">Regular updates on the impact of your contributions</li>
                <li class="text-lg">Support for a diverse range of carefully vetted causes</li>
            </ul>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Our Impact</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div>
                    <p class="text-3xl font-bold text-blue-600">£50,000+</p>
                    <p class="text-xl text-gray-600">Total Donations</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-blue-600">1,000+</p>
                    <p class="text-xl text-gray-600">Active Donors</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-blue-600">20+</p>
                    <p class="text-xl text-gray-600">Charities Supported</p>
                </div>
            </div>
        </section>

        <section class="text-center">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Ready to Make a Difference?</h2>
            <p class="text-lg mb-6 text-gray-600">Join Transparent Change today and start making a visible impact with your daily micro-donations. Every penny counts, and together, we can create meaningful change.</p>
            <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition duration-300">Start Your Giving Journey</a>
        </section>
    </div>

    @push('scripts')
        <script type="module">
            import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
            mermaid.initialize({
                startOnLoad: true,
                theme: 'neutral',
                flowchart: {
                    useMaxWidth: true,
                    htmlLabels: true,
                    curve: 'basis',
                },
                securityLevel: 'loose'
            });
        </script>
    @endpush
</x-guest-layout>
