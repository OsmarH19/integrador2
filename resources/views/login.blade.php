<x-base-layout title="Login">
    <style>
        .size-oso {
            width: calc(var(--spacing) * 50);
            height: calc(var(--spacing) * 20);
        }

    </style>

    <div class="hidden w-full place-items-center lg:grid relative">
        <canvas id="particles-canvas" class="absolute top-0 left-0 w-full h-full pointer-events-none z-10"></canvas>

        <div class="w-full h-full">
            <!-- Imagen de fondo -->
            <img id="imagen" class="w-full h-full object-cover"
                 x-show="!$store.global.isDarkModeEnabled"
                 src="{{ asset('images/illustrations/login2.jpg') }}"
                 alt="image" />

            <!-- Texto centrado con líneas blancas arriba y abajo -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center pointer-events-none">
                <div class="w-2/5 h-[0.5] bg-white mb-4"></div>
                <h3 class="montserrat text-xl lg:text-6xl mb-2">Bienvenido a</h3>
                <h1 class="montserrat-bold text-4xl lg:text-6xl font-bold">MEDI-K</h1>
                <div class="w-2/5 h-[0.5] bg-white mt-4"></div>
            </div>
        </div>

    </div>

    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center">
                <img class="mx-auto size-oso " src="{{ asset('images/guerrerosz.png') }}" alt="logo" />
            </div>
            <form class="mt-5" action="{{ route('login') }}" method="post">
                @method('POST') @csrf
                <div>
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Username or email" type="text" name="email" />
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
                <div class="mt-4">
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Password" type="password" name="password"/>
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

                <div class="mt-4 flex items-center justify-between space-x-2">
                    <a href="{{ route('password.request') }}"
                        class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit"
                    class="uppercase btn mt-5 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Iniciar
                </button>
                <div class="mt-4 text-center text-xs-plus">
                    <p class="line-clamp-1">
                        <span>¿No tienes cuenta?</span>

                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('registerView') }}">Crea una cuenta</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="my-5 flex justify-center text-xs text-slate-400 dark:text-navy-300">
            <a href="#">Privacy Notice</a>
            <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
            <a href="#">Term of service</a>
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
