@component('emails.components.layout')

Estimado(a): **{{ $userDis->nameComplete }}**

El Sistema Centros de Capacitación y Calidad le da más cordial bienvenida a la plataforma de cursos a distancia
<br><br>
En la información siguiente encontrara los datos de acceso a su cuenta, la cual debera confirmar por unica ocasión.

@component('vendor.mail.html.table')
| | |
| ---------------------------|:--------------------------:|
| Usuario | {{ $userDis->email }} |
| Contraseña | {{ $password }} |

@endcomponent

@component('vendor.mail.html.button', [ 'url' => route('registro.aulavirtual.confirmacion', ['guid' =>
$userDis->usudis_guid])])
CONFIRMAR
@endcomponent

Saludos, y que estés bien !
@endcomponent