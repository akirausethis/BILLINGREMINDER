<x-layout>
    @section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
        <p class="mb-6">Silakan perbarui informasi profil Anda di sini.</p>

        <!-- Upload Profile Picture -->
        <div class="flex justify-center mb-6">
            <div class="w-32 h-32 rounded-full border border-gray-300 flex items-center justify-center bg-white shadow">
                <label for="profile-picture" class="cursor-pointer flex items-center justify-center w-full h-full">
                    <i class="fa-solid fa-camera text-gray-500 text-xl"></i>
                </label>
                <input type="file" id="profile-picture" class="hidden" />
            </div>
        </div>

        <!-- Form Edit Profile -->
        <div class="bg-white shadow p-6 rounded">
            <form action="/home/updatedprofile" method="POST" class="space-y-4">
                @csrf
                @method('POST')

                <!-- Full Name -->
                <div>
                    <label for="full-name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                    <input type="text" id="full-name" name="full_name" value="John Doe"
                        class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username" value="johndoe123"
                        class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone-number" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input type="text" id="phone-number" name="phone_number" value="+62 812 3456 7890"
                        class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                    <textarea id="address" name="address" rows="3"
                        class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">123 Main Street, Jakarta</textarea>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="johndoe@example.com"
                        class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Save Changes</button>
                    <a href="/home" 
                        class="ml-4 px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-layout>
