@component('mail::message')
# Introduction

Presionar en el enlace para Reestablecer contraseña y crear una nueva

@component('mail::button', ['url' => 'http://localhost:4200/response-password-reset?token='.$token])
Presione aquí
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
