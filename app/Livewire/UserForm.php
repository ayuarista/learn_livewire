<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

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
        $validated = $this->validate();

        User::create($validated);

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
        $keyword = trim($this->search);

        $users = User::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->latest()
            ->get();
        return view('livewire.user-form', compact('users'));
    }
}
