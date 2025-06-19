<x-layout>
 @section('content')
 <div class="container mx-auto px-4">
     <h2 class="text-2xl font-bold mb-6 text-gray-800">Transaction History</h2>
     <p class="mb-6 text-lg text-gray-600">Here are all your completed transactions.</p>
     
     <!-- Search Bar -->
     <div class="mb-6 flex items-center">
         <form action="{{ route('history.index') }}" method="GET" class="flex w-full">
             <input type="text" name="search" value="{{ request()->search }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
             <button type="submit" 
                     class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600">
                 Search
             </button>
         </form>
     </div>

     @if($reminders->isEmpty())
     <div class="flex flex-col items-center justify-center bg-gray-100 p-6 rounded shadow">
         <p class="text-lg text-gray-600 mb-4">No completed transactions found!</p>
     </div>
 @else
     <div class="bg-white shadow rounded-lg overflow-hidden">
         <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg shadow-lg">
             <thead class="bg-gray-900 text-white">
                 <tr>
                     <th class="px-4 py-2 border border-gray-300 text-left">No</th>
                     <th class="px-4 py-2 border border-gray-300 text-left">Transaction Name</th>
                     <th class="px-4 py-2 border border-gray-300 text-left">Description</th>
                     <th class="px-4 py-2 border border-gray-300 text-left">Date</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($reminders as $index => $reminder)
                     <tr class="border-t hover:bg-gray-100">
                         <td class="px-4 py-2 border border-gray-300">{{ $index + 1 }}</td>
                         <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_name }}</td>
                         <td class="px-4 py-2 border border-gray-300">{{ $reminder->reminder_desc }}</td>
                         <td class="px-4 py-2 border border-gray-300">{{ $reminder->start_date }}</td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 @endif
 
 </div>
 @endsection
</x-layout>
