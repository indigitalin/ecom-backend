@props(['disabled' => false])

<input {{ $attributes['type'] == 'password' ? 'autocomplete=new-password' : 'autocomplete=off' }}  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 w-full rounded-md shadow-sm']) !!}>
