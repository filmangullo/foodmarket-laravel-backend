<div>

    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-between">
                    <div class="p-4">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" wire:model="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5   dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for items">
                        </div>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('users.create') }}" class="py-2 bg-sky-600 hover:bg-sky-900 text-white px-2.5 rounded-md">+ User Create</a>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y table-fixed ">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    Role
                                </th>
                                <th scope="col" class="p-4">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                            @forelse ($users as $key => $user)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                <td class="w-4 p-4">
                                    {{ $key+1 }}
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $user->name }}</td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-500 whitespace-nowrap ">
                                    {{ $user->email }}</td>
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $user->role }}</td>
                                <td
                                    class="flex justify-end px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('users.edit', $user->id ) }}" class="inline-block py-2 mx-2 font-bold text-white bg-blue-500 rounded px-7 hover:bg-blue-700">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="inline-block px-4 py-2 mx-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5"
                                    class="px-6 py-4 text-sm font-medium text-center text-gray-900 whitespace-nowrap">No
                                    matching data</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>
