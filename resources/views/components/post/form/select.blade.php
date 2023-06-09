<select {{ $attributes }}
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
        required="required"
        autofocus="autofocus"
        name="{{ $name }}"
        id="{{ $name }}">
    {{ $slot }}
</select>
