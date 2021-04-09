@component('vendor.mail.html.layout')
{{-- Header --}}
@slot('header')
@component('vendor.mail.html.header', ['url' => config('app.url')])
SICENET
@endcomponent
@endslot



{{-- Body --}}
{{ $slot }}


{{-- Footer --}}
@slot('footer')
@component('vendor.mail.html.footer')
© {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
@endcomponent
@endslot

@endcomponent