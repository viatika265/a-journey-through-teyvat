<section id="elemental-combat" class="elemental-combat">

    {{-- TITLE --}}
    <div class="combat-title">
        <h2>
            Elemental Combat
        </h2>
    </div>

    {{-- ELEMENT CAROUSEL --}}
    <div class="combat-element-carousel">
        <div class="combat-elements-wrapper">
            <div
                class="combat-elements"
                id="combat-elements"
            >
                @foreach ($elements as $index => $element)
                    <button
                        type="button"
                        class="combat-element {{ $index === 5 ? 'active' : '' }}"
                        data-element-id="{{ $element->id }}"
                        data-element-name="{{ $element->name }}"
                        data-media="{{ $element->media_url }}"
                        data-index="{{ $index }}"
                        aria-label="{{ $element->name }}"
                        aria-pressed="{{ $index === 5 ? 'true' : 'false' }}"
                    >
                        <span class="element-glow-bg"></span>

                        <img
                            src="{{ $element->icon }}"
                            alt="{{ $element->name }}"
                            class="combat-element-icon"
                        >
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ACTIVE ELEMENT NAME --}}
    <div class="combat-active-element">
        <h3 id="active-element-name">
            {{ $elements->values()->get(5)?->name ?? 'Pyro' }}
        </h3>
    </div>

    {{-- ELEMENT CONTROLS --}}
    <div class="combat-bottom-control">

        <button
            type="button"
            class="combat-arrow"
            id="combat-prev"
            aria-label="Previous element"
        >
            <span>‹</span>
        </button>

        <div class="combat-indicators">
            @foreach ($elements as $index => $element)
                <button
                    type="button"
                    class="combat-dot {{ $index === 5 ? 'active' : '' }}"
                    data-index="{{ $index }}"
                    aria-label="Select {{ $element->name }}"
                    aria-pressed="{{ $index === 5 ? 'true' : 'false' }}"
                ></button>
            @endforeach
        </div>

        <button
            type="button"
            class="combat-arrow"
            id="combat-next"
            aria-label="Next element"
        >
            <span>›</span>
        </button>

    </div>

    {{-- MEDIA + REACTION CARD --}}
    <div class="combat-showcase">

        <div
            class="combat-media"
            id="combat-media"
        >
            <img
                id="combat-image"
                src="https://images8.alphacoders.com/112/1122345.jpg"
                alt="Elemental Combat"
                class="combat-media-content"
            >

            <div class="combat-media-overlay"></div>

            {{-- REACTION INSIDE MEDIA --}}
            <div class="combat-reaction-wrapper">
                <div
                    class="combat-reactions"
                    id="combat-reactions"
                >
                    @foreach ($combatReactions as $reaction)
                        @php
                            $combination = $reaction->combinations->first();
                        @endphp

                        @if ($combination)
                            <article
                                class="combat-reaction"
                                data-reaction-id="{{ $reaction->id }}"
                                data-reaction-name="{{ $reaction->name }}"
                                data-element-one="{{ $combination->element_1_id ?? '' }}"
                                data-element-two="{{ $combination->element_2_id ?? '' }}"
                                data-state-one="{{ $combination->state_1_id ?? '' }}"
                                data-state-two="{{ $combination->state_2_id ?? '' }}"
                                data-trigger-type="{{ $combination->trigger_type ?? '' }}"
                            >
                                <div class="combat-reaction-icon">

                                    @if ($combination->elementOne)
                                        <img
                                            src="{{ $combination->elementOne->icon }}"
                                            alt="{{ $combination->elementOne->name }}"
                                            class="reaction-element-icon"
                                        >
                                    @endif

                                    @if ($combination->elementOne && $combination->elementTwo)
                                        <span class="reaction-plus">
                                            +
                                        </span>
                                    @endif

                                    @if ($combination->elementTwo)
                                        <img
                                            src="{{ $combination->elementTwo->icon }}"
                                            alt="{{ $combination->elementTwo->name }}"
                                            class="reaction-element-icon"
                                        >
                                    @endif

                                </div>

                                <div class="combat-reaction-info">
                                    <h3>
                                        {{ $reaction->name }}
                                    </h3>

                                    <p>
                                        {{ $reaction->description }}
                                    </p>
                                </div>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</section>

