@component('mail::message')
# {{ $mailData['title'] }}

<b>Message</b> : {{ $mailData['texte'] }} <br>
<b>Nom</b> : {{ $mailData['name'] }} <br>
<b>Email</b> : {{ $mailData['email'] }} 


Merci de répondre,<br>
{{ config('app.name') }}
@endcomponent