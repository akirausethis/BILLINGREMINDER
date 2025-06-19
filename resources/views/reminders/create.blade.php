<x-layout>
    @section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Add New Reminder</h2>
        <p class="mb-6">Please fill the form below to make a new reminder.</p>

        <form action="{{ route('reminders.store', ['userId' => auth()->guard('web')->user()->id]) }}" method="POST" class="bg-white shadow rounded p-6">
            @csrf

            <input type="hidden" name="user_id" value="{{ $userId }}"> 
            <!-- Nama Pengingat -->
            <div class="mb-4">
                <label for="reminder_name" class="block text-gray-700 text-sm font-bold mb-2">Reminder Name</label>
                <input type="text" name="reminder_name" id="reminder_name" value="{{ old('reminder_name') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_name') border-red-500 @enderror">
                @error('reminder_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="reminder_desc" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="reminder_desc" id="reminder_desc" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_desc') border-red-500 @enderror">{{ old('reminder_desc') }}
                </textarea>
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
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
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
                <input type="number" name="reminder_amount" id="reminder_amount" value="{{ old('reminder_amount') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('reminder_amount') border-red-500 @enderror">
                @error('reminder_amount')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
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
                        <option value="{{ $frequency->id }}" {{ old('frequency_id') == $frequency->id ? 'selected' : '' }}>
                            {{ $frequency->freq }}
                        </option>
                    @endforeach
                </select>
                @error('frequency_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select name="category_id" id="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-700">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->cat }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Method -->
            <div class="mb-4">
                <label for="payment_method_id" class="block text-gray-700 text-sm font-bold mb-2">Payment Method</label>
                <select name="payment_method_id" id="payment_method_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-700">
                    <option value="">Pilih Metode Pembayaran</option>
                    @foreach ($payment_methods as $payment_method)
                        <option value="{{ $payment_method->id }}" {{ old('payment_method_id') == $payment_method->id ? 'selected' : '' }}>
                            {{ $payment_method->paymeth }}
                        </option>
                    @endforeach
                </select>
                @error('payment_method_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>

        <a href="{{ route('reminders.index') }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Reminder List</a>
    </div>
    @endsection
</x-layout>