<style>

/* =====================================================
   ELEMENTAL COMBAT
===================================================== */


/* =====================================================
   ELEMENTAL COMBAT
===================================================== */

#elemental-combat {
    position: relative;
    width: 100%;
    padding: 80px 0;
    background: #000;
    color: #fff;
    overflow: hidden;
    box-sizing: border-box;
}

#elemental-combat * {
    box-sizing: border-box;
}

/* =====================================================
   TITLE
===================================================== */

#elemental-combat .combat-title {
    position: relative;
    z-index: 2;
    text-align: center;
    margin-bottom: 25px;
}

#elemental-combat .combat-title h2 {
    margin: 0;
    color: #fff;
    font-family: var(--font-display);
    font-size: 2.8rem;
    font-weight: 400;
    letter-spacing: 1px;
}

/* =====================================================
   ELEMENT CAROUSEL
===================================================== */

#elemental-combat .combat-element-carousel {
    position: relative;
    width: 100%;
    height: 230px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

#elemental-combat .combat-elements-wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

#elemental-combat .combat-elements {
    width: 100%;
    min-height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    overflow: visible;
    position: relative;
}

/* =====================================================
   ELEMENT BUTTON
===================================================== */

#elemental-combat .combat-element {
    position: relative;
    flex: 0 0 125px;
    width: 125px;
    height: 125px;
    padding: 0;
    border: none;
    outline: none;
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: .5;
    transform: scale(.82);
    transition:
        opacity .12s ease,
        transform .12s ease,
        filter .12s ease;
    z-index: 1;
    -webkit-tap-highlight-color: transparent;
}

#elemental-combat .combat-element:hover {
    opacity: .85;
    transform: scale(.94);
    z-index: 3;
}

#elemental-combat .combat-element.active {
    flex-basis: 175px;
    width: 175px;
    height: 175px;
    opacity: 1;
    transform: scale(1);
    z-index: 5;
}

/* =====================================================
   ELEMENT GLOW
===================================================== */

#elemental-combat .element-glow-bg {
    position: absolute;
    inset: 5%;
    border-radius: 50%;
    background: radial-gradient(
        circle,
        rgba(220,177,92,.2) 0%,
        rgba(220,177,92,.08) 42%,
        transparent 72%
    );
    opacity: 0;
    transform: scale(.8);
    transition:
        opacity .12s ease,
        transform .12s ease;
    pointer-events: none;
}

#elemental-combat .combat-element.active .element-glow-bg {
    opacity: .8;
    transform: scale(1.08);
    animation: elementSoftGlow 2.4s ease-in-out infinite;
}

#elemental-combat .combat-element.element-glow .element-glow-bg {
    opacity: 1;
}

#elemental-combat .combat-element.element-pulse .element-glow-bg {
    animation: elementPulse .65s ease-out;
}

@keyframes elementSoftGlow {
    0%, 100% {
        opacity: .55;
        transform: scale(.98);
    }
    50% {
        opacity: .95;
        transform: scale(1.1);
    }
}

@keyframes elementPulse {
    0% {
        opacity: .2;
        transform: scale(.75);
    }
    55% {
        opacity: 1;
        transform: scale(1.2);
    }
    100% {
        opacity: .65;
        transform: scale(1.05);
    }
}

/* =====================================================
   ELEMENT ICON
===================================================== */

#elemental-combat .combat-element-icon {
    position: relative;
    z-index: 2;
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
    filter: grayscale(65%) brightness(.8);
    transform: scale(1.12);
    transition:
        filter .12s ease,
        transform .12s ease;
    pointer-events: none;
}

#elemental-combat .combat-element.active .combat-element-icon {
    width: 88%;
    height: 88%;
    filter: grayscale(0%) brightness(1.08)
        drop-shadow(0 0 10px rgba(220,177,92,.28));
    transform: scale(1);
}

#elemental-combat .combat-element:hover .combat-element-icon {
    transform: scale(1.18);
}

