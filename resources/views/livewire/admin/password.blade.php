<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
        {{ __('Change your password') }}
    </h2>
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg border">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <p>Update your password for enhanced security.</p>
            <form wire:submit="update">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="current_password" :value="__('Current password')" />
                            <x-text-input placeholder="Your current password" wire:model="current_password" id="current_password" class="block mt-1 w-full"
                                type="password" name="current_password" required />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                        <div>
                            <x-input-label for="new_password" :value="__('New password')" />
                            <x-text-input placeholder="Your new password" wire:model="new_password" id="new_password" class="block mt-1 w-full"
                                type="password" name="new_password" required />
                            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                        <div>
                            <x-input-label for="confirm_password" :value="__('Confirm password')" />
                            <x-text-input placeholder="Confirm your new password" wire:model="confirm_password" id="confirm_password" class="block mt-1 w-full"
                                type="password" name="confirm_password" required />
                            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-400">Password must be at least 8 characters long and include a mix of uppercase, lowercase, numbers, and special characters.</p>
                <div class="flex flex-wrap mt-5">
                    <x-secondary-button type="button" class="text-center ms-auto me-2">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button class="text-center">
                        {{ __('Change password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    
</div>
