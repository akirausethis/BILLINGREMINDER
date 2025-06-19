<x-layout>
    @section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Reminder List</h2>
        <p class="mb-6 text-lg text-gray-600">This is your Reminder List, make sure to Pay them!</p>
        
        <!-- Search Bar -->
        <div class="mb-6 flex items-center">
            <form action="{{ route('reminders.index') }}" method="GET" class="flex w-full">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request()->search }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                />
                <button 
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600">
                    Search
                </button>
            </form>
        </div>

        @if($reminders->isEmpty())
            <div class="flex flex-col items-center justify-center bg-gray-100 p-6 rounded shadow">
                <p class="text-lg text-gray-600 mb-4">There is no reminder made yet! Make a new one!</p>
                <button onclick="window.location.href='/reminders/create'" 
                        class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    + New Reminder
                </button>
            </div>
        @else
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg shadow-lg">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-left">No</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Reminder Name</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Description</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Type</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Amount</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Due Date</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Frequency</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Category</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Payment Method</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reminders as $index => $reminder)
                            <tr class="border-t hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_name }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_desc }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->type->typ ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($reminder->reminder_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->start_date }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->frequency->freq ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->category->cat ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $reminder->paymentMethod->paymeth ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    <a href="{{ route('reminders.edit', $reminder->id) }}" 
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                       Edit
                                    </a>
                                    <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
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
