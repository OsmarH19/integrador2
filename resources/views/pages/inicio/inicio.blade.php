<x-app-layout title="Bienvenido a MEDI-K" is-header-blur="true">
    <main
        class="main-content w-full pb-8 flex items-center justify-center min-h-screen"
        x-data="{ show: false }"
        x-init="setTimeout(() => show = true, 500)"
    >
        <div class="text-center">
            <h1
                class="text-4xl font-bold text-gray-600 transform transition-all duration-1000"
                x-show="show"
                x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 scale-50 translate-y-[-100px]"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-cloak
            >
                Bienvenido a MEDI-K
            </h1>
            <p
                class="mt-2 text-lg text-gray-600"
                x-show="show"
                x-transition:enter="transition ease-out delay-500 duration-1000"
                x-transition:enter-start="opacity-0 translate-y-[50px]"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-cloak
            >
                Tu plataforma de gestión médica
            </p>
        </div>
    </main>
</x-app-layout>
