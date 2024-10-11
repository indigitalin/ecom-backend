<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
        {{ __('Your profile settings') }}
    </h2>
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg border">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <p>Update your profile information easily. Change your picture and contact details.</p>
            <form wire:submit="update">
                <div class="border-2 rounded-lg p-5 mb-5 mt-5">
                    <div class="flex items-center">
                        <div>
                            <img class="w-15 h-15 rounded-full"
                                src="{{ $this->avatar_url }}" alt="user photo">
                        </div>
                        <div class="ms-4">
                            <div class="text-lg">{{ $this->firstname }} {{ $this->lastname }}</div>
                            <div class="text-blue-600 cursor-pointer">Upload photo</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="firstname" :value="__('First name')" />
                            <x-text-input placeholder="Your first name" wire:model="firstname" id="firstname" class="block mt-1 w-full"
                                type="text" name="firstname" required />
                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                        <div class="mt-3">
                            <x-input-label for="lastname" :value="__('Last name')" />
                            <x-text-input placeholder="Your last name" wire:model="lastname" id="lastname" class="block mt-1 w-full"
                                type="text" name="lastname" required />
                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                        <div class="mt-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input placeholder="Your email" wire:model="email" id="email" class="block mt-1 w-full"
                                type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                        <div class="mt-3">
                            <x-input-label for="phone_number" :value="__('Phone number')" />
                            <x-text-input placeholder="Your phone number" x-mask="(999) 9999-999" wire:model="phone_number" id="phone_number" class="block mt-1 w-full"
                                type="tel" name="phone_number" required />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mt-5">
                    <x-secondary-button type="button" class="text-center ms-auto me-2">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button class="text-center">
                        {{ __('Update profile') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
