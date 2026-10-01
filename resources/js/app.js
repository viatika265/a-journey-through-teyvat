const exploreButton = document.getElementById('explore-btn');
const introSection = document.getElementById('intro');


// =====================================================
// TEYVAT MAP
// =====================================================

document.addEventListener('DOMContentLoaded', () => {

    const viewport = document.getElementById('map-viewport');
    const canvas = document.getElementById('map-canvas');
    const map = document.getElementById('teyvat-map');

    if (!viewport || !canvas || !map) return;

    let scale = 0.3;
    let translateX = 0;
    let translateY = 0;
    let isDragging = false;
    let hasMoved = false;
    let startX = 0;
    let startY = 0;
    let activePin = null;

    const DRAG_THRESHOLD = 5;

    function updateMap() {
        canvas.style.transform =
            `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }

    function clampPosition() {

        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        const mw = map.offsetWidth * scale;
        const mh = map.offsetHeight * scale;

        translateX = mw < vw
            ? (vw - mw) / 2
            : Math.min(0, Math.max(translateX, vw - mw));

        translateY = mh < vh
            ? (vh - mh) / 2
            : Math.min(0, Math.max(translateY, vh - mh));
    }

    viewport.addEventListener('pointerdown', (event) => {

        // Jangan mulai drag kalau klik bagian card
        if (event.target.closest('#region-card')) {
            return;
        }

        isDragging = true;
        hasMoved = false;

        startX = event.clientX - translateX;
        startY = event.clientY - translateY;

        activePin = event.target.closest('.region-pin');

        viewport.setPointerCapture(event.pointerId);

        canvas.classList.remove('cursor-grab');
        canvas.classList.add('cursor-grabbing');
    });

    viewport.addEventListener('pointermove', (event) => {

        if (!isDragging) return;

        const newX = event.clientX - startX;
        const newY = event.clientY - startY;

        if (
            Math.abs(newX - translateX) > DRAG_THRESHOLD ||
            Math.abs(newY - translateY) > DRAG_THRESHOLD
        ) {
            hasMoved = true;
        }

        translateX = newX;
        translateY = newY;

        clampPosition();
        updateMap();
    });

    const stopDragging = () => {

        isDragging = false;

        canvas.classList.remove('cursor-grabbing');
        canvas.classList.add('cursor-grab');

        // Kalau cuma klik pin, buka region card
        if (!hasMoved && activePin) {
            openCard(activePin);
        }

        activePin = null;
    };

    viewport.addEventListener('pointerup', stopDragging);

    viewport.addEventListener('pointercancel', () => {

        isDragging = false;
        activePin = null;

        canvas.classList.remove('cursor-grabbing');
        canvas.classList.add('cursor-grab');
    });

    map.addEventListener('dragstart', (event) => {
        event.preventDefault();
    });

    function initializeMap() {
        clampPosition();
        updateMap();
    }

    if (map.complete) {
        initializeMap();
    } else {
        map.addEventListener('load', initializeMap);
    }

    window.addEventListener('resize', () => {
        clampPosition();
        updateMap();
    });

});

// =====================================================
// EXPLORE CAROUSEL
// =====================================================

document.addEventListener('DOMContentLoaded', () => {


    const carousel =
        document.getElementById('explore-carousel');


    const cards =
        document.querySelectorAll('.explore-card');


    const prev =
        document.getElementById('explore-prev');


    const next =
        document.getElementById('explore-next');


    const indicators =
        document.querySelectorAll(
            '#explore-indicator button'
        );


    if (!carousel || cards.length === 0) return;



    let currentIndex = 0;



    function updateExplore(index) {


        currentIndex = index;


        const card =
            cards[index];


        carousel.scrollTo({

            left:
                card.offsetLeft -
                carousel.offsetLeft,

            behavior:'smooth'

        });



        cards.forEach((item,i)=>{


            item.classList.toggle(
                'active',
                i === index
            );


        });



        indicators.forEach((dot,i)=>{


            dot.classList.toggle(
                'active',
                i === index
            );


        });


    }





    if(next){

        next.addEventListener('click',()=>{


            currentIndex++;


            if(currentIndex >= cards.length){

                currentIndex = 0;

            }


            updateExplore(currentIndex);


        });


    }





    if(prev){

        prev.addEventListener('click',()=>{


            currentIndex--;


            if(currentIndex < 0){

                currentIndex =
                    cards.length - 1;

            }


            updateExplore(currentIndex);


        });

    }





    indicators.forEach((dot,index)=>{


        dot.addEventListener('click',()=>{


            updateExplore(index);


        });


    });



});

// =====================================================
// ELEMENTAL COMBAT
// =====================================================

document.addEventListener('DOMContentLoaded', () => {

    const container =
        document.getElementById('combat-elements');

    const items = [
        ...document.querySelectorAll('.combat-element')
    ];

    const dots = [
        ...document.querySelectorAll('.combat-dot')
    ];

    const reactions = [
        ...document.querySelectorAll('.combat-reaction')
    ];

    const next =
        document.getElementById('combat-next');

    const prev =
        document.getElementById('combat-prev');

    const elementName =
        document.getElementById('active-element-name');

    const media =
        document.getElementById('combat-image');


    if (!container || items.length === 0) return;


    let activeIndex =
        Math.min(5, items.length - 1);

    let isAnimating = false;



    // =================================================
    // FILTER REACTION
    // =================================================

    function updateReaction(elementId) {


        reactions.forEach((reaction) => {


            const name =
                reaction.dataset.reactionName;


            let show = false;


            if (elementId == 1) {

                show = name === 'Swirl';

            }


            else if (elementId == 2) {

                show = name === 'Crystallize';

            }


            else if (elementId == 3) {

                show =
                    name === 'Overloaded' ||
                    name === 'Electro-Charged' ||
                    name === 'Superconduct' ||
                    name === 'Quicken' ||
                    name === 'Aggravate';

            }


            else if (elementId == 4) {

                show =
                    name === 'Burning' ||
                    name === 'Bloom' ||
                    name === 'Quicken' ||
                    name === 'Spread';

            }


            else if (elementId == 5) {

                show =
                    name === 'Vaporize' ||
                    name === 'Electro-Charged' ||
                    name === 'Bloom' ||
                    name === 'Frozen';

            }


            else if (elementId == 6) {

                show =
                    name === 'Vaporize' ||
                    name === 'Melt' ||
                    name === 'Overloaded' ||
                    name === 'Burning';

            }


            else if (elementId == 7) {

                show =
                    name === 'Melt' ||
                    name === 'Superconduct' ||
                    name === 'Frozen';

            }


            reaction.classList.toggle(
                'show',
                show
            );


        });

    }





    // =================================================
    // RENDER ELEMENT
    // =================================================

    function render(direction = 0) {


        if (isAnimating) return;


        isAnimating = true;


        setTimeout(() => {

            isAnimating = false;

        }, 350);





        container.classList.remove(
            'switch-next',
            'switch-prev'
        );


        void container.offsetWidth;



        if (direction > 0) {

            container.classList.add(
                'switch-next'
            );

        }



        if (direction < 0) {

            container.classList.add(
                'switch-prev'
            );

        }





        const total = items.length;

        const order = [];



        for (
            let offset = -3;
            offset <= 3;
            offset++
        ) {


            const index =
                (activeIndex + offset + total)
                % total;


            order.push(index);

        }





        container.innerHTML = '';





        order.forEach(index => {


            const item =
                items[index];


            const isActive =
                index === activeIndex;



            item.classList.toggle(
                'active',
                isActive
            );



            // =====================================
            // CENTER ELEMENT EFFECT
            // =====================================

            if (isActive) {


                item.classList.remove(
                    'element-pulse',
                    'element-glow'
                );


                void item.offsetWidth;


                item.classList.add(
                    'element-pulse',
                    'element-glow'
                );


                setTimeout(() => {

                    item.classList.remove(
                        'element-pulse',
                        'element-glow'
                    );

                },700);


            }




            container.appendChild(item);


        });







        dots.forEach((dot,index)=>{


            dot.classList.toggle(
                'active',
                index === activeIndex
            );


        });







        const activeElement =
            items[activeIndex];



        if (!activeElement) return;





        const name =
            activeElement.dataset.elementName;



        const id =
            activeElement.dataset.elementId;



        const gif =
            activeElement.dataset.media;






        if(elementName){

            elementName.textContent =
                name;

        }






        if(media && gif){

            media.src = gif;

            media.alt =
                name + ' Elemental Combat';

        }





        updateReaction(id);


    }









    // =================================================
    // NEXT BUTTON
    // =================================================

    if(next){

        next.addEventListener('click',()=>{


            activeIndex =
                (activeIndex + 1)
                % items.length;



            render(1);


        });

    }









    // =================================================
    // PREVIOUS BUTTON
    // =================================================

    if(prev){

        prev.addEventListener('click',()=>{


            activeIndex =
                (activeIndex - 1 + items.length)
                % items.length;



            render(-1);


        });

    }









    // =================================================
    // CLICK ELEMENT
    // =================================================

    items.forEach((item,index)=>{


        item.addEventListener('click',()=>{


            activeIndex = index;


            render();


        });


    });









    // =================================================
    // CLICK DOT
    // =================================================

    dots.forEach((dot,index)=>{


        dot.addEventListener('click',()=>{


            activeIndex = index;


            render();


        });


    });









    // INITIAL

    render();



});

/* =========================================================
   QUEST JOURNEY ANIMATION
========================================================= */


document.addEventListener('DOMContentLoaded', () => {


    const questCards = document.querySelectorAll('.quest-card');


    if (!questCards.length) return;





    /* =====================================================
       SCROLL REVEAL
    ===================================================== */


    const observer = new IntersectionObserver((entries) => {


        entries.forEach(entry => {


            if(entry.isIntersecting){


                entry.target.classList.add('show');


                observer.unobserve(entry.target);


            }


        });


    }, {

        threshold:0.15

    });






    questCards.forEach((card,index)=>{


        card.style.transitionDelay = `${index * 0.12}s`;


        observer.observe(card);


    });







    /* =====================================================
       IMAGE HOVER
    ===================================================== */


    questCards.forEach(card=>{


        const image = card.querySelector('.quest-image img');


        if(!image) return;




        card.addEventListener('mouseenter',()=>{


            image.style.transform = "scale(1.06)";


        });





        card.addEventListener('mouseleave',()=>{


            image.style.transform = "scale(1)";


        });



    });



});