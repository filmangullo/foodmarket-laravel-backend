<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {!! __('Transaction &raquo; View') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-transparent shadow-xl sm:rounded-lg">
                @livewire('transactions.detail-content', ['transaction' => $transaction])
            </div>
        </div>
    </div>
</x-app-layout>
