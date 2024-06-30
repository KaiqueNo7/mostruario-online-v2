@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm p-2']) !!}>
    @for ($i = 1.1; $i <= 5.0; $i += 0.1)
        {{ $selected = ($user->multiplier == $i) ? 'seleceted' : '' }}
        <option value="{{ number_format($i, 1) }}" {{ $selected }}>{{ number_format($i, 1) }}</option>
    @endfor
</select>
