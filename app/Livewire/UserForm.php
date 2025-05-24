<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserForm extends Component
{
    public $nama = '';
    public $email = '';
    public $search = '';

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $this->validate();

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Data saved successfully!');
        $this->reset(['nama', 'email']);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Data removed successfully!');
    }

    public function render()
    {
        $users = User::where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->latest()
                    ->get();

        return view('livewire.user-form', compact('users'));
    }
}