<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-black text-gray-950">Verifica tu correo</h2>
        <p class="mt-2 text-sm text-gray-500">Antes de continuar, revisa tu correo y confirma tu cuenta. Si no recibiste el mensaje, podemos enviarlo otra vez.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            Enviamos un nuevo enlace de verificacion a tu correo.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Reenviar correo
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Cerrar sesion
            </button>
        </form>
    </div>
</x-guest-layout>
