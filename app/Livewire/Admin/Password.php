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
            'current_password' => ['bail','required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => ['bail','required', 'same:confirm_password', new \App\Rules\StrongPassword],
            'confirm_password' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.admin.password');
    }

    public function update()
    {
        $validated = $this->validate();
        $this->reset();

        auth()->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);
        \Toaster::success(__("Password has been changed successfully."));
        $this->dispatch('success');
    }
}
