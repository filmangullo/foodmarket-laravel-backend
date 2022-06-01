<div>

<div class="bg-white">
    <main class="my-6">
        <div class="container px-6 pt-6 mx-auto">
            <div class="flex items-center justify-end w-full">
                <button onclick="history.back()" class="mx-4 text-gray-600 focus:outline-none sm:mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                </button>
            </div>
            <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                    <img class="object-cover w-full h-full max-w-lg mx-auto rounded-md" src="{{ $transaction->food->picture_path }}" alt="{{ $transaction->food->name }}">
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-lg text-gray-700 uppercase">{{ $transaction->food->name }}</h3>
                    <span class="mt-3 text-gray-500">Rp {{ number_format($transaction->total) }}</span>
                    <hr class="my-3">
                    <div class="flex justify-between mt-2 text-sm text-gray-700">
                        <label>Quantity : <span class="font-bold">{{ $transaction->quantity }}</span></label>
                        <label>Status : <span class="font-bold">{{ $transaction->status }}</span></label>
                    </div>
                    <hr class="my-3">
                    <div class="mt-2 text-sm text-gray-700 ">
                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>: {{ $transaction->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: {{ $transaction->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>: {{ $transaction->user->phone_num }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>: {{ $transaction->user->address }}</td>
                                </tr>
                                <tr>
                                    <td>House Number</td>
                                    <td>: {{ $transaction->user->house_num }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>: {{ $transaction->user->city }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="my-3">
                    <div class="mt-2 text-sm text-gray-700">
                        <p>Payment Url : <span class="font-semibold">{{ $transaction->payment_url }}</span></p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('transactions.status', ['id' => $transaction->id, 'status' => 'ON_DELIVERY']) }}"
                            class="px-8 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            On Delivery
                        </a>
                        <a href="{{ route('transactions.status', ['id' => $transaction->id, 'status' => 'DELIVERED']) }}"
                            class="px-8 py-2 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-500 focus:outline-none focus:bg-green-500">
                            Delivered
                        </a>
                        <a href="{{ route('transactions.status', ['id' => $transaction->id, 'status' => 'CANCELLED']) }}"
                            class="px-8 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-500 focus:outline-none focus:bg-red-500">
                            Cancelled
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
</div>
