@props(['active' => false])

<a {{ $attributes }}
   class="text-white no-underline border-b-2 {{ $active ? 'border-red-700' : 'border-transparent' }}">
    {{ $slot }}
</a>
