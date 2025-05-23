<div style="max-width: 400px; margin: 100px auto; font-family: sans-serif;">
    <h2>Please Input Name & Email!</h2>

    @if (session()->has('message'))
        <div style="background: #d4edda; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
            {{ session('message') }}
        </div>
    @endif
    <input type="text"
        wire:model="nama"
        placeholder="Input your name"
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
    >
    @error('nama')
        <span style="color: red; font-size: 14px;">{{ $message }}</span>
    @enderror
    <input type="text"
        wire:model="email"
        placeholder="Input your email"
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
    >
    @error('email')
        <span style="color: red; font-size: 14px;">{{ $message }}</span>
    @enderror

    <button wire:click="save" style="margin-top: 10px; background: #007BFF; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Save</button>

    <hr style="margin: 30px 0;">

    <h3>Daftar User</h3>
    <input type="text" wire:model="search" placeholder="Find User..." style="width: 100%; padding: 10px; margin-bottom: 10px;">

    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="delete({{ $user->id }})" style="cursor: pointer;background: #dc3545; color:white; border: none; padding: 5px 10px; border-radius: 5px;">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
