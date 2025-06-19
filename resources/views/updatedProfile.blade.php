<x-layout>
    @section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Profile</h2>
        <p class="mb-6">Informasi profil Anda yang sudah diperbarui ditampilkan di sini.</p>

        <!-- Upload Profile Picture -->
        <div class="flex justify-center mb-6">
            <div class="w-32 h-32 rounded-full border border-gray-300 flex items-center justify-center bg-white shadow">
                <img src="{{ asset('path/to/updated-profile-picture.jpg') }}" alt="Profile Picture"
                    class="w-32 h-32 rounded-full object-cover" />
            </div>
        </div>

        <!-- Profile Information -->
        <div class="bg-white shadow p-6 rounded">
            <div class="space-y-4">
                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Full Name</label>
                    <p class="w-full border border-gray-300 rounded p-3 bg-gray-100">{{ $full_name ?? 'John Doe' }}</p>
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Username</label>
                    <p class="w-full border border-gray-300 rounded p-3 bg-gray-100">{{ $username ?? 'johndoe123' }}</p>
                </div>

                <!-- Phone Number -->
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <p class="w-full border border-gray-300 rounded p-3 bg-gray-100">{{ $phone_number ?? '+62 812 3456 7890' }}</p>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Address</label>
                    <p class="w-full border border-gray-300 rounded p-3 bg-gray-100">{{ $address ?? '123 Main Street, Jakarta' }}</p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Email</label>
                    <p class="w-full border border-gray-300 rounded p-3 bg-gray-100">{{ $email ?? 'johndoe@example.com' }}</p>
                </div>
            </div>

            <!-- Edit Profile Button -->
            <div class="text-right mt-4">
                <a href="/home/editprofile"
                    class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Edit Profile</a>
            </div>
        </div>
    </div>
    @endsection
</x-layout>