#elemental-combat .combat-element.active:hover .combat-element-icon {
    transform: scale(1.06);
}

/* =====================================================
   ELEMENT NAME
===================================================== */

#elemental-combat .combat-active-element {
    position: relative;
    z-index: 2;
    text-align: center;
    margin: 0 0 12px;
}

#elemental-combat .combat-active-element h3 {
    margin: 0;
    color: #dcb15c;
    font-family: var(--font-display);
    font-size: 1.65rem;
    font-weight: 400;
    letter-spacing: 2px;
}

/* =====================================================
   CONTROLS
===================================================== */

#elemental-combat .combat-bottom-control {
    position: relative;
    z-index: 3;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 28px;
    margin: 18px 0 30px;
}

#elemental-combat .combat-arrow {
    width: 36px;
    height: 42px;
    padding: 0;
    border: none;
    background: transparent;
    color: #dcb15c;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 36px;
    font-weight: 300;
    line-height: 1;
    transition:
        color .25s ease,
        transform .25s ease,
        opacity .25s ease;
}

#elemental-combat .combat-arrow span {
    display: block;
    line-height: 1;
}

#elemental-combat .combat-arrow:hover {
    color: #fff0c8;
    transform: scale(1.2);
}

#elemental-combat .combat-arrow:active {
    transform: scale(.9);
}

#elemental-combat .combat-indicators {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 11px;
}

#elemental-combat .combat-dot {
    flex: 0 0 8px;
    width: 8px;
    height: 8px;
    min-width: 8px;
    min-height: 8px;
    padding: 0;
    border: none;
    border-radius: 50%;
    background: rgba(255,255,255,.35);
    cursor: pointer;
    transition:
        background .25s ease,
        transform .25s ease,
        box-shadow .25s ease;
}

#elemental-combat .combat-dot.active {
    background: #dcb15c;
    transform: scale(1.35);
    box-shadow: 0 0 9px rgba(220,177,92,.65);
}

/* =====================================================
   ELEMENT SWITCH ANIMATION
===================================================== */

#elemental-combat .combat-elements.switch-next {
    animation: combatSlideNext .12s ease;
}

#elemental-combat .combat-elements.switch-prev {
    animation: combatSlidePrev .12s ease;
}

@keyframes combatSlideNext {
    from {
        opacity: .65;
        transform: translateX(18px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes combatSlidePrev {
    from {
        opacity: .65;
        transform: translateX(-18px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* =====================================================
   SHOWCASE + MEDIA
===================================================== */

#elemental-combat .combat-showcase {
    position: relative;
    width: 100%;
    margin: 0;
}

#elemental-combat .combat-media {
    position: relative;
    width: 100%;
    height: 650px;
    overflow: hidden;
    background: #000;
    isolation: isolate;
}

#elemental-combat .combat-media-content {
    position: absolute;
    inset: 0;
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    z-index: 0;
}

#elemental-combat .combat-media-overlay {
    position: absolute;
    inset: 0;
    z-index: 1;
    pointer-events: none;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,.04) 0%,
        rgba(0,0,0,.02) 40%,
        rgba(0,0,0,.38) 72%,
        rgba(0,0,0,.82) 100%
    );
}

/* =====================================================
   REACTION WRAPPER
===================================================== */

#elemental-combat .combat-reaction-wrapper {
    position: absolute;
    z-index: 5;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    margin: 0;
    padding: 35px 5% 35px;
    background: linear-gradient(
        to bottom,
        transparent,
        rgba(0,0,0,.25) 20%,
        rgba(0,0,0,.78) 100%
    );
}

#elemental-combat .combat-reactions {
    width: 100%;
    display: flex;
    align-items: stretch;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

/* =====================================================
   REACTION — TANPA KOTAK
===================================================== */

#elemental-combat .combat-reaction {
    display: none;
    flex: 0 1 220px;
    min-width: 150px;
    max-width: 260px;
    padding: 0;
    text-align: center;
    color: #fff;

    background: transparent !important;
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    backdrop-filter: none !important;
    -webkit-backdrop-filter: none !important;

    transform: none;
    opacity: 1;
    transform-origin: center bottom;
}

#elemental-combat .combat-reaction.show {
    display: flex !important;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0;

    background: transparent !important;
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;

    animation: none !important;
    transform: none !important;
    opacity: 1;
}

/* =====================================================
   REACTION ICONS — PULSE
===================================================== */

#elemental-combat .combat-reaction-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 48px;
    margin-bottom: 7px;
    padding: 0;

    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

#elemental-combat .reaction-element-icon {
    display: block;
    width: 42px;
    height: 42px;
    object-fit: contain;
    filter: drop-shadow(0 0 5px rgba(255,255,255,.16));
    transform-origin: center;
    animation: reactionCirclePulse 1.5s ease-in-out infinite;
}

#elemental-combat .reaction-plus {
    color: #dcb15c;
    font-size: 23px;
    font-weight: 400;
    line-height: 1;

    animation: none !important;
    transform: none !important;
}

/* =====================================================
   REACTION TEXT — TETAP DIAM
===================================================== */

#elemental-combat .combat-reaction-info {
    background: transparent !important;
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;

    animation: none !important;
    transform: none !important;
    transition: none !important;
}

#elemental-combat .combat-reaction-info h3 {
    margin: 5px 0;
    color: #fff;
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 400;
    line-height: 1.25;

    animation: none !important;
    transform: none !important;
    transition: none !important;
}

#elemental-combat .combat-reaction-info p {
    display: block;
    max-width: 280px;
    margin: 0 auto;
    color: rgba(255,255,255,.85);
    font-size: .9rem;
    line-height: 1.4;

    animation: none !important;
    transform: none !important;
    transition: none !important;
}

/* IKON MEMBESAR-MENGECIL BERSAMAAN */
@keyframes reactionCirclePulse {
    0%, 100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.2);
    }
}

/* =====================================================
   TABLET
===================================================== */

@media (max-width: 1024px) {
    #elemental-combat {
        padding: 60px 0;
    }

    #elemental-combat .combat-title h2 {
        font-size: 2.2rem;
    }

    #elemental-combat .combat-element-carousel {
        height: 195px;
    }

    #elemental-combat .combat-elements {
        gap: 20px;
    }

    #elemental-combat .combat-element {
        flex-basis: 85px;
        width: 85px;
        height: 85px;
    }

    #elemental-combat .combat-element.active {
        flex-basis: 145px;
        width: 145px;
        height: 145px;
    }

    #elemental-combat .combat-media {
        height: auto;
        aspect-ratio: 16 / 9;
    }

    #elemental-combat .combat-reaction-wrapper {
        padding: 20px 3% 22px;
    }

    #elemental-combat .combat-reactions {
        gap: 12px;
    }

    #elemental-combat .combat-reaction {
        flex-basis: 180px;
        min-width: 130px;
        padding: 0;
    }

    #elemental-combat .reaction-element-icon {
        width: 32px;
        height: 32px;
    }

    #elemental-combat .combat-reaction-info h3 {
        font-size: .95rem;
    }

    #elemental-combat .combat-reaction-info p {
        font-size: .76rem;
    }
}

