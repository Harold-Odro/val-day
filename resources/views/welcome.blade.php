@extends('layouts.app')

@php
    $colors = [
        "rgb(255, 0, 0)",
        "rgb(220, 20, 60)",
        "rgb(178, 34, 34)",
        "rgb(139, 0, 0)"
    ];
@endphp

@section('content')
<div class="w-full min-h-screen" x-data="homeComponent()" x-init="init()">
    <!-- Hero Section -->
    <section class="h-screen flex items-center justify-center bg-gradient-to-b from-pink-50 to-red-100 relative overflow-hidden">
        <div class="text-center z-10 transform scale-50 md:scale-100 transition-transform duration-300">
            <h1 class="text-4xl md:text-6xl font-bold text-red-600 mb-4 font-serif animate-heartbeat">
                Happy Valentine's Day
            </h1>
            <h2 class="text-2xl md:text-4xl font-bold text-pink-500 font-serif">
                I love you Ama
            </h2>
        </div>

        <!-- Background roses animation -->
        @for($i = 0; $i < 12; $i++)
            <div class="absolute rose-animation" style="
                animation: roseFloatPath 6s infinite {{ $i * 1.5 }}s;
                left: {{ rand(0, 100) }}%;
                top: {{ rand(0, 100) }}%;
            ">
                <x-rose :color="'rgb(220,20,60)'" :size="64" />
            </div>
        @endfor

        <!-- Floating Hearts Background -->
        <div class="fixed inset-0 pointer-events-none" x-data="floatingHearts()">
            <template x-for="heart in hearts" :key="heart.id">
                <div
                    class="absolute"
                    :style="`
                        left: ${heart.x}px;
                        top: ${heart.y}px;
                        transform: scale(${heart.scale});
                        opacity: ${heart.opacity};
                        transition: all ${heart.duration}s ease-out;
                    `"
                >
                    ❤️
                </div>
            </template>
        </div>
    </section>

 <!-- Love Letters Section -->
<section class="min-h-screen bg-white px-4 py-20 relative overflow-hidden">
    <div class="max-w-2xl mx-auto space-y-8 relative z-10">
        <div class="p-6 bg-pink-50/80 backdrop-blur rounded-lg shadow-sm love-letter transition-all duration-1000">
            <p class="text-lg text-red-800 italic transform transition-all duration-1000 translate-x-12"
               x-intersect:enter="$el.classList.add('translate-x-0', 'opacity-100')"
               x-intersect:leave="$el.classList.remove('translate-x-0', 'opacity-100')">
                "Your love is like a beautiful rose that blooms eternally in my heart..."
            </p>
        </div>

        <div class="p-6 bg-red-50/80 backdrop-blur rounded-lg shadow-sm love-letter transition-all duration-1000">
            <p class="text-lg text-red-800 italic transform transition-all duration-1000 translate-x-24"
               x-intersect:enter="$el.classList.add('translate-x-0', 'opacity-100')"
               x-intersect:leave="$el.classList.remove('translate-x-0', 'opacity-100')">
                "And I cannot imagine a moment where we are apart..."
            </p>
        </div>

        <div class="p-6 bg-red-50/80 backdrop-blur rounded-lg shadow-sm love-letter transition-all duration-1000">
            <p class="text-lg text-red-800 italic transform transition-all duration-1000 translate-x-40"
               x-intersect:enter="$el.classList.add('translate-x-0', 'opacity-100')"
               x-intersect:leave="$el.classList.remove('translate-x-0', 'opacity-100')">
                "So I made this wonderful piece of art..."
            </p>
        </div>

        <div class="p-6 bg-red-50/80 backdrop-blur rounded-lg shadow-sm love-letter transition-all duration-1000">
            <p class="text-lg text-red-800 italic transform transition-all duration-1000 translate-x-60"
               x-intersect:enter="$el.classList.add('translate-x-0', 'opacity-100')"
               x-intersect:leave="$el.classList.remove('translate-x-0', 'opacity-100')">
                "Just to say..."
            </p>
        </div>
    </div>


</div>
</section>

        <!-- Animated roses -->
        @for($i = 0; $i < 8; $i++)
            <div class="absolute letter-rose" style="
                animation: roseFloatPath 8s infinite {{ $i * 2 }}s;
                left: {{ rand(0, 80) }}%;
                top: {{ rand(0, 80) }}%;
            ">
                <x-rose :color="$colors[array_rand($colors)]" size="40" />
            </div>
        @endfor
    </section>



    <!-- Footer -->
    <section class="py-8 bg-gradient-to-t from-red-100 to-pink-50 text-center">
        <p class="text-xl text-red-600 font-serif italic transition-all duration-1000"
           data-animate
           x-data="{ shown: false }"
           x-init="setTimeout(() => shown = true, 100)"
           :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
            I love you to the moon and back... ❤️
        </p>
    </section>

    <audio id="audio-player" class="fixed bottom-4 right-4" controls>
        <source src="{{ asset('audios/val.mp3') }}" type="audio/mpeg">
    </audio>
</div>

<style>
@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.animate-heartbeat {
    animation: heartbeat 2s ease-in-out infinite;
}

@keyframes roseFloatPath {
    0% {
        transform: scale(0) rotate(0deg);
        opacity: 0;
    }
    20% {
        transform: scale(1) rotate(180deg);
        opacity: 1;
    }
    80% {
        transform: scale(1) rotate(360deg) translate(50px, -50px);
        opacity: 1;
    }
    100% {
        transform: scale(0.5) rotate(540deg) translate(100px, -100px);
        opacity: 0;
    }
}

.rose-animation, .letter-rose {
    animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>

<script>
function homeComponent() {
    return {
        init() {
            this.initCarousel();
            this.startConfetti();
            this.startRoseInterval();
            this.initLetterAnimations();
        },

        initCarousel() {
            new Swiper('.memories-carousel', {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                speed: 1000,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
        },

        initLetterAnimations() {
            const letters = document.querySelectorAll('.love-letter');
            letters.forEach((letter, index) => {
                letter.style.transitionDelay = `${index * 0.3}s`;
                letter.classList.add('opacity-0', 'translate-y-10');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            letter.classList.remove('opacity-0', 'translate-y-10');
                            letter.classList.add('opacity-100', 'translate-y-0');
                        }
                    });
                });

                observer.observe(letter);
            });
        },

        startConfetti() {
            const duration = 5 * 1000;
            const animationEnd = Date.now() + duration;
            // ... rest of confetti code from original
        },

        async createRose() {
            try {
                const response = await fetch('/api/roses', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(this.generateRosePosition())
                });
            } catch (error) {
                console.error('Failed to create rose:', error);
            }
        },

        generateRosePosition() {
            return {
                color: this.colors[Math.floor(Math.random() * this.colors.length)],
                size: Math.floor(50 + Math.random() * 100),
                position_x: Math.floor(Math.random() * (window.innerWidth - 150)),
                position_y: Math.floor(Math.random() * (window.innerHeight - 150))
            };
        },

        startRoseInterval() {
            setInterval(() => this.createRose(), 2000);
        },

        colors: [
            "rgb(255, 0, 0)",
            "rgb(220, 20, 60)",
            "rgb(178, 34, 34)",
            "rgb(139, 0, 0)"
        ]
    }
}

function floatingHearts() {
    return {
        hearts: [],
        init() {
            setInterval(() => this.createHeart(), 1000);
        },
        createHeart() {
            const heart = {
                id: Date.now(),
                x: Math.random() * window.innerWidth,
                y: window.innerHeight,
                scale: 0.5 + Math.random(),
                opacity: 1,
                duration: 3 + Math.random() * 2
            };

            this.hearts.push(heart);
            setTimeout(() => {
                heart.y = -100;
                heart.opacity = 0;
            }, 100);

            setTimeout(() => {
                this.hearts = this.hearts.filter(h => h.id !== heart.id);
            }, heart.duration * 1000);
        }
    }
}
</script>
@endsection
