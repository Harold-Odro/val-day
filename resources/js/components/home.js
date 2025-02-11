export function homeComponent() {
    return {
        init() {
            this.initCarousel();
            this.startConfetti();
            this.startRoseInterval();
        },

        initCarousel() {
            new Swiper('.memories-carousel', {
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        },

        startConfetti() {
            const duration = 5 * 1000;
            const animationEnd = Date.now() + duration;

            const randomInRange = (min, max) => {
                return Math.random() * (max - min) + min;
            };

            const frame = () => {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) return;

                confetti({
                    particleCount: 2,
                    angle: randomInRange(55, 125),
                    spread: randomInRange(50, 70),
                    origin: { y: 0.6 },
                    colors: ['#ff0000', '#ff69b4', '#ff1493']
                });

                if (timeLeft % 1000 < 100) {
                    const x = randomInRange(0.2, 0.8);
                    const y = randomInRange(0.3, 0.5);

                    confetti({
                        particleCount: 30,
                        angle: randomInRange(0, 360),
                        spread: 360,
                        origin: { x, y },
                        colors: ['#ff0000', '#ffd700', '#ff69b4', '#ff1493'],
                        ticks: 100,
                        gravity: 0.8,
                        scalar: 1.2,
                        drift: 0,
                        shapes: ['star']
                    });
                }

                requestAnimationFrame(frame);
            };

            frame();
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

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
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
    };
}
