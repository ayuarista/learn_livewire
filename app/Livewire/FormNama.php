<?php

namespace App\Livewire;

use Livewire\Component;

class FormNama extends Component
{
    public $nama = '';

    protected $rules =
    [
        'nama' => 'required|min:3'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $this->validate();

        session()->flash('message', "Name {$this->nama} saved successfully!");
        $this->reset('nama');
    }

    public function render()
    {
        return view('livewire.form-nama');
    }
}
