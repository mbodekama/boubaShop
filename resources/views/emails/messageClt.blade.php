@component('mail::message')
# Hello Admin
<i>Un nouveau message depuis votre site web</i><br>
Nom : {{$nom}}<br>
Mail : {{$mail}}<br>
Tel : {{$tel}}<br>
Sujet : {{$sujet}}<br>
<p>{{$msg}}</p>



Merci,<br>
{{ config('app.name') }}
@endcomponent
