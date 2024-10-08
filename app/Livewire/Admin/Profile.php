<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public string $firstname;
    public string $lastname;
    public string|null $phone;
    public string $email;
    public string|null $avatar_url;

    public function mount(): void
    {
        $user = auth()->user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->avatar_url = $user->avatar_url;
    }

    public function rules(): array
    {
        return [
            
        ];
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }

    public function update()
    {
        $this->validate();

        $this->dispatch('success', message: __("Profile has been updated successfully."));
    }
}
