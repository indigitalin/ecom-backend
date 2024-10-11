<div class="container mx-auto py-6">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Clients</h2>
        <x-primary-button @click="$dispatch('open-modal', '{{ 'client-modal' }}')"
            class="bg-blue-500 text-white px-4 py-2 rounded">Add Client</x-primary-button>
    </div>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border-b p-2 text-left">First Name</th>
                <th class="border-b p-2 text-left">Last Name</th>
                <th class="border-b p-2 text-left">Email</th>
                <th class="border-b p-2 text-left">Phone</th>
                <th class="border-b p-2 text-left">Business Name</th>
                <th class="border-b p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td class="border-b p-2">{{ $client->user->firstname }}</td>
                    <td class="border-b p-2">{{ $client->user->lastname }}</td>
                    <td class="border-b p-2">{{ $client->user->email }}</td>
                    <td class="border-b p-2">{{ $client->user->phone }}</td>
                    <td class="border-b p-2">{{ $client->business_name }}</td>
                    <td class="border-b p-2">
                        <button wire:click="edit({{ $client->id }})"
                            @click="$dispatch('open-modal', '{{ 'client-modal' }}')"
                            class="text-blue-600 hover:underline">Edit</button>
                        <button wire:click="delete({{ $client->id }})"
                            class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Component -->
    <x-modal name="client-modal" maxWidth="w-full" :show="$isUpdateMode">
        @if (session()->has('error'))
            <div class="mb-4 text-danger-600">
                {{ session('error') }}
            </div>
        @endif

        <div class="p-6">
            <h3 class="text-lg font-bold mb-4">
                @if ($isUpdateMode)
                    Edit Client
                @else
                    Add Client
                @endif
            </h3>
            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="firstname" value="First Name" />
                            <x-text-input  id="firstname" wire:model.defer="firstname" />
                            <x-input-error :messages="$errors->get('firstname')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="lastname" value="Last Name" />
                            <x-text-input id="lastname" wire:model.defer="lastname" />
                            <x-input-error :messages="$errors->get('lastname')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" type="email" wire:model.defer="email" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="password" value="Password" />
                            <x-text-input  id="password" type="password" wire:model.defer="password" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="phone" value="Phone" />
                            <x-text-input id="phone" wire:model.defer="phone" />
                            <x-input-error :messages="$errors->get('phone')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="business_name" value="Business Name" />
                            <x-text-input id="business_name" wire:model.defer="business_name" />
                            <x-input-error :messages="$errors->get('business_name')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="industry" value="Industry" />
                            <x-text-input id="industry" wire:model.defer="industry" />
                            <x-input-error :messages="$errors->get('industry')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="description" value="Description" />
                            <x-text-input id="description" wire:model.defer="description" />
                            <x-input-error :messages="$errors->get('description')" />
                        </div>
                    </div>
                
                    <div class="w-full  p-2">
                        <div class="mt-3">
                            <x-input-label for="address" value="Address" />
                            <x-text-input id="address" wire:model.defer="address" />
                            <x-input-error :messages="$errors->get('address')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="city" value="City" />
                            <x-text-input id="city" wire:model.defer="city" />
                            <x-input-error :messages="$errors->get('city')" />
                        </div>
                    </div>
                
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="state_id" value="State" />
                            <x-select id="state_id" wire:model.defer="state_id" :options="$states" />
                            <x-input-error :messages="$errors->get('state_id')" />
                        </div>
                    </div>
{{--                 
                    <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="country_id" value="Country" />
                            <x-text-input id="country_id" wire:model.defer="country_id" />
                            <x-input-error :messages="$errors->get('country_id')" />
                        </div>
                    </div> --}}
                
                    {{-- <div class="w-full md:w-1/2 p-2">
                        <div class="mt-3">
                            <x-input-label for="plan_id" value="Plan" />
                            <x-text-input id="plan_id" wire:model.defer="plan_id" />
                            <x-input-error :messages="$errors->get('plan_id')" />
                        </div>
                    </div> --}}
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full  p-2">
                        <div class="mt-3">
                            <div class="flex justify-end mt-4">
                                <button type="button" @click="$dispatch('close-modal', '{{ 'client-modal' }}')"
                                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2">Cancel</button>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                    @if ($isUpdateMode)
                                        Update
                                    @else
                                        Create
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
</div>

@push('scripts')
    <script>
    console.log()
    </script>
@endpush