/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 768px) {
    #elemental-combat {
        padding: 42px 0;
    }

    #elemental-combat .combat-title {
        margin-bottom: 15px;
    }

    #elemental-combat .combat-title h2 {
        font-size: 1.7rem;
    }

    #elemental-combat .combat-element-carousel {
        height: 140px;
    }

    #elemental-combat .combat-elements {
        gap: 12px;
    }

    #elemental-combat .combat-element {
        flex-basis: 58px;
        width: 58px;
        height: 58px;
    }

    #elemental-combat .combat-element.active {
        flex-basis: 100px;
        width: 100px;
        height: 100px;
    }

    #elemental-combat .combat-active-element {
        margin-top: 4px;
    }

    #elemental-combat .combat-active-element h3 {
        font-size: 1.1rem;
    }

    #elemental-combat .combat-bottom-control {
        gap: 15px;
        margin: 15px 0 22px;
    }

    #elemental-combat .combat-arrow {
        width: 25px;
        height: 30px;
        font-size: 25px;
    }

    #elemental-combat .combat-indicators {
        gap: 8px;
    }

    #elemental-combat .combat-dot {
        flex-basis: 6px;
        width: 6px;
        height: 6px;
        min-width: 6px;
        min-height: 6px;
    }

    #elemental-combat .combat-media {
        height: auto;
        aspect-ratio: 16 / 9;
    }

    #elemental-combat .combat-reaction-wrapper {
        padding: 12px 8px 12px;
    }

    #elemental-combat .combat-reactions {
        flex-wrap: nowrap;
        align-items: stretch;
        justify-content: space-evenly;
        gap: 6px;
    }

    #elemental-combat .combat-reaction {
        flex: 1 1 0;
        min-width: 0;
        max-width: none;
        padding: 0;
        border: none !important;
        border-radius: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    #elemental-combat .combat-reaction-icon {
        min-height: 28px;
        gap: 3px;
        margin-bottom: 3px;
    }

    #elemental-combat .reaction-element-icon {
        width: 23px;
        height: 23px;
    }

    #elemental-combat .reaction-plus {
        font-size: 13px;
    }

    #elemental-combat .combat-reaction-info h3 {
        margin: 3px 0;
        font-size: .68rem;
        line-height: 1.2;
    }

    #elemental-combat .combat-reaction-info p {
        max-width: 100%;
        font-size: .57rem;
        line-height: 1.25;
    }
}

/* =====================================================
   SMALL PHONE
===================================================== */

@media (max-width: 480px) {
    #elemental-combat {
        padding: 30px 0;
    }

    #elemental-combat .combat-title h2 {
        font-size: 1.4rem;
    }

    #elemental-combat .combat-element-carousel {
        height: 110px;
    }

    #elemental-combat .combat-elements {
        gap: 8px;
    }

    #elemental-combat .combat-element {
        flex-basis: 42px;
        width: 42px;
        height: 42px;
    }

    #elemental-combat .combat-element.active {
        flex-basis: 75px;
        width: 75px;
        height: 75px;
    }

    #elemental-combat .combat-active-element h3 {
        font-size: .9rem;
    }

    #elemental-combat .combat-bottom-control {
        gap: 10px;
        margin: 12px 0 17px;
    }

    #elemental-combat .combat-arrow {
        font-size: 21px;
    }

    #elemental-combat .combat-indicators {
        gap: 6px;
    }

    #elemental-combat .combat-media {
        aspect-ratio: 16 / 9;
    }

    #elemental-combat .combat-reaction-wrapper {
        padding: 8px 4px 7px;
    }

    #elemental-combat .combat-reactions {
        gap: 3px;
    }

    #elemental-combat .combat-reaction {
        padding: 0;
        border: none !important;
        border-radius: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    #elemental-combat .combat-reaction-icon {
        min-height: 19px;
        gap: 2px;
        margin-bottom: 2px;
    }

    #elemental-combat .reaction-element-icon {
        width: 16px;
        height: 16px;
    }

    #elemental-combat .reaction-plus {
        font-size: 10px;
    }

    #elemental-combat .combat-reaction-info h3 {
        font-size: .5rem;
        line-height: 1.15;
    }

    #elemental-combat .combat-reaction-info p {
        font-size: .42rem;
        line-height: 1.15;
    }
}

/* =====================================================
   EXTRA SMALL PHONE
===================================================== */

@media (max-width: 360px) {
    #elemental-combat .combat-elements {
        gap: 5px;
    }

    #elemental-combat .combat-element {
        flex-basis: 34px;
        width: 34px;
        height: 34px;
    }

    #elemental-combat .combat-element.active {
        flex-basis: 60px;
        width: 60px;
        height: 60px;
    }

    #elemental-combat .combat-reaction-wrapper {
        padding: 6px 2px 5px;
    }

    #elemental-combat .combat-reactions {
        gap: 2px;
    }

    #elemental-combat .reaction-element-icon {
        width: 13px;
        height: 13px;
    }

    #elemental-combat .combat-reaction-info h3 {
        font-size: .42rem;
    }

    #elemental-combat .combat-reaction-info p {
        font-size: .36rem;
    }
}

/* =====================================================
   REDUCED MOTION
===================================================== */

