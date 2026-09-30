<section id="elemental-combat" class="elemental-combat">

    {{-- TITLE --}}
    <div class="combat-title">
        <h2>Elemental Combat</h2>
    </div>

    {{-- ELEMENT CAROUSEL --}}
    <div class="combat-element-carousel">
        <div class="combat-elements-wrapper">
            <div class="combat-elements" id="combat-elements">

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
            ←
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
            →
        </button>

    </div>

    {{-- ELEMENT MEDIA --}}
    <div class="combat-media" id="combat-media">

        <img
            id="combat-image"
            src="https://images8.alphacoders.com/112/1122345.jpg"
            alt="Elemental Combat"
            class="combat-media-content"
        >

    </div>

    {{-- REACTION GRID --}}
    <div class="combat-reaction-wrapper">

        <div class="combat-reactions" id="combat-reactions">

            @foreach ($combatReactions as $reaction)

                @php
                    $combination = $reaction->combinations->first();
                @endphp

                @if($combination)

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

</section>