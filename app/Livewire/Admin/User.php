<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class User extends Component
{
    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.admin.users.index');
    }
}
