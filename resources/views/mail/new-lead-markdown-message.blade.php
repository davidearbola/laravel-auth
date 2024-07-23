<x-mail::message>
    # Ciao Admin,

    Hai ricevuto un nuovo messaggio ecco i dettagli:
    Nome: {{ $lead['name'] }};
    Email: {{ $lead['email'] }};
    Messaggio: {{ $lead['message'] }}

    Thanks
    {{ config('app.name') }}
</x-mail::message>
