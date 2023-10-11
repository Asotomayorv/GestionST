<x-mail::message>
    <p>Hola, {{ $userName }} {{$userLastName1}}!</p>
    <p>Hemos recibido tu solicitud de reestablecimiento de contraseña, para continuar, por favor haga clic en el siguiente enlace:</p>
    <x-mail::button :url="$resetLink">
        Reestablecer Contraseña
    </x-mail::button>
    {{ config('app.name') }}
</x-mail::message>