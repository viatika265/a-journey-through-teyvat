{{-- =====================================================
    QUEST JOURNEY SECTION
===================================================== --}}

<section id="gameplay-quest" class="quest-section">

    {{-- TITLE --}}
    <div class="quest-title">

        <h2>
            Quest Journey
        </h2>

        <span>
            Follow the stories, complete missions,
            and experience unforgettable adventures across Teyvat.
        </span>

    </div>


    {{-- QUEST GRID --}}
    <div class="quest-track">

        @foreach($quests as $index => $quest)

        <article class="quest-card">

            {{-- HEADER --}}
            <div class="quest-header">

                <span class="quest-number">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>

                <span class="quest-type">
                    {{ strtoupper($quest->type) }}
                </span>

            </div>


            {{-- IMAGE --}}
            <div class="quest-image">

                <img
                    src="{{ $quest->media_url }}"
                    alt="{{ $quest->title }}"
                >

            </div>


            {{-- CONTENT --}}
            <div class="quest-content">

                <h3>
                    {{ $quest->title }}
                </h3>

                <h4>
                    {{ $quest->subtitle }}
                </h4>

                <p>
                    {{ $quest->description }}
                </p>

            </div>

        </article>

        @endforeach

    </div>

</section>