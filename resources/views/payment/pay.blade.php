
<>

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Payment Status</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="border-b pb-4 mb-4">
                <h2 class="text-2xl font-semibold">Reminder: {{ $reminder->reminder_name }}</h2>
            </div>
            <p><strong>Amount Paid:</strong> ${{ number_format($paymentAmount, 2) }}</p>
            <p><strong>Remaining Amount:</strong> ${{ number_format($reminder->reminder_amount, 2) }}</p>

            @if($reminder->status == 'completed')
                <p class="text-green-500 mt-3"><strong>Payment Completed! Your bill is fully paid.</strong></p>
            @else
                <p class="text-yellow-500 mt-3"><strong>Partial Payment Made. The remaining balance is ${{ number_format($reminder->reminder_amount, 2) }}.</strong></p>
            @endif

            <a href="{{ route('payment.show') }}" class="mt-6 inline-block text-blue-600 hover:text-blue-700">Back to Reminders</a>
        </div>
    </div>
@endsection
</x-layout>