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
                                            @if($profilePhotoPath)
                                                <img src="{{ $profilePhotoPath->temporaryUrl() }}" class="object-cover w-12 h-12 mx-auto">
                                            @elseif(isset($user->profile_photo_path))
                                                <img src="{{ asset('storage/'.$user->profile_photo_path) }}" class="object-cover w-12 h-12 mx-auto">
                                            @else
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            @endif
                                            <div class="flex text-sm text-gray-600">
                                                <label for="profile-photo-patch"
                                                    class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input wire:model="profilePhotoPath" id="profile-photo-patch" name="profile-photo-patch" type="file"
                                                        class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
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

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input wire:model="phoneNumber" type="tel" name="phone" id="phone" autocomplete="phone-number"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('phoneNumber') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input wire:model="email" type="email" name="email" id="email" autocomplete="email-address"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('email') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700">Password</label>
                                    <input wire:model="password" type="password" name="password" id="password"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('password') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password-confimation"
                                        class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                                    <input wire:model="passwordConfirmation" type="password" name="password-confimation" id="password-confimation"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('passwordConfirmation') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                    <select wire:model="role" id="role" name="role" autocomplete="role"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="USER">USER</option>
                                        <option value="ADMIN">ADMIN</option>
                                    </select>
                                    @error('role') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input wire:model="address" type="text" name="address" id="address" autocomplete="address"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('address') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="house-number" class="block text-sm font-medium text-gray-700">House
                                        Number</label>
                                    <input wire:model="houseNumber" type="text" name="house-number" id="house-number" autocomplete="house-number"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('houseNumber') <span class="error-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input wire:model="city" type="text" name="city" id="city" autocomplete="City"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('city') <span class="error-xs">{{ $message }}</span> @enderror
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
