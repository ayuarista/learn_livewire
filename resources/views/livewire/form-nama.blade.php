<div style="max-width: 400px; margin: 100px auto; font-family: sans-serif;">
    <h2>Input Name!</h2>

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

    <button wire:click="save" style="margin-top: 10px; background: #007BFF; color: white; padding: 10px; border: none; border-radius: 5px;">Save</button>
</div>