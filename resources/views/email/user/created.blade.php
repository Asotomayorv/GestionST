<x-mail::message>
    <p>Hola, {{ $userName }} {{$userLastName1}}!</p>
    <p>Tu cuenta para acceder a Gestión Operativa ST ha sido creada con éxito. Aquí están tus detalles de inicio de sesión:</p>
    <ul>
        <li><strong>Nombre de Usuario:</strong> {{ $systemUser }}</li>
        <li><strong>Contraseña:</strong> {{ $password }}</li>
    </ul>
    <p>Recomendamos que lo primero que hagas sea cambiar tu contraseña. Para hacerlo, sigue estos pasos:</p>
    <ol>
        <li>Inicia sesión en tu cuenta.</li>
        <li>Haz clic en tu nombre en la esquina superior derecha.</li>
        <li>Selecciona "Cambiar contraseña".</li>
        <li>Ingresa tu contraseña actual y la nueva contraseña que deseas usar.</li>
        <li>Haz clic en "Guardar".</li>
    </ol>
    <p>Gracias por unirte a nosotros, por favor inicia sesión con tus credenciales haciendo clic en el siguiente botón:</p>
    <x-mail::button :url="route('auth.login')">
        Iniciar Sesión
    </x-mail::button>
    {{ config('app.name') }}
</x-mail::message>

