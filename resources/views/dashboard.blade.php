<x-layout>
    @section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-3xl font-bold mb-6">Dashboard</h2>
        <p class="mb-6 text-lg text-gray-600">Welcome to the Billing Reminder application!</p>

        <!-- Frequency Dropdown -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <label for="frequency" class="block text-gray-700 font-bold mb-2">Select Frequency:</label>
            <select name="frequency" id="frequency" class="border rounded-lg py-2 px-4">
                <option value="Daily" {{ $selectedFrequency == 'Daily' ? 'selected' : '' }}>Daily</option>
                <option value="Weekly" {{ $selectedFrequency == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                <option value="Monthly" {{ $selectedFrequency == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Yearly" {{ $selectedFrequency == 'Yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-2">Filter</button>
        </form>

        <!-- Summary -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
            <!-- Unpaid Bills -->
            <div class="bg-white shadow-lg p-6 rounded-lg flex justify-between items-center w-full">
                <div>
                    <h5 class="text-gray-700 font-semibold">
                        {{ $selectedFrequency === 'Daily' ? "Today's Unpaid Bills" : ucfirst($selectedFrequency) . "'s Unpaid Bills" }}
                    </h5>
                    <p class="text-4xl text-red-500 mt-2">Rp {{ number_format($unpaidTotal, 0, ',', '.') }}</p>
                </div>
                <div class="text-6xl text-red-500">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
            </div>

            <!-- Total Reminders -->
            <div class="bg-white shadow-lg p-6 rounded-lg flex justify-between items-center w-full">
                <div>
                    <h5 class="text-gray-700 font-semibold">
                        {{ $selectedFrequency === 'Daily' ? "Today's Total Reminders" : ucfirst($selectedFrequency) . "'s Total Reminders" }}
                    </h5>
                    <p class="text-4xl text-blue-500 mt-2">{{ $reminders->count() }}</p>
                </div>
                <div class="text-6xl text-blue-500">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
        </div>

        <!-- Due Bill List -->
        <div class="mt-8">
            <h4 class="text-2xl font-bold mb-4">Due Bill List</h4>
            <div class="overflow-hidden rounded-lg shadow-lg"> <!-- Tambahkan wrapper dengan rounded -->
                <table class="table-auto w-full bg-white shadow-md">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Bill Name</th>
                            <th class="px-4 py-3 text-left">Amount</th>
                            <th class="px-4 py-3 text-left">Due Date</th>
                            <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reminders as $index => $reminder)
                            <tr class="hover:bg-gray-100 transition duration-300">
                                <td class="border px-4 py-3 text-center">{{ $index + 1 }}</td>
                                <td class="border px-4 py-3">{{ $reminder->reminder_name }}</td>
                                <td class="border px-4 py-3">Rp {{ number_format($reminder->reminder_amount, 0, ',', '.') }}</td>
                                <td class="border px-4 py-3">{{ $reminder->start_date }}</td>
                                <td class="border px-4 py-3 text-center">
                                    <span class="{{ $reminder->status == 'completed' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                                        {{ ucfirst($reminder->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        @if($reminders->isEmpty())
                            <tr>
                                <td colspan="5" class="border px-4 py-3 text-center text-gray-600">No reminders found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
    @endsection
</x-layout>
