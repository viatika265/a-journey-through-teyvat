<section id="gameplay-explore" class="explore-section">


    {{-- TITLE --}}
    <div class="explore-title">

        <p>GAMEPLAY</p>

        <h2>
            Explore the World
        </h2>

        <span>
            Discover landscapes, cultures, and stories across Teyvat.
        </span>

    </div>




    {{-- CAROUSEL --}}
    <div class="explore-carousel-wrapper">


        <div 
            class="explore-carousel"
            id="explore-carousel"
        >


            @foreach($experiences as $experience)


            <article class="explore-card">


                {{-- IMAGE --}}
                @if($experience->media_url)

                    <img
                        src="{{ $experience->media_url }}"
                        alt="{{ $experience->title }}"
                    >

                @else

                    <div class="explore-placeholder">

                        {{ strtoupper(substr($experience->title,0,1)) }}

                    </div>

                @endif




                {{-- OVERLAY --}}
                <div class="explore-overlay"></div>




                {{-- CONTENT --}}
                <div class="explore-content">


                    <h3>
                        {{ $experience->title }}
                    </h3>


                    <h4>

                        @switch($experience->title)

                            @case('Explore')
                                A World to Explore
                            @break


                            @case('Gliding')
                                Take Flight Across Teyvat
                            @break


                            @case('Climbing')
                                Reach New Heights
                            @break


                            @case('Swimming')
                                Dive Into The Unknown
                            @break


                            @default

                                {{ $experience->title }}

                        @endswitch


                    </h4>



                    <p>
                        {{ $experience->description 
                        ?? 'Experience the world of Teyvat.' }}
                    </p>



                </div>


            </article>



            @endforeach



        </div>


    </div>




    {{-- INDICATOR --}}

    <div 
        class="explore-indicator"
        id="explore-indicator"
    >


        @foreach($experiences as $index=>$experience)


        <button
            data-index="{{ $index }}"
        ></button>


        @endforeach


    </div>


</section>