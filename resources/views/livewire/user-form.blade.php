<div class="max-w-xl mt-12 m-auto">
    <h2 class="text-xl font-bold">Please Input Name & Email!</h2>

    @if (session()->has('message'))
        <div style="background: #d4edda; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex items-center gap-4 mt-3">
        <input type="text"
            wire:model="nama"
            placeholder="Input your name"
            class="w-full border border-gray-300 p-2 focus:outline-none rounded-md"
        >
        @error('nama')
            <span style="color: red; font-size: 14px;">{{ $message }}</span>
        @enderror
        <input type="text"
            wire:model="email"
            placeholder="Input your email"
            class="w-full border border-gray-300 p-2 focus:outline-none rounded-md"
        >
        @error('email')
            <span style="color: red; font-size: 14px;">{{ $message }}</span>
        @enderror
    </div>

    <button wire:click="save" class="w-full p-1 bg-indigo-500 text-white font-medium mt-2 rounded-md text-base">Save</button>

    <hr style="margin: 30px 0;" class="text-gray-300">

    <h3 class="text-lg font-semibold text-indigo-500">Daftar User</h3>
    <input type="text" wire:model="search" placeholder="Find User..." class="w-full border border-gray-300 p-2 focus:outline-none rounded-md mt-2">

    <table class="w-full mt-4 table-auto border border-gray-300 rounded-lg overflow-hidden">
        <caption class="caption-bottom text-sm text-gray-500 mt-2">
            User List
        </caption>
        <thead class="bg-indigo-100 text-center text-black">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($users as $user)
                <tr class="hover:bg-gray-50 text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $user->nama }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="delete({{ $user->id }})"
                                class="bg-red-500 hover:cursor-pointer hover:bg-red-600 text-white text-[13px] px-3 py-1 rounded-md transition duration-200">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">No data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