@media (prefers-reduced-motion: reduce) {
    #elemental-combat .reaction-element-icon {
        animation: none !important;
    }

    #elemental-combat .combat-element,
    #elemental-combat .combat-element-icon,
    #elemental-combat .element-glow-bg,
    #elemental-combat .combat-arrow,
    #elemental-combat .combat-dot {
        transition: none;
    }
}

/* =====================================================
   FIX: SHOW COMBAT REACTION DESCRIPTION
===================================================== */

#elemental-combat .combat-reaction-info {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: flex-start !important;

    width: 100% !important;
    height: auto !important;
    max-height: none !important;

    visibility: visible !important;
    opacity: 1 !important;
    overflow: visible !important;
}

#elemental-combat .combat-reaction-info h3 {
    display: block !important;

    visibility: visible !important;
    opacity: 1 !important;

    margin: 8px 0 4px !important;
}

#elemental-combat .combat-reaction-info p {
    display: block !important;

    width: 100% !important;
    height: auto !important;
    max-height: none !important;

    visibility: visible !important;
    opacity: 1 !important;

    margin: 4px 0 0 !important;
    padding: 0 8px !important;

    color: rgba(255, 255, 255, 0.8) !important;
    font-size: 13px !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    text-align: center !important;

    white-space: normal !important;
    overflow: visible !important;
    text-overflow: unset !important;

    position: static !important;
    transform: none !important;
}


/* DESKRIPSI REAKSI — 2 BARIS TANPA TITIK-TITIK */
@media (max-width: 768px) {
    #elemental-combat .combat-reaction-info p {
        display: block !important;

        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        max-height: calc(1.3em * 2) !important;

        font-size: 0.5rem !important;
        line-height: 1.3 !important;
        letter-spacing: normal !important;

        white-space: normal !important;
        word-break: normal !important;
        overflow-wrap: break-word !important;
        overflow: hidden !important;
        text-overflow: clip !important;

        text-align: center !important;
        padding: 0 2px !important;
        margin: 4px auto 0 !important;
    }
}


/* =====================================================
   GAME FEEL — SUBTLE MOTION (GRAYSCALE TETAP)
===================================================== */

@keyframes combatGlowPulse {
    0%, 100% {
        opacity: .55;
        transform: scale(.96);
    }
    50% {
        opacity: 1;
        transform: scale(1.06);
    }
}

@keyframes combatActiveFloat {
    0%, 100% { translate: 0 0; }
    50% { translate: 0 -4px; }
}

@keyframes combatTitleShine {
    0%, 100% { text-shadow: 0 0 0 rgba(222,183,108,0); }
    50% { text-shadow: 0 0 18px rgba(222,183,108,.22); }
}

#elemental-combat .combat-title h2 {
    animation: combatTitleShine 4s ease-in-out infinite;
}

#elemental-combat .combat-element.active .element-glow-bg {
    animation: combatGlowPulse 2.8s ease-in-out infinite;
}

#elemental-combat .combat-element.active {
    animation: combatActiveFloat 3.2s ease-in-out infinite;
}

#elemental-combat .combat-element-icon {
    transition:
        filter .08s linear,
        transform .08s linear,
        opacity .08s linear;
}

/* Hover memberi respons seperti memilih karakter, tanpa menghilangkan grayscale */
#elemental-combat .combat-element:not(.active):hover .combat-element-icon {
    filter: grayscale(25%) brightness(1);
}

#elemental-combat .combat-media {
    transition: box-shadow .35s ease;
}

#elemental-combat .combat-media:hover {
    box-shadow: 0 0 28px rgba(222,183,108,.12);
}

@media (prefers-reduced-motion: reduce) {
    #elemental-combat .combat-title h2,
    #elemental-combat .combat-element.active,
    #elemental-combat .combat-element.active .element-glow-bg {
        animation: none !important;
    }
}



/* =====================================================
   TITLE DECORATION — GAME MENU HEADER
   (Tidak mengubah struktur HTML atau efek grayscale)
===================================================== */

#elemental-combat .combat-title {
    margin-bottom: 30px;
    isolation: isolate;
}

