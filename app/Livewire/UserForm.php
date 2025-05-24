<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{
    public $nama, $email, $userId;

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email',
    ];

    protected $listeners = ['editUser' => 'loadUser'];

    public function save()
    {
        $this->validate();

        User::updateOrCreate(
            ['id' => $this->userId],
            ['nama' => $this->nama, 'email' => $this->email]
        );

        $this->reset(['nama', 'email', 'userId']);
        $this->dispatch('userSaved');
        session()->flash('success', 'Data saved successfully!');
    }

    public function loadUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->nama = $user->nama;
        $this->email = $user->email;
    }
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Data removed successfully!');
    }

    public function render()
    {
        $keyword = trim($this->search);

        $users = User::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->latest()
            ->get();
        return view('livewire.user-form', compact('users'));
    }
}
