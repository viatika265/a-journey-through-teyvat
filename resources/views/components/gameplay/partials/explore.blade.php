
{{-- =====================================================
    EXPLORE THE WORLD
===================================================== --}}

{{-- =====================================================
    GAMEPLAY SECTION DIVIDER
===================================================== --}}
<div class="gameplay-divider" aria-label="Gameplay section">
    <div class="gameplay-divider-inner">
        <span class="gameplay-divider-kicker">THE ADVENTURE</span>
        <h2>Gameplay</h2>
        <span class="gameplay-divider-rule" aria-hidden="true"></span>
    </div>
</div>

<section id="gameplay-explore" class="explore-section">
    <div class="explore-container">

        {{-- HEADER --}}
        <div class="explore-heading">
            <h2>Explore the World</h2>
            <p>
                Discover the beauty of Teyvat, from peaceful landscapes
                to places shaped by ancient stories.
            </p>
            <div class="explore-heading-line">
                <span></span>
                <i></i>
                <span></span>
            </div>
        </div>

        {{-- CAROUSEL --}}
        <div class="explore-carousel-wrapper">

            <button class="explore-arrow explore-prev"
                    type="button"
                    aria-label="Previous location">
                &#10094;
            </button>

            <div class="explore-carousel">
                @foreach ($experiences as $index => $experience)
                    <article class="explore-card {{ $index === 0 ? 'is-active' : '' }}"
                             data-index="{{ $index }}">

                        <div class="explore-image">
                            <img
                                src="{{ $experience->media_url }}"
                                alt="{{ $experience->title }}"
                                loading="lazy"
                            >
                        </div>

                        <div class="explore-shade"></div>

                        <div class="explore-content">
                            <span class="explore-location-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                <span>/ {{ str_pad($experiences->count(), 2, '0', STR_PAD_LEFT) }}</span>
                            </span>

                            <div class="explore-text">
                                <span class="explore-label">REGION • TEYVAT</span>
                                <h3>{{ $experience->title }}</h3>
                                <p>{{ $experience->description }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <button class="explore-arrow explore-next"
                    type="button"
                    aria-label="Next location">
                &#10095;
            </button>
        </div>

        {{-- FOOTER / INDICATOR --}}
        <div class="explore-footer">
            <div class="explore-progress">
                <span class="explore-progress-current">01</span>
                <div class="explore-progress-track">
                    <span class="explore-progress-fill"></span>
                </div>
                <span class="explore-progress-total">
                    {{ str_pad($experiences->count(), 2, '0', STR_PAD_LEFT) }}
                </span>
            </div>

            <div class="explore-dots" id="explore-indicator">
                @foreach ($experiences as $index => $experience)
                    <button
                        type="button"
                        class="explore-dot {{ $index === 0 ? 'active' : '' }}"
                        data-slide="{{ $index }}"
                        aria-label="Go to location {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>

            <span class="explore-footer-note">THE WORLD AWAITS</span>
        </div>

    </div>
</section>


<style>
/* =====================================================
   EXPLORE THE WORLD
===================================================== */

.explore-section {
    --explore-black: #000000;
    --explore-gold: #deb76c;
    --explore-cream: #fcf8f0;
    --explore-muted: #a6a6a6;

    position: relative;
    width: 100%;
    padding: 100px 5.5%;
    overflow: hidden;
    background: #000000;
    color: var(--explore-cream);
    font-family: 'Itim', cursive;
}

.explore-section *,
.explore-section *::before,
.explore-section *::after {
    box-sizing: border-box;
}

.explore-container {
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
}

/* HEADER */

.explore-heading {
    max-width: 650px;
    margin: 0 auto 46px;
    text-align: center;
}

.explore-eyebrow {
    display: inline-block;
    margin-bottom: 13px;
    color: var(--explore-gold);
    font-family: 'Itim', cursive;
    font-size: 11px;
    letter-spacing: 4px;
}

.explore-heading h2 {
    margin: 0;
    color: var(--explore-cream);
    font-family: 'Macondo Swash Caps', cursive;
    font-size: clamp(38px, 5vw, 62px);
    font-weight: 400;
    line-height: 1.1;
}

.explore-heading p {
    max-width: 490px;
    margin: 15px auto 0;
    color: var(--explore-muted);
    font-size: 15px;
    line-height: 1.8;
}

.explore-heading-line {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 24px;
}

.explore-heading-line span {
    width: 48px;
    height: 1px;
    background: rgba(222, 183, 108, 0.55);
}

.explore-heading-line i {
    display: block;
    width: 6px;
    height: 6px;
    border: 1px solid var(--explore-gold);
    transform: rotate(45deg);
}

/* CAROUSEL */

.explore-carousel-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.explore-carousel {
    position: relative;
    width: 100%;
    height: clamp(350px, 48vw, 570px);
    overflow: hidden;
    border: 1px solid rgba(222, 183, 108, 0.38);
    background: #000000;
}

.explore-card {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transition:
        opacity 0.65s ease,
        visibility 0.65s ease;
}

.explore-card.is-active {
    opacity: 1;
    visibility: visible;
    z-index: 1;
}

.explore-image {
    position: absolute;
    inset: 0;
    overflow: hidden;
}

.explore-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transform: scale(1.02);
    transition: transform 5s ease;
}

.explore-card.is-active .explore-image img {
    transform: scale(1.08);
}

.explore-shade {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(
            90deg,
            rgba(0, 0, 0, 0.88) 0%,
            rgba(0, 0, 0, 0.56) 37%,
            rgba(0, 0, 0, 0.08) 75%
        ),
        linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.58) 0%,
            transparent 45%
        );
}

.explore-content {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: clamp(24px, 4vw, 52px);
}

.explore-location-number {
    color: var(--explore-gold);
    font-size: 13px;
    letter-spacing: 2px;
}

.explore-location-number span {
    color: rgba(252, 248, 240, 0.55);
}

.explore-text {
    max-width: 490px;
    padding-bottom: 4px;
}

.explore-label {
    display: inline-block;
    margin-bottom: 12px;
    color: var(--explore-gold);
    font-size: 10px;
    letter-spacing: 3px;
}

.explore-text h3 {
    margin: 0 0 14px;
    color: #fffaf0;
    font-family: 'Macondo Swash Caps', cursive;
    font-size: clamp(34px, 5vw, 60px);
    font-weight: 400;
    line-height: 1.1;
}

.explore-text p {
    max-width: 420px;
    margin: 0;
    color: rgba(255, 250, 240, 0.84);
    font-size: 15px;
    line-height: 1.8;
}

/* ARROWS */

.explore-arrow {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: grid;
    place-items: center;
    width: 43px;
    height: 43px;
    padding: 0;
    border: 1px solid rgba(222, 183, 108, 0.65);
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.78);
    color: var(--explore-cream);
    font-size: 14px;
    cursor: pointer;
    transform: translateY(-50%);
    transition:
        background 0.25s ease,
        color 0.25s ease,
        border-color 0.25s ease;
}

.explore-arrow:hover {
    border-color: var(--explore-gold);
    background: var(--explore-gold);
    color: #000000;
}

.explore-prev {
    left: -22px;
}

.explore-next {
    right: -22px;
}

/* FOOTER */

.explore-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-top: 23px;
}

.explore-progress {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 150px;
}

.explore-progress-current,
.explore-progress-total {
    color: var(--explore-gold);
    font-size: 11px;
    letter-spacing: 1px;
}

.explore-progress-total {
    color: rgba(252, 248, 240, 0.55);
}

.explore-progress-track {
    width: 85px;
    height: 1px;
    background: rgba(252, 248, 240, 0.2);
}

.explore-progress-fill {
    display: block;
    width: 0;
    height: 100%;
    background: var(--explore-gold);
    transition: width 0.35s ease;
}

.explore-dots {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
}

.explore-dot {
    width: 6px;
    height: 6px;
    padding: 0;
    border: 1px solid rgba(222, 183, 108, 0.65);
    border-radius: 50%;
    background: transparent;
    cursor: pointer;
    transition:
        width 0.25s ease,
        background 0.25s ease;
}

.explore-dot.active {
    width: 22px;
    border-radius: 10px;
    background: var(--explore-gold);
}

.explore-footer-note {
    color: rgba(252, 248, 240, 0.48);
    font-size: 10px;
    letter-spacing: 2px;
    text-align: right;
}

/* RESPONSIVE */

@media (max-width: 768px) {
    .explore-section {
        padding: 75px 6%;
    }

    .explore-heading {
        margin-bottom: 32px;
    }

    .explore-heading p {
        font-size: 14px;
    }

    .explore-carousel {
        height: 440px;
    }

    .explore-shade {
        background:
            linear-gradient(
                0deg,
                rgba(0, 0, 0, 0.92) 0%,
                rgba(0, 0, 0, 0.55) 48%,
                rgba(0, 0, 0, 0.08) 100%
            );
    }

    .explore-content {
        padding: 25px;
    }

    .explore-text {
        max-width: 100%;
    }

    .explore-text h3 {
        font-size: clamp(34px, 8vw, 48px);
    }

    .explore-text p {
        font-size: 14px;
    }

    .explore-prev {
        left: -15px;
    }

    .explore-next {
        right: -15px;
    }

    .explore-arrow {
        width: 35px;
        height: 35px;
        font-size: 12px;
    }

    .explore-footer-note {
        display: none;
    }

    .explore-footer {
        justify-content: space-between;
    }
}

@media (max-width: 480px) {
    .explore-section {
        padding: 60px 5%;
    }

    .explore-eyebrow {
        font-size: 9px;
        letter-spacing: 2.5px;
    }

    .explore-heading h2 {
        font-size: 38px;
    }

    .explore-heading p {
        max-width: 320px;
        font-size: 13px;
        line-height: 1.7;
    }

    .explore-carousel {
        height: 390px;
    }

    .explore-content {
        padding: 20px;
    }

    .explore-label {
        font-size: 9px;
        letter-spacing: 2px;
    }

    .explore-text h3 {
        margin-bottom: 10px;
        font-size: 34px;
    }

    .explore-text p {
        font-size: 13px;
        line-height: 1.65;
    }

    .explore-progress {
        gap: 8px;
        min-width: 0;
    }

    .explore-progress-track {
        width: 48px;
    }

    .explore-dots {
        gap: 6px;
    }

    .explore-dot {
        width: 5px;
        height: 5px;
    }

    .explore-dot.active {
        width: 17px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .explore-card,
    .explore-image img,
    .explore-arrow,
    .explore-progress-fill,
    .explore-dot {
        transition: none;
    }
}


/* GAMEPLAY SECTION DIVIDER — CINEMATIC TRANSITION */
.gameplay-divider {
    position: relative;
    isolation: isolate;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 190px;
    padding: 42px 7% 34px;
    overflow: hidden;
    background: linear-gradient(180deg, #000 0%, #080d18 52%, #000 100%);
    text-align: center;
}
.gameplay-divider::before {
    content: "";
    position: absolute;
    z-index: -1;
    left: 50%;
    top: 50%;
    width: min(680px, 85vw);
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(160,177,204,.24), transparent);
    transform: translate(-50%, -50%);
}
.gameplay-divider-inner {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 9px;
}
.gameplay-divider-kicker {
    color: rgba(220,226,237,.56);
    font-family: 'Itim', cursive;
    font-size: 10px;
    letter-spacing: 4px;
}
.gameplay-divider h2 {
    margin: 0;
    color: #deb76c;
    font-family: 'Macondo Swash Caps', cursive;
    font-size: clamp(38px, 5vw, 56px);
    font-weight: 400;
    line-height: 1.05;
    letter-spacing: .5px;
    text-shadow: 0 3px 18px rgba(222,183,108,.12);
    animation: gameplayTitleIn .8s ease both;
}
.gameplay-divider-rule {
    display: block;
    width: 54px;
    height: 2px;
    margin-top: 5px;
    background: linear-gradient(90deg, transparent, #deb76c, transparent);
    transform-origin: center;
    animation: gameplayRuleIn .9s .15s ease both;
}
@keyframes gameplayTitleIn {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes gameplayRuleIn {
    from { opacity: 0; transform: scaleX(.35); }
    to { opacity: 1; transform: scaleX(1); }
}
@media (max-width: 600px) {
    .gameplay-divider { min-height: 150px; padding: 32px 6% 26px; }
    .gameplay-divider h2 { font-size: 40px; }
    .gameplay-divider-kicker { font-size: 9px; letter-spacing: 3px; }
}
@media (prefers-reduced-motion: reduce) {
    .gameplay-divider h2, .gameplay-divider-rule { animation: none; }
}

</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const section = document.querySelector('#gameplay-explore');

    if (!section) return;

    const cards = Array.from(section.querySelectorAll('.explore-card'));
    const dots = Array.from(section.querySelectorAll('.explore-dot'));
    const prev = section.querySelector('.explore-prev');
    const next = section.querySelector('.explore-next');
    const currentLabel = section.querySelector('.explore-progress-current');
    const progressFill = section.querySelector('.explore-progress-fill');

    if (!cards.length) return;

    let current = 0;
    let touchStartX = 0;

    function showSlide(index) {
        current = (index + cards.length) % cards.length;

        cards.forEach((card, i) => {
            card.classList.toggle('is-active', i === current);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);
        });

        if (currentLabel) {
            currentLabel.textContent = String(current + 1).padStart(2, '0');
        }

        if (progressFill) {
            const progress = ((current + 1) / cards.length) * 100;
            progressFill.style.width = progress + '%';
        }
    }

    if (prev) {
        prev.addEventListener('click', function () {
            showSlide(current - 1);
        });
    }

    if (next) {
        next.addEventListener('click', function () {
            showSlide(current + 1);
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            showSlide(index);
        });
    });

    const carousel = section.querySelector('.explore-carousel');

    if (carousel) {
        carousel.addEventListener('touchstart', function (event) {
            touchStartX = event.changedTouches[0].screenX;
        }, { passive: true });

        carousel.addEventListener('touchend', function (event) {
            const touchEndX = event.changedTouches[0].screenX;
            const distance = touchEndX - touchStartX;

            if (Math.abs(distance) < 45) return;

            if (distance < 0) {
                showSlide(current + 1);
            } else {
                showSlide(current - 1);
            }
        }, { passive: true });
    }

    showSlide(0);
});
</script>