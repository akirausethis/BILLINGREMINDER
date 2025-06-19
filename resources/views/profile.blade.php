<x-layout>
 @section('title', 'Profile')

 @section('content')
     <div class="min-h-screen bg-gradient-to-r from-blue-50 to-indigo-100 flex items-center justify-center">
         <div class="bg-white p-8 rounded-lg shadow-xl transition-all duration-300 w-full max-w-none mx-auto">
             <div class="flex flex-col items-start mb-6">
                 <h2 class="text-4xl font-bold text-gray-800">
                     <p class="mb-2">Hello There,</p>
                     <span class="bg-black text-white px-2 py-1 rounded-md">{{ $user->name }}</span>
                 </h2>
             </div>
             
             <div class="mb-5 space-y-4">
                 <p class="text-md text-gray-600">
                     <span class="font-semibold">Email:</span> {{ $user->email }}
                 </p>
                 <p class="text-md text-gray-600">
                     <span class="font-semibold">Phone:</span> 
                     @if ($user->phonenumber)
                         <span class="rounded-md">{{ $user->phonenumber }}</span>
                     @else
                         <span class="italic text-gray-500">No phone number added</span>
                     @endif
                 </p>
             </div>

             <div class="border-t pt-6">
                 <h3 class="text-3xl font-semibold text-gray-800 mb-6">Account Settings</h3>

                 <form action="{{ route('profile.update', $user->id) }}" method="POST" class="space-y-6">
                     @csrf
                     @method('PUT')

                     <!-- Update Name -->
                     <div>
                         <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                         <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                             class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 hover:shadow-lg focus:shadow-lg">
                     </div>

                     <!-- Update Email -->
                     <div>
                         <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                         <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                             class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 hover:shadow-lg focus:shadow-lg">
                     </div>

                     <!-- Update Phone Number -->
                     <div>
                         <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                         <input type="tel" id="phone" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}"
                             pattern="^\+62\d{9,12}$" placeholder="e.g. +62xxxxxxxxxx"
                             class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 hover:shadow-lg focus:shadow-lg">
                         <small class="text-gray-500 mt-1 block">Please enter a valid Indonesian phone number (e.g. +62xxxxxxxxxx).</small>
                     </div>

                     <button type="submit" class="w-full px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300 transform focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                         Update Profile
                     </button>
                 </form>
             </div>

             <!-- Back Button at Bottom Left -->
             <div class="mt-8 flex justify-start">
                 <button onclick="history.back()" class="flex items-center px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition duration-300">
                     <i class="fas fa-arrow-left mr-2"></i> Back
                 </button>
             </div>
         </div>
     </div>
 @endsection

</x-layout>
