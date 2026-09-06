@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 bg-white text-gray-900 focus:border-yellow-400 focus:ring-yellow-400 rounded-lg shadow-sm']) }}>
