<form
    {{ $attributes }}
    class="mx-auto"
>
    @csrf
    {{ $slot }}
</form>
