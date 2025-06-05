<x-base-layout title="Restablecer contraseña">
    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center mb-6">
                <img class="mx-auto size-oso" src="{{ asset('images/sislex.png') }}" alt="logo" />
                <h2 class="mt-6 text-lg font-semibold text-slate-700 dark:text-navy-100">Restablecer contraseña</h2>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <label class="relative flex">
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                        placeholder="Correo electrónico">
                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 dark:text-navy-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </label>
                @error('email')
                    <span class="text-tiny-plus text-error">{{ $message }}</span>
                @enderror

                <div class="mt-4">
                    <label class="relative flex">
                        <input type="password" name="password" required
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Nueva contraseña">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 dark:text-navy-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                    </label>
                    @error('password')
                        <span class="text-tiny-plus text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="relative flex">
                        <input type="password" name="password_confirmation" required
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Confirmar nueva contraseña">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 dark:text-navy-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                    </label>
                </div>

                <button type="submit"
                    class="btn mt-6 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                    Restablecer contraseña
                </button>
            </form>
        </div>
    </main>
</x-base-layout>