#elemental-combat .combat-title::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 50%;
    left: 50%;
    width: min(560px, 90%);
    height: 120px;
    transform: translate(-50%, -50%);
    background: radial-gradient(
        ellipse at center,
        rgba(222,183,108,.11) 0%,
        rgba(40,63,121,.055) 38%,
        transparent 72%
    );
    filter: blur(12px);
    pointer-events: none;
}

#elemental-combat .combat-title h2 {
    position: relative;
    display: inline-block;
    padding: 12px 28px 16px;
    letter-spacing: 2px;
    animation:
        combatTitleShine 4s ease-in-out infinite,
        titleEntrance .8s ease-out both;
}

#elemental-combat .combat-title h2::before {
    content: "ELEMENTAL SYSTEM";
    display: block;
    margin-bottom: 7px;
    color: rgba(222,183,108,.82);
    font-family: var(--font-body);
    font-size: .72rem;
    font-weight: 400;
    letter-spacing: 5px;
    line-height: 1.4;
}

#elemental-combat .combat-title h2::after {
    content: "";
    display: block;
    width: 145px;
    height: 2px;
    margin: 12px auto 0;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(222,183,108,.9) 25%,
        rgba(252,248,240,.95) 50%,
        rgba(222,183,108,.9) 75%,
        transparent
    );
    box-shadow: 0 0 12px rgba(222,183,108,.35);
    transform-origin: center;
    animation: titleLineReveal 1s .25s ease-out both;
}

#elemental-combat .combat-title::after {
    content: "CHOOSE YOUR ELEMENT  /  MASTER THE REACTION";
    display: block;
    margin-top: 2px;
    color: rgba(246,246,246,.48);
    font-family: var(--font-body);
    font-size: .78rem;
    letter-spacing: 2.5px;
    animation: titleSubtitleIn .9s .2s ease-out both;
}

@keyframes titleEntrance {
    from {
        opacity: 0;
        transform: translateY(12px);
        filter: blur(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }
}

@keyframes titleLineReveal {
    from { transform: scaleX(.15); opacity: 0; }
    to { transform: scaleX(1); opacity: 1; }
}

@keyframes titleSubtitleIn {
    from { opacity: 0; transform: translateY(6px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 600px) {
    #elemental-combat .combat-title h2 {
        padding: 10px 12px 14px;
        font-size: 2.15rem;
        letter-spacing: 1px;
    }

    #elemental-combat .combat-title h2::before {
        font-size: .62rem;
        letter-spacing: 3.5px;
    }

    #elemental-combat .combat-title::after {
        font-size: .65rem;
        letter-spacing: 1.5px;
    }
}

@media (prefers-reduced-motion: reduce) {
    #elemental-combat .combat-title h2,
    #elemental-combat .combat-title h2::after,
    #elemental-combat .combat-title::after {
        animation: none !important;
    }
}

</style>
<script>
 
// =====================================================
// ELEMENTAL COMBAT
// =====================================================

