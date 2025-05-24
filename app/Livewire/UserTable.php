<?php

namespace App\Livewire;

use WithPagination;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{

    public $search = '';

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['userSaved' => '$refresh'];

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteUser', id: $id);
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'User berhasil dihapus.');
    }
    public function render()
    {
        $users = User::where(function($query) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate(5);
        return view('livewire.user-table', compact('users'));
    }
}
