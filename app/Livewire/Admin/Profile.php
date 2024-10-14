<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class Profile extends Component
{
    public string $firstname;
    public string $lastname;
    public string|null $phone_number;
    public string|null $phone;
    public string $email;
    public string|null $avatar_url;

    public function mount(): void
    {
        $user = auth()->user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->phone_number = $user->phone;
        $this->email = $user->email;
        $this->avatar_url = $user->avatar_url;
    }

    public function rules(): array
    {
        return [
            'firstname' => ['bail','required', 'string', 'max:255'],
            'lastname' => ['bail','required', 'string', 'max:255'],
            'phone' => ['bail','required', 'numeric', 'digits:10', Rule::unique(User::class)->ignore(auth()->user()->id)],
            'email' => ['bail','required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
        ];
    }

    /**
     * Prepare the attribute and values for the validation
     */
    public function prepareValidation() : void{
        $this->phone = str_replace('-', '', filter_var($this->phone_number, FILTER_SANITIZE_NUMBER_INT));
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
    
    public function update()
    {   $this->prepareValidation();
        $validated = $this->validate();
        auth()->user()->update($validated);
        \Toaster::success(__("Profile has been updated successfully."));
        $this->dispatch('success');
    }
}
