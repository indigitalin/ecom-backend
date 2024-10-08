<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
        {{ __('Products') }}
    </h2>
    <div class="bg-white dark:bg-gray-800 overflow-hidden border rounded-lg p-4">
        <div>
            Success is as dangerous as failure.
        </div>
        <div>
            <h1>{{ $count }}</h1>

            <button wire:click="increment">+</button>

            <button wire:click="decrement">-</button>
        </div>
    </div>
</div>
