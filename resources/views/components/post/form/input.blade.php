<div class="mt-5">
    <label
        class="block font-medium text-sm text-gray-700"
        for="{{$name}}">
        {{ $slot }}
    </label>
    <input
        {{ $attributes }}
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
        id="{{ $name }}"
        autofocus="autofocus">
</div>

