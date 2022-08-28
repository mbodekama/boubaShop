@component('mail::message')
# Commande Client Dianys<br>

Vous avez effectué un achat sur {{ getSite() }}<br>.
Ci dessous les références de votre commande<br>
Numéro Commande  : <strong>{{ $numCmd }}</strong> <br>
Montant  : <strong>{{ $montant.' '.getTDevise() }}</strong> <br>
Date  : <strong>{{ date("d-m-Y H:i:s") }}</strong> <br>

Merci,<br>
{{ config('app.name') }}
@endcomponent
