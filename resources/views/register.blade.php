<x-base-layout title="Register">
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
            <img class="size-12 " src="{{ asset('images/app-logo.svg') }}" alt="logo" />
            <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                {{ config('app.name') }}
            </p>
        </a>
    </div>
    {{-- <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-lg p-6">
            <img class="w-full" x-show="!$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-meet.svg') }}" alt="image" />
            <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-meet-dark.svg') }}" alt="image" />
        </div>
    </div> --}}
    <div class="hidden w-full place-items-center lg:grid relative">
        <canvas id="particles-canvas" class="absolute top-0 left-0 w-full h-full pointer-events-none z-10"></canvas>

        <img id="imagen" class="w-full h-full" x-show="!$store.global.isDarkModeEnabled"
        src="{{ asset('images/illustrations/registro.jpg') }}" alt="image" />
    </div>
    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center">
                <img class="mx-auto size-16 lg:hidden " src="{{ asset('images/app-logo.svg') }}" alt="logo" />
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        Bienvenido a {{ config('app.name') }}
                    </h2>
                    {{-- <p class="text-slate-400 dark:text-navy-300">
                        Please sign up to continue
                    </p> --}}
                </div>
            </div>

            {{-- <div class="mt-10 flex space-x-4">
                <button
                    class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <img class="size-5.5 " src="{{ asset('images/100x100.png') }}" alt="logo" />
                    <span>Google</span>
                </button>
                <button
                    class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <img class="size-5.5 " src="{{ asset('images/100x100.png') }}" alt="logo" />
                    <span>Github</span>
                </button>
            </div> --}}
            <div class="my-7 flex items-center space-x-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                <p class="text-tiny-plus uppercase">Registra tus datos</p>

                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            </div>
            <form class="mt-4" action="{{ route('register') }}" method="post">
                @method('POST') @csrf
                <div class="space-y-4">
                    <div>
                        <label class="relative flex">
                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Nombre Completos" type="text" name="name" value="{{ old('name') }}" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                        </label>
                        @error('name')
                            <span class="text-tiny-plus text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="relative flex">
                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Email" type="text" name="email" value="{{ old('email') }}" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </label>
                        @error('email')
                            <span class="text-tiny-plus text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="relative flex">
                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Password" type="password" name="password" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                        </label>
                        @error('password')
                            <span class="text-tiny-plus text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="relative flex">
                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Repeat Password" type="password" name="password_confirmation" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                        </label>
                        @error('password_confirmation')
                            <span class="text-tiny-plus text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="uppercase btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Registrar
                </button>
            </form>
            <div class="mt-4 text-center text-xs-plus">
                <p class="line-clamp-1">
                    <span>¿Ya tienes una cuenta? </span>
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('loginView') }}">Inicia Sesión</a>
                </p>
            </div>
        </div>
    </main>
    <script>
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');

        let particles = [];
        let connections = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class Particle {
            constructor() {
                this.reset();
            }

            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 1; // Tamaño de la partícula
                this.speedX = (Math.random() - 0.5) * 2; // Movimiento horizontal
                this.speedY = (Math.random() - 0.5) * 2; // Movimiento vertical
                this.opacity = Math.random() * 0.5 + 0.3; // Opacidad ajustada
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x < 0 || this.x > canvas.width) this.speedX = -this.speedX;
                if (this.y < 0 || this.y > canvas.height) this.speedY = -this.speedY;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                // ctx.fillStyle = `rgba(0, 0, 0, ${this.opacity})`; // Negro translúcido
                ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`; // blanco translúcido

                ctx.fill();
            }

            connectTo(otherParticle) {
                const dist = Math.hypot(this.x - otherParticle.x, this.y - otherParticle.y);
                if (dist < 150) { // Distancia para que se conecten
                    ctx.beginPath();
                    ctx.moveTo(this.x, this.y);
                    ctx.lineTo(otherParticle.x, otherParticle.y);
                    ctx.strokeStyle = `rgba(255, 255, 255, ${(1 - dist / 150) * 0.6})`; // Opacidad de la línea
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }

        function initParticles(num) {
            particles = [];
            for (let i = 0; i < num; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Conectar partículas entre sí
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    particles[i].connectTo(particles[j]);
                }
            }

            // Actualizar y dibujar partículas
            particles.forEach(p => {
                p.update();
                p.draw();
            });

            requestAnimationFrame(animate);
        }

        initParticles(100); // Puedes ajustar este número
        animate();
    </script>
</x-base-layout>
