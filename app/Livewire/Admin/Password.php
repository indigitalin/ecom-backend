<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Password extends Component
{
    public string $current_password;
    public string $new_password;
    public string $confirm_password;

    public function rules(): array
    {
        return [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => ['required', 'same:confirm_password', new \App\Rules\StrongPassword],
            'confirm_password' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.admin.password');
    }

    public function update()
    {
        $this->validate();
        $this->reset();

        \Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->dispatch('success', message: __("Password has been changed successfully."));
    }
}