document.addEventListener('DOMContentLoaded', () => {

    const container = document.getElementById('combat-elements');

    const items = [
        ...document.querySelectorAll(
            '#elemental-combat .combat-element'
        )
    ];

    const dots = [
        ...document.querySelectorAll(
            '#elemental-combat .combat-dot'
        )
    ];

    const reactions = [
        ...document.querySelectorAll(
            '#elemental-combat .combat-reaction'
        )
    ];

    const next = document.getElementById('combat-next');
    const prev = document.getElementById('combat-prev');

    const elementName = document.getElementById(
        'active-element-name'
    );

    const media = document.getElementById('combat-image');

    if (!container || items.length === 0) return;


    // =================================================
    // INITIAL STATE
    // =================================================

    let activeIndex = Math.min(5, items.length - 1);
    let isAnimating = false;


    // =================================================
    // FILTER REACTIONS BY DATABASE ELEMENT IDS
    // =================================================

    function updateReaction(elementId) {

        const selectedId = String(elementId ?? '');

        reactions.forEach(reaction => {

            const elementOne = String(
                reaction.dataset.elementOne ?? ''
            );

            const elementTwo = String(
                reaction.dataset.elementTwo ?? ''
            );

            const show =
                selectedId !== '' &&
                (
                    elementOne === selectedId ||
                    elementTwo === selectedId
                );

            reaction.classList.toggle('show', show);

        });

    }


    // =================================================
    // ACTIVE ELEMENT EFFECT
    // =================================================

    function updateElementEffect() {

        items.forEach((item, index) => {

            const isActive = index === activeIndex;

            item.classList.toggle('active', isActive);

            item.setAttribute(
                'aria-pressed',
                isActive ? 'true' : 'false'
            );

            item.classList.remove(
                'element-pulse',
                'element-glow'
            );

            if (isActive) {

                void item.offsetWidth;

                item.classList.add(
                    'element-pulse',
                    'element-glow'
                );

            }

        });

    }


    // =================================================
    // RENDER ACTIVE ELEMENT
    // NO SLIDE ANIMATION
    // =================================================

    function render() {


        // =================================================
        // CENTER SELECTED ELEMENT
        // REORDER WITHOUT SLIDE EFFECT
        // =================================================

        const total = items.length;
        const order = [];
        const half = Math.floor(total / 2);

        for (let offset = -half; offset <= half; offset++) {

            const index =
                (activeIndex + offset + total) % total;

            if (!order.includes(index)) {
                order.push(index);
            }

        }

        container.replaceChildren();

        order.forEach(index => {
            container.appendChild(items[index]);
        });


        // =================================================
        // UPDATE ACTIVE ELEMENT EFFECT
        // =================================================

        updateElementEffect();


        // =================================================
        // UPDATE DOTS
        // =================================================

        dots.forEach((dot, index) => {

            const isActive = index === activeIndex;

            dot.classList.toggle('active', isActive);

            dot.setAttribute(
                'aria-pressed',
                isActive ? 'true' : 'false'
            );

        });


        // =================================================
        // UPDATE ACTIVE ELEMENT DATA
        // =================================================

        const activeElement = items[activeIndex];

        if (!activeElement) return;

        const name =
            activeElement.dataset.elementName || '';

        const id =
            activeElement.dataset.elementId;

        const gif =
            activeElement.dataset.media;


        // =================================================
        // UPDATE ELEMENT NAME
        // =================================================

        if (elementName) {
            elementName.textContent = name;
        }


        // =================================================
        // UPDATE MEDIA / GIF
        // =================================================

        if (media && gif) {

            media.src = gif;

            media.alt =
                name + ' Elemental Combat';

        }


        // =================================================
        // UPDATE REACTIONS
        // =================================================

        updateReaction(id);

    }


    // =====================================================
    // NEXT BUTTON
    // =====================================================

    if (next) {

        next.addEventListener('click', () => {

            activeIndex =
                (activeIndex + 1) % items.length;

            render();

        });

    }


    // =====================================================
    // PREVIOUS BUTTON
    // =====================================================

    if (prev) {

        prev.addEventListener('click', () => {

            activeIndex =
                (activeIndex - 1 + items.length) %
                items.length;

            render();

        });

    }


    // =====================================================
    // CLICK ELEMENT
    // =====================================================

    items.forEach((item, index) => {

        item.addEventListener('click', () => {

            const selectedIndex = Number(item.dataset.index);

            if (selectedIndex === activeIndex) return;

            activeIndex = selectedIndex;

            render();

        });

    });


    // =====================================================
    // CLICK DOT
    // =====================================================

    dots.forEach((dot, index) => {

        dot.addEventListener('click', () => {

            const selectedIndex = Number(dot.dataset.index);

            if (selectedIndex === activeIndex) return;

            activeIndex = selectedIndex;

            render();

        });

    });


    // =====================================================
    // PRELOAD ALL ELEMENT GIFS
    // =====================================================
    // Start loading every GIF as soon as this component initializes.
    // This reduces the wait when the user switches elements.
    items.forEach(item => {
        const gifUrl = item.dataset.media;
        if (!gifUrl) return;

        const preload = new Image();
        preload.src = gifUrl;
    });

    // =====================================================
    // INITIAL RENDER
    // =====================================================

    render();

});
</script>