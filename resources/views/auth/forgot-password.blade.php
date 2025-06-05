<x-base-layout title="Recuperar contraseña">
    <style>
        .size-oso {
            width: calc(var(--spacing) * 50);
            height: calc(var(--spacing) * 20);
        }

    </style>

    <div class="hidden w-full place-items-center lg:grid relative">
        <canvas id="particles-canvas" class="absolute top-0 left-0 w-full h-full pointer-events-none z-10"></canvas>

        {{-- <div class="w-full max-w-lg"> --}}
            <img id="imagen" class="w-full h-full" x-show="!$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/olvide.jpg') }}" alt="image" />
            {{-- <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-check-dark.svg') }}" alt="image" /> --}}
        {{-- </div> --}}
    </div>

    <!-- Formulario -->
    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:w-1/2">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center mb-6">
                <img class="mx-auto size-oso" src="{{ asset('images/sislex.png') }}" alt="logo" />
                <h2 class="mt-6 text-lg font-semibold text-slate-700 dark:text-navy-100">¿Olvidaste tu contraseña?
                </h2>
                <p class="text-sm text-slate-400 dark:text-navy-200">Te enviaremos un enlace para restablecerla</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if (session('status'))
                <script>
                    toastr.success('Correo de restablecimiento enviado');
                </script>
            @endif


            <form method="POST" action="{{ route('password.email') }}" class="mt-2 md:mt-2">
                @csrf
                <label class="relative flex">
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                        placeholder="Tu correo electrónico">
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 dark:text-navy-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </label>
                @error('email')
                    <span class="text-tiny-plus text-error">{{ $message }}</span>
                @enderror

                <button type="submit"
                    class="btn mt-6 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                    Enviar enlace
                </button>

                <div class="mt-4 text-center text-xs">
                    <a href="{{ route('loginView') }}"
                        class="text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Volver
                        al inicio de sesión</a>
                </div>

                <!-- Preloader -->
                <div id="preloader"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-white/70 dark:bg-navy-900/70">
                    <div class="flex space-x-2">
                        <div class="h-3 w-3 rounded-full bg-primary dark:bg-accent animate-bounce delay-0"></div>
                        <div class="h-3 w-3 rounded-full bg-primary dark:bg-accent animate-bounce delay-150"></div>
                        <div class="h-3 w-3 rounded-full bg-primary dark:bg-accent animate-bounce delay-300"></div>
                    </div>
                </div>

                <script>
                    const form = document.querySelector('form');
                    const preloader = document.getElementById('preloader');

                    form.addEventListener('submit', function (e) {
                        // Mostrar toastr inmediatamente
                        toastr.success('Correo de restablecimiento enviado');

                        // Mostrar el preloader
                        preloader.classList.remove('hidden');
                    });
                </script>


                <style>
                    @keyframes bounce {
                        0%, 80%, 100% {
                            transform: scale(0);
                        }
                        40% {
                            transform: scale(1);
                        }
                    }

                    .animate-bounce {
                        animation: bounce 1.4s infinite ease-in-out both;
                    }

                    .delay-0 {
                        animation-delay: 0s;
                    }

                    .delay-150 {
                        animation-delay: 0.15s;
                    }

                    .delay-300 {
                        animation-delay: 0.3s;
                    }
                </style>


            </form>
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
                    // ctx.strokeStyle = `rgba(0, 0, 0, ${(1 - dist / 150) * 0.5})`; // Opacidad de la línea
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
