<div>
    <div class="p-5 mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="save">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
                                    <div
                                        class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            @if($picturePath)
                                                <img src="{{ $picturePath->temporaryUrl() }}" class="object-cover w-12 h-12 mx-auto">
                                            @elseif(isset($food->picture_path))
                                                <img src="{{ $food->picture_path }}" class="object-cover w-12 h-12 mx-auto">
                                            @else
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            @endif
                                            <div class="flex justify-center text-sm text-center text-gray-600">
                                                <label for="profile-photo-patch"
                                                    class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input wire:model="picturePath" id="profile-photo-patch" name="profile-photo-patch" type="file"
                                                        class="sr-only">
                                                </label>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input wire:model="name" type="text" name="name" id="name" autocomplete="given-name"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('name') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea wire:model="description" name="description" id="description"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        @error('description') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                                    <input wire:model="ingredients" type="text" name="ingredients" id="ingredients" autocomplete="ingredients"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <p class="text-xs italic text-gray-700">Dipisahkan dengan koma, contoh: Bawang Merah, Bawang Putih, Paprika, Garam, dll</p>
                                        @error('ingredients') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <input wire:model="price" type="number" name="price" id="price" autocomplete="price"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('price') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="rate" class="block text-sm font-medium text-gray-700">Rate</label>
                                    <input wire:model="rate" type="number" name="rate" id="rate" autocomplete="rate" step="0.01" max="5"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('rate') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>


                                <div class="col-span-6 sm:col-span-6">
                                    <label for="types" class="block text-sm font-medium text-gray-700">Food Types</label>
                                    <select wire:model="types" id="types" name="types" autocomplete="types"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="new">New</option>
                                        <option value="recommended">Recommended</option>
                                        <option value="popular">Popular</option>
                                    </select>
                                    @error('types') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
