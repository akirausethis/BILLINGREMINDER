<x-layout>
    @section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Reminder</h2>
        <p class="mb-6">Please fill the form below to update the reminder.</p>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reminders.update', $reminder) }}" method="POST" class="bg-white shadow rounded p-6">
            @csrf
            @method('PUT')

            <!-- Nama Pengingat -->
            <div class="mb-4">
                <label for="reminder_name" class="block text-gray-700 text-sm font-bold mb-2">Reminder Name</label>
                <input type="text" name="reminder_name" id="reminder_name" value="{{ old('reminder_name', $reminder->reminder_name) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_name') border-red-500 @enderror">
                @error('reminder_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="reminder_desc" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="reminder_desc" id="reminder_desc" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_desc') border-red-500 @enderror">{{ old('reminder_desc', $reminder->reminder_desc) }}</textarea>
                @error('reminder_desc')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe -->
            <div class="mb-4">
                <label for="type_id" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select name="type_id" id="type_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-700">
                    <option value="">Pilih Tipe</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $reminder->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->typ }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jumlah -->
            <div class="mb-4">
                <label for="reminder_amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                <input type="number" name="reminder_amount" id="reminder_amount" value="{{ old('reminder_amount', $reminder->reminder_amount) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_amount') border-red-500 @enderror">
                @error('reminder_amount')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $reminder->start_date) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Frekuensi -->
            <div class="mb-4">
                <label for="frequency_id" class="block text-gray-700 text-sm font-bold mb-2">Frequency</label>
                <select name="frequency_id" id="frequency_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-700">
                    <option value="">Pilih Frekuensi</option>
                    @foreach ($frequencies as $frequency)
                        <option value="{{ $frequency->id }}" {{ old('frequency_id', $reminder->frequency_id) == $frequency->id ? 'selected' : '' }}>
                            {{ $frequency->freq }}
                        </option>
                    @endforeach
                </select>
                @error('frequency_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Update Reminder
            </button>
        </form>
    </div>
    @endsection
</x-layout>
