
@php
    $classes = "underline text-sm text-gray-600 hover:text-gray-900"
@endphp
<!--Uniendo todos los atributos a el enlace tales como las clases y el href-->
<a {{$attributes->merge(['class' => $classes])}}>
    {{ $slot }}
</a>