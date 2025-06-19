<x-layout>
    @section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Your Payment</h1>
        <p class="mb-6 text-lg text-gray-600">Don't forget to Check your Bills!</p>

        <!-- Search Bar -->
        <div class="mb-6">
            <form action="{{ route('payment.index') }}" method="GET" class="flex w-full">
                <input type="text" name="search"
                       class="w-full p-2 border border-gray-300 rounded-l-md focus:ring-2 focus:ring-blue-500" value="{{ request()->search }}">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">
                    Search
                </button>
            </form>
        </div>

        @if($reminders->isEmpty())
            <div class="flex flex-col items-center justify-center bg-gray-100 p-6 rounded shadow">
                <p class="text-lg text-gray-600 mb-4">No bills found.</p>
            </div>
        @else
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg shadow-lg">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-left">No</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Reminder Name</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Amount Due</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Status</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Description</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reminders as $index => $reminder)
                            <tr class="border-t hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_name }}</td>
                                <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($reminder->reminder_amount, 2) }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ ucfirst($reminder->status) }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_desc }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    @if($reminder->reminder_amount > 0)
                                        <form action="{{ route('payment.pay', $reminder->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <div class="mb-2">
                                                <label for="payment_amount" class="block text-sm font-medium">Amount</label>
                                                <input type="number" name="payment_amount" id="payment_amount" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" placeholder="Enter payment amount" required min="0" max="{{ $reminder->reminder_amount }}">
                                            </div>
                                            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                Pay Now
                                            </button>
                                        </form>
                                    @else
                                        <p class="text-green-500"><strong>Paid</strong></p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    @endsection
</x-layout>
