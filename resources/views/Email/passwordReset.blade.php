@component('mail::message')
# Mail para el reestablecimiento de su contraseña

Presionar en el enlace para Reestablecer contraseña y crear una nueva

@component('mail::button', ['url' => 'http://localhost:4200/response-password-reset?token='.$token])
Presione aquí
@endcomponent

Gracias!,<br>
{{ config('app.name') }}
@endcomponent
