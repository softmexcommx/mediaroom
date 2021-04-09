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
© {{ date('Y') }} Sistema Centros de Capacitación y Calidad. Todos los derechos reservados.
<br>
contacto@sistemacentros.com
@endcomponent
@endslot

@endcomponent